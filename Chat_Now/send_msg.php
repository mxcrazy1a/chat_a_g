<?php
include("conn.php");

if(isset($_POST['send'])){
    $id= "";
    @$name = filter_var($_POST['name_msg'] , FILTER_SANITIZE_STRING);
    @$msg = filter_var($_POST['msg'] , FILTER_SANITIZE_STRING);
    @$img = $_POST['img_msg'];


    // echo "$name  $msg  $img";

    if(!empty($msg)){
        mysqli_query($con , "INSERT INTO chatall (id,name,msg,img) VALUES ('$id' ,'$name', '$msg' , '$img')");
        header("location: index.php");
    }



}








?>