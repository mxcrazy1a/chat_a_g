<?php
include("conn.php");

if(isset($_COOKIE["gmail"])){
    $gmail = $_COOKIE["gmail"];
}else{
    header("location: login.php");
    exit();
}

$arr_ac = mysqli_query($con,"SELECT * FROM users WHERE gmail='$gmail'");

$ac1 = mysqli_fetch_assoc($arr_ac);




// echo $name1;

$name1 = $ac1['name'];

if(isset($_POST['update'])){

    $IMAGE = $_FILES['image'];
    $image_location = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    $img_up= "images/".$image_name;

    if(move_uploaded_file($image_location,'images/'.$image_name)){
        echo "<script> alert('TM Upload img') </script>";
        mysqli_query($con, "UPDATE users SET img='$img_up' WHERE gmail='$gmail'");
    }else{
        echo "<script> alert('No TM Uplod img! :( ) </script>";
        
    }
    


    header("location: index.php");
}


$img1 = $ac1['img'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Chatoo</title>

    <script>
        function aj(){
            var req = new XMLHttpRequest ();
            req.onreadystatechange = function (){
                if(req.readyState == 4 && req.status == 200){
                    document.getElementById("chat1").innerHTML = req.responseText;
                }
            }

            req.open('GET','chat.php',true);
            req.send();
        }

        setInterval(() => {
            aj()
        }, 1000);
    </script>

</head>
<body onload="aj()">

    <div class="container">
        <div class="con">

        <?php
        
            include("navbar.php");

        ?>



        <div class="hid21"> </div>


            <div class="frinds">
                
                <div class="search_frind">
                    <input type="text" placeholder='Search...'>
                    <button>@</button>
                </div>
                

                <div class="itemsF">
                    <ul>

                    <?php
                    
                    $useArr = mysqli_query($con,"SELECT * FROM users"); 

                    
                    // echo "<h1> $user33[name] </h1>";

                    while($user33 = mysqli_fetch_array($useArr)){
                        $name_f = $user33['name'];
                        $img_f = $user33['img'];
                        $id_f = $user33['id'];
                        echo "
                        <li>
                            <div class='ff13'>
                                <div class='dds'>
                                    <img src='$img_f'>
                                    <p>$name_f</p>
                                </div>


                                <a href='chat_you.php?id=$id_f'>
                                    <button>Chat</button>
                                </a>

                            </div>
                        </li>
                        
                        ";
                    }
                    
                    ?>

           

  



                    </ul>
                </div>
            
            
            </div>


















            <div class="con_chat">

                <div class="con_alls">
                    <div class="top11">
                        <div class="infoo">
                            <div class="inf1">
                                <div class="inf_left">
                                    <img src="imges/per1.jpg" alt="">
                                    <p class="name12"> Chat All </p>
                                </div>

                                <div class="men1">
                                    <div class="more12">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>

                                    <div class="lis1">
                                        <ul>
                                            <li>Block</li>
                                            <li>Report</li>
                                            <li>Delete</li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <hr>
                    </div>


                    <div class="chat">
                        <div class="messages">

                        <div id="chat1">


                        </div>




           

        
                        </div>
                    </div>
                    <form action="send_msg.php" method="post">

                    <div class="bottom11">
                        <input name="msg" type="text" placeholder="Message...">

                        <input name="name_msg" value='<?php echo $name1 ?>' type="text" style='display: none' >
                        <input name="img_msg" value='<?php echo $img1 ?>' type="text" style='display: none' >
                        

                        <button name="send" type="submit">Send</button>
                    </div>
                
                </form>
                </div>


            </div>


        </div>
    </div>

    <div class="hop1"></div>

    <form method="post" enctype="multipart/form-data">
        <div class="setting_con">
            <div class="imgg1">
                <img src="<?php echo $img1 ?>" alt="">

                <div class="buu">
                    <label class='lab' for="i11">Upload</label>
                    <input type="file" name="image" id="i11" style='display: none;'>
                </div>

            </div>

            <div class="info1">
                <p><?php echo $name1 ?></p>
                <div class="dss">
                    <label for="ss1"> Activtion </label>
                    <input checked type="checkbox" name="active" id="ss1">
                </div>

                <div class="btns23">
                    <button name='update' type="submit">Update</button>
                    <button >Chancle</button>
                </div>
            </div>
        </div>
    </form>

    <style>
        #chat1{
    display: flex;
    flex-direction: column;
    gap: 20px;
    width: 100%;
    /* overflow-y: auto; */
    /* overflow-x: hidden; */
    padding: 0 10px;
    
}
        .chat{
            /* align-items: flex-start;*/
        }

        .messages{
            /* flex-direction: column-reverse; */
            width: 100%;
        }
        #chat1{
            display: flex;
            flex-direction: column-reverse;
        }

        .info_aco_chat_none{
            display: none;
        }
        .lab{
            padding: 5px 10px;
            background-color: #191919;
            color: #fafafa;
            border: 1px solid #eec641;
            border-radius: 5px;
            cursor: pointer;
        }
        .imgg1{
            position: relative;
        }


        .imgg1:hover .buu{
            translate: 0 0;
        }

        .buu{
            display: flex; 
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background-color: #00000098;
            translate: 0 -200px;
            transition: .5s;
        }


