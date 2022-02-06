<?php
date_default_timezone_set("Asia/Taipei");
session_start();
class DB{
    private $dsn="mysql:host=localhost;charset=utf8;dbname=web02_5";
    private $root="root";
    private $pw="";
    private $pdo;
    private $table="";
    public function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn, $this->root,$this->pw);
    }

    private function jon($arg){
        $sql="";
        if(is_array($arg)){
            foreach($arg as $k => $v){
                $tmp[]="`$k`='$v'";
            }
            $sql="where ".join(' and ',$tmp);
        }else{
            $sql="where `id`='$arg'";
        }
        return $sql;
    }
    private function chk($arg){
        $sql="";
        if(!empty($arg[0])&&is_array($arg[0])){
            $sql.=$this->jon($arg[0]);
        }
        if(!empty($arg[1])){
            $sql.=" ".$arg[1];
        }
        return $sql;
    }

    public function all(...$arg){
        $sql="select * from $this->table ";
        $sql.=$this->chk($arg);
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        
    }
    public function math($math,$col,...$arg){

$sql="select $math($col) from $this->table ";
        $sql.=$this->chk($arg);
        // echo $sql;
        return $this->pdo->query($sql)->fetchColumn();
        
    }
    public function find($arg){
        $sql="select * from $this->table ";
        $sql.=$this->jon($arg);
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        
    }
    public function del($arg){
        $sql="delete from $this->table ";
        $sql.=$this->jon($arg);
        return $this->pdo->exec($sql);
    }
    public function save($arg){
        $sql="";
        if(!empty($arg['id'])&&is_array($arg)){
            foreach($arg as $k => $v){
                if($k!="id")
                $tmp[]="`$k`='$v'";
            }
            $sql.=sprintf("update %s set %s where `id`='%s'",$this->table,join(',',$tmp),$arg['id']);
        }else{
            $sql.=sprintf("insert into %s (`%s`) values ('%s')",$this->table,join("`,`",array_keys($arg)),join("','",$arg));
        }
        return $this->pdo->exec($sql);
    }
}
 function dd($arg){
echo "<pre>";
print_r($arg);
echo "</pre>";
}
 function to($arg){
header('location:'.$arg);
}

$User=new DB('user');
$News=new DB('news');
$View=new DB('view');
$Log=new DB('log');
$Que=new DB('que');
// all math find del save
// echo $User->save(['acc'=>'test1']);
// dd($User->all());
// echo $User->save(['id'=>1,'acc'=>'test2']);
// dd($User->find(['id'=>1]));

// echo $User->del(['acc']=>'test2');
// echo $User->math('count','*',['id'=>1]);

function chkTotal(){
    global $View;
    $chk=$View->math('count','*',['date'=>date('Y-m-d')]);
    if($chk==0){
        $View->save(['date'=>date('Y-m-d'),'total'=>1]);
    }
    return $View->find(['date'=>date('Y-m-d')]);
}
if(!isset($_SESSION['view'])){
    $view=chkTotal();
    $view['total']++;
    $View->save($view);
    $_SESSION['view']=1;
}else{
    chkTotal();
}
?>