<?php
date_default_timezone_set("Asia/Taipei");
session_start();
class DB{
    private $dsn="mysql:host=localhost;charset=utf8;dbname=web02";
    private $root="root";
    private $pw="";
    private $pdo;
    private $table="";
    public function __construct($table)
    {
        $this->table=$table;
        $this->pdo=new PDO($this->dsn, $this->root, $this->pw);
    }

    private function jon($arg){
        // 判斷陣列
        $sql="";
        // echo $arg;
        if(is_array($arg)){
        foreach($arg as $key => $val){
            $tmp[]="`$key`='$val'";
        }
        echo $sql;
        $sql.="where ".join(" and ", $tmp);
    }else{
        $sql.="where `id`='".$arg."'";

    }
        return $sql;
    }

    private function chk($arg){
        $sql="";
        if(!empty($arg[0])&&is_array($arg)){
            $sql=$this->jon($arg[0]);
            
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
    public function math($math, $col, ...$arg){
        $sql="select $math($col) from $this->table ";
        $sql.=$this->chk($arg);
        // echo $sql;
        return $this->pdo->query($sql)->fetchColumn();
    }
    public function find($arg){
        $sql="select * from $this->table ";
        $sql.=$this->jon($arg);
        // echo $sql;
        
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    public function del($arg){
        $sql="delete from $this->table ";
        $sql.=$this->jon($arg);
        return $this->pdo->exec($sql);
    }
    public function sav($arg){
        if(!empty($arg["id"])){
            foreach($arg as $key => $val){
                if($key!="id"){
                    $tmp[]="`$key`='$val'";
                }
            }
            $sql=sprintf("update %s set %s where `id`='%s'", $this->table, join(",",$tmp),$arg['id']);
        }else{
            $sql=sprintf("insert into %s (`%s`) values ('%s')", $this->table, join("`,`",array_keys($arg)),join("','",$arg));
        }
        echo $sql;
        return $this->pdo->exec($sql);
    }
    public function q($arg){
        return $this->pdo->query($arg)->fetchAll(PDO::FETCH_ASSOC);
    }

}

function dd($arg){
    echo "<pre>";
    print_r($arg);
    echo "</pre>";
}

function to($url){
    header("location:".$url);
}

$View=new DB("view");
$User=new DB("user");
$News=new DB("news");
$Que=new DB("que");
$Log=new DB("log");

// if(empty($_SESSION["view"])){
//     if($View->math("count","*",["date"=>date("Y-m-d")])>0){
//         echo "111";
//         $view=$View->find(["date"=>date("Y-m-d")]);
//         $view['total']++;
//         $View->sav($view);
//         $_SESSION["view"]=$view['total'];

//     }else{
//         echo "222";
//         $View->sav(["date"=>date("Y-m-d"),"total"=>1]);
//         $_SESSION=1;
//     }
// }


/**判斷瀏灠人次 */

$total=new DB('view');
$chk=$total->find(['date'=>date("Y-m-d")]);
if(empty($chk) && empty($_SESSION['view'])){
    //沒有今天的資料,也沒有session  今天頭香 需要新增今日資料,
    $total->sav(["date"=>date("Y-m-d"),"total"=>1]);
    $_SESSION['visited']=1;

}else if(empty($chk) && !empty($_SESSION['view'])){
    //沒有今天的資料,但是有session 異常情形..需要新增今日資料
    $total->sav(["date"=>date("Y-m-d"),"total"=>1]);

}else if(!empty($chk) && empty($_SESSION['view'])){
    //有今天的資料,沒有session  表示是新來 需要加1
    $chk['total']++;
    $total->sav($chk);
    $_SESSION['view']=1;

}



// find all
$db=new DB("test");
// echo $db->sav(["text"=>"hi"]);
// dd($db->find(["text"=>"hi"]));
// echo $db->sav(["text"=>"world"]);
// dd($db->all(["text"=>"hi"],"order by `id` desc"));

// q
// echo $db->math("count","id",["text"=>"world"]);
// dd($db->q("select * from test"));
// echo $db->del(2);
// dd($db->q("select * from test"));
// echo $db->sav(["id"=>3,"text"=>"name"]);
// dd($db->q("select * from test"));