body{
    position: relative;
}
        

.setting_con{
    display: none;
    flex-direction: column;
    width: 40%;
    transform: translate(-50%,-50%);
    position: fixed;
    background-color: #191919;
    border: 1px solid #da9f5223;
    left: 50%;
    top: 50%;
    overflow: hidden;
    border-radius: 20px;
    z-index: 10000000;
}


.setting_con.act12{
    display: flex;
    animation: animat1 .4s linear;

}

.hop1.hop_no{
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0;
    left:0;
    background-color: #00000098;
    backdrop-filter: blur(1px);
    /* transition: .2s; */

}

@keyframes animat1 {
    0%{
        /* display: none; */
        opacity: 0;
        transform: scale(0) translate(-50%,-50%);
        left: 50%;
        top: 50%;
        rotate: 90deg;
    }
    100%{
        
        display: flex;
        opacity: 1;
        transform: scale(1) translate(-50%,-50%);
        left: 50%;
        top: 50%;
    }
}


.imgg1{
    width: 100%;
    max-height: 200px;
    min-height: 200px;
    overflow: hidden;
}
.imgg1 img{
    width: 100%;
}


.info1{
    display: flex;
    flex-direction: column;
    gap: 5px;
    text-align: center;
    /* justify-content: center; */
    /* align-items: center; */
}
.info1 p{
    color: #919191;
    padding: 10px;
    font-size: 25px;
}

.dss{
    display: flex;
    gap: 6px;
    justify-content: center;
    user-select: none;
    color: #fff;
}


.btns23{
    display: flex;
    justify-content: space-between;
    padding: 10px 30px;
}
.btns23 button{
    border: none;
    padding: 7px 14px;
    border-radius: 4px;
    cursor: pointer;
    background-color: #909090;
    color: #000;
    font-weight: 400;
    box-shadow: 2px 2px 4px #000;
    transition: .3s;
}

.btns23 button:hover{
    transform: scale(1.1);
}














        a{
            text-decoration: none;
            color: #eec641;
        }










@media (max-width: 500px) {



    .setting_con{
        width: 100%;
    }
}
    </style>




<script>
        let setting = document.querySelector("#setting");
        
        let setting_con = document.querySelector(".setting_con");
        let hop1 = document.querySelector(".hop1");
        
        setting.addEventListener("click", ()=>{
            // console.log("clll");
            
            hop1.classList.add("hop_no");
            setting_con.classList.add("act12");
        })
        
        
        // let hop_no = document.querySelector(".hop_no");
        
        hop1.addEventListener("click", ()=>{
            // console.log("reee");
            hop1.classList.remove("hop_no");
            setting_con.classList.remove("act12");
        })
        // console.log(setting);


        let bt_frinds = document.querySelector("#bt_frinds");
        let frinds = document.querySelector(".frinds");
        let hid21 = document.querySelector(".hid21");
        
        

        bt_frinds.addEventListener("click", ()=>{
            // console.log("reee");
            frinds.classList.add("act823");
            hid21.classList.add("show_back_s");
        })

        hid21.addEventListener("click", ()=>{
            // console.log("reee");
            frinds.classList.remove("act823");
            hid21.classList.remove("show_back_s");
        })












        let fr1 = document.querySelectorAll(".fr1 p");
let men_btn = document.querySelector(".men_btn");
let left = document.querySelector(".left");


men_btn.addEventListener("click", ()=>{
    for(let i =0; i< fr1.length; i++){
        // console.log(fr1[i]);
        fr1[i].classList.toggle("act12");
    }
    left.classList.toggle("act34");
})












    </script>













    <!-- <script src="script.js"></script> -->


</body>
</html>