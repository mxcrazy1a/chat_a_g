<?php
include("conn.php");

if(isset($_POST['send'])){
    $id= "";
    @$name = filter_var($_POST['name_msg'] , FILTER_SANITIZE_STRING);
    @$msg = filter_var($_POST['msg'] , FILTER_SANITIZE_STRING);
    @$gmail_frind = filter_var($_POST['frind'] , FILTER_SANITIZE_STRING);
    @$gmail_me = filter_var($_POST['gmail_me'] , FILTER_SANITIZE_STRING);
    @$img = $_POST['img_msg'];


    $ree = mysqli_query($con,"SELECT * FROM users WHERE gmail='$gmail_frind'");
    $sdsd = mysqli_fetch_assoc($ree);
    $id_f = $sdsd['id'];

    // echo "$name  $msg  $img";

    if(!empty($msg)){
        mysqli_query($con , "INSERT INTO chatfrind (id,name,gmailfrind,gmail_me,msg,img) VALUES ('$id' ,'$name', '$gmail_frind', '$gmail_me' ,'$msg' ,'$img')");
        header("location: chat_you.php?id=$id_f");
    }



}








?>