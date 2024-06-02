
<?php

// include("conn.php");

// if(isset($_COOKIE["gmail"])){
//     $gmail = $_COOKIE["gmail"];
// }else{
//     header("location: login.php");
//     exit();
// }


// $arr_ac = mysqli_query($con,"SELECT * FROM users WHERE gmail='$gmail'");

// $ac1 = mysqli_fetch_assoc($arr_ac);
// $name1 = $ac1['name'];




// $Allmsgs = mysqli_query($con,"SELECT * FROM chatall ORDER BY id DESC");


// // echo $name_msg;

// while($msgsArr = mysqli_fetch_array($Allmsgs)){

//     $name_msg = $msgsArr['name'];
//     $msg = $msgsArr['msg'];
//     $img_msg = $msgsArr['img'];

//     if($name1 == $name_msg){
//         $class1 = "msg1";
//         $class2 = "info_aco_chat_none";
//     }else{
//         $class1 = "msg2";
//         $class2 = "info_aco_chat";
//     }

//     echo "
    
//     <div class='$class1'>
//     <div class='dsf3'>
//         <img class='img' src='$img_msg'>

//         <div class='$class2'>
//             <img src='$img_msg'>
//             <p>$name_msg</p>
//             <button>Profile</button>
//         </div>


        

//     </div>
//     <p class='msg_me p'> $msg </p>
    
// </div>
    
//     ";

// }



?>