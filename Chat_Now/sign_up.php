<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div class="container">
        <p>Sign up By <br>  <span style="font-size: 30px; font-family: cursive; color: #c4c4c4;">Fristok</span> </p>
        <form action="creat_acount.php" method="post">
            <div class="cont">
                <input name="name" type="text" placeholder="User Name...">
                <input name="gmail" type="text" placeholder="Gmail...">
                <div class="inp_pass">
                    <input id="pass" name="pass" type="text" placeholder="Password...">
                    <input id="hid_pass" type="button" value="@">
                </div>
                <center>
                    <small style="color: #fc5858af; font-weight: 200;">
                    
                        <?php
                            if(isset($_GET['error'])){
                                $err = "";
                                $err = filter_var($_GET['error'], FILTER_SANITIZE_STRING);

                                echo $err;
                            }
                         

                        ?>
                
                    </small>
                </center>

                <button name="sign" type="submit">Creat</button>
            </div>
        </form>
        <hr>

        <p>OR <a href="login.php">login</a></p>
    </div>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: system-ui;
        }

        form{
            width: 100%;
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
            background-color: #191919;
        }
        .container{
            display: flex;
            flex-direction: column;
            box-shadow: 2px 2px 7px #e69d3d46;
            width: 400px;
            justify-content: center;
            align-items: center;
        }


        .container hr{
            width: 100%;
            border: none;
            height: 1px;
            /* margin: 4px 0; */
            background-color: #b8874636;
        }
        .container p{
            padding: 10px 0;
            color: #f5f5dc;
            
        }
        .container p a{
            color: #f5f5dc;
        }

        .cont{
            display: flex;
            flex-direction: column;
            width: 100%;
            gap: 20px;
            padding: 20px;
        }
        .cont input[type="text"]{
            width: 100%;
            padding: 13px;
            border-radius: 5px;
            border: 1px solid #eec64121;
            outline: none;
            color: #f5f5dc;
            background-color: #191919;
            box-shadow: inset 2px 2px 5px #000000e6;
        }
        .cont input[type="button"]{
            padding: 13px;
            border-radius: 5px;
            border: 1px solid #eec64121;
            outline: none;
            color: #f5f5dc;
            background-color: #191919;
            cursor: pointer;
        }

        .inp_pass{
            display: flex;
        }
        .cont button{
            width: fit-content;
            padding: 10px 15px;
            color: #c4c4c4;
            border: 1px solid #eec64121;
            background-color: #191919;
            outline: none;
            cursor: pointer;
            transition: .2s;
            border-radius: 4px;
            box-shadow: 2px 2px 2px #000000e6
                        ;
        }
        .cont button:hover{
            background-color: #2e2e2e;
            /* color: #191919; */
        }
        .cont button:active{
           transform: scale(.9);
        }

        #pass.act_pass{
            -webkit-text-security: disc;
        }


    </style>

    <script>

        let hid_pass = document.getElementById("hid_pass");
        let pass = document.getElementById("pass");

   
        hid_pass.addEventListener("click" , ()=> {
            pass.classList.toggle("act_pass");
            pass.focus();
        })


    </script>
    
</body>
</html>