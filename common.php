<?php 
error_reporting(1);
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_SCHEMA", "records");

	function getConnection() {
    $con = mysql_connect(DB_HOST,DB_USER,DB_PASS);
    if(!$con) {
        trigger_error("Problem connecting to server");
    }
    $db =  mysql_select_db(DB_SCHEMA, $con);
    if(!$db) {
        trigger_error("Problem selecting database");
    }
    return $con;
}

function disconnect($con) {
    if($con!=null) {
        $discdb = mysql_close($con);
        if(!$discdb) {
            //  trigger_error("Problem disconnecting database");
        }
    }
}

function dataExists($uname, $umail){
	$conn=getConnection();
	$query="select 1 from details where username='$uname' or email='$umail'";
	$res = execute_query_exists($query);
	return $res;
}

function execute_query_exists($sql) {
    $con = getConnection();

    $result = mysql_query($sql, $con);
    if(!$result) {
        trigger_error("Problem selecting data");
    }

    $res=false;
    while($result!=null&& $ret = mysql_fetch_array($result)) {
        $res=true;
    }
    disconnect($con);
	
    return $res;
}

function addUser($fnm,$unm,$pwd,$lname,$email,$contact,$loc){
	$conn=getConnection();
	$query="insert into details(fname,username,password,lname,email,phone,loc)
		values('$fnm','$unm','$pwd','$lname','$email','$contact','$loc')";
		mysql_query($query,$conn) or die("Can't Execute Query...");
}

function updateUser($fnm,$unm,$pwd,$lname,$email,$contact,$loc,$id){
	$conn=getConnection();
	$query="UPDATE details SET fname = '$fnm',username = '$unm',password = '$pwd',lname = '$lname',email = '$email',phone = '$contact',loc = '$loc' WHERE id =$id;";
		mysql_query($query,$conn) or die("Can't Execute Query...");
}

function execute_Select($sql) {
    $con = getConnection();
    $result = mysql_query($sql, $con);
    if(!$result) {
        echo mysql_error();
        die("Problem inserting data $sql");
    }
    while($row = mysql_fetch_array($result)) {
        $resultArray[]=$row;
    }
    disconnect($con);
    return $resultArray;
}

function getAllDetails(){
	$q="select * from details";
	$res=execute_Select($q);
	return $res;
}

function getDetail($id){
	$conn=getConnection();
	$q="select * from details where id=$id";
	$res=mysql_query($q,$conn) or die("Can't Execute Query..");
	$row=mysql_fetch_assoc($res);
	return $row;
}

function deleteDetail($id){
	$conn = getConnection();
	$query="delete from details where id ='$id'";
	mysql_query($query,$conn) or die("can't Execute...");
}
?>