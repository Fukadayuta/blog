<?php
require("../core/config.php");

$code=$_POST['code'];
$title=$_POST['title'];
$article=$_POST['article'];
$date=gmdate("Y-m-d",time()+9*3600);
$contributor=$_POST['contributor'];

if(empty($code)){
    $sql="insert into post (title,article,date,contributor)value(?,?,?,?)";
    $stmt=$dbh->prepare($sql);
    $stmt->bindValue(1,$title,PDO::PARAM_STR);
    $stmt->bindValue(2,$article,PDO::PARAM_STR);
    $stmt->bindValue(3,$date,PDO::PARAM_STR);
    $stmt->bindValue(4,$contributor,PDO::PARAM_STR);
    $stmt->execute();
}else{
    $sql="update post set title=?,article=?,contributor=? where code='$code'";
    $stmt=$dbh->prepare($sql);
    $stmt->bindValue(1,$title,PDO::PARAM_STR);
    $stmt->bindValue(2,$article,PDO::PARAM_STR);
    $stmt->bindValue(3,$contributor,PDO::PARAM_STR);
    $stmt->execute();
}

if(empty($code)){
header("location:./blog_list.php");
}else{
header("location:./blog_list.php?code=$code");
}

exit;

?>