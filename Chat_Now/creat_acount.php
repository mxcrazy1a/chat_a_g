<?php

include("conn.php");

if(isset($_POST['sign'])){
    $id= "";
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $gmail = filter_var($_POST['gmail'], FILTER_SANITIZE_STRING);
    $pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
    $img  = "imges/per1.jpg";

    $eror = [];
    if(empty($name)){
        $eror[]= "Empty inputs!";
    }elseif(strlen($name) > 15){
        $eror[]= "Whrite name is < 15 Charctor";   
    }
    
    if(empty($gmail)){
        $eror[]= "Empty inputs!";
    }
    
    elseif(filter_var($gmail , FILTER_VALIDATE_EMAIL) == FALSE ){
        $eror[]= "Validat Gmail!";
    }
    
    if(empty($pass)){
        $eror[]= "Empty inputs!";
    }
    elseif(strlen($pass) < 6){
        $eror[]= "Whrite Password is > 6 Charactor";
    }

    $ac = mysqli_query($con,"SELECT gmail FROM users WHERE gmail='$gmail'");
    $acount = mysqli_fetch_assoc($ac);
    $gmail_acount = $acount['gmail'];

    if($gmail_acount){
        $eror[]='This is Acount Found!!';
    }


    if(empty($eror)){

        mysqli_query($con,"INSERT INTO users (id,name,gmail,pass,img) VALUES ('$id','$name','$gmail','$pass','$img')");
        header("location: sign_up.php");
    }elseif(!empty($eror)){
        foreach($eror as $er){
            
            header("location: sign_up.php? error=$er");
        }
        
    }


}




?>