<?php
    include_once 'models/user-session.inc.php';
    include_once 'database/dbh.inc.php';
    session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Simple Project</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!--css-->
    <link rel="stylesheet" href="css/tab-header.css" type="text/css">
    <link rel="stylesheet" href="css/login.css" type="text/css">
     <link rel="stylesheet" href="css/news-list.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script>
        $(document).ready(function() {

            /* page load init*/
            $('.input-error-message').hide();

            /*login submit*/
            $("#login-modal form").on('submit', function (event) {
                   event.preventDefault();

                   var email = $("#login-modal form input[name='uname']").val();
                   var password = $("#login-modal form input[name='psw']").val();
                   var submit = $("#login-modal form button[name='submit']").val();

                    $(".input-error-message").load("controllers/login.inc.php",
                    {
                        email:email,
                        password:password,
                        submit:submit
                    });
            });

               /*loout submit*/
            $("#signout-tab").click(function () {
                    $("#signout-tab").load("controllers/logout.inc.php");
            });

        });



        function autoLogin(user){

            if(user == null || user == false){
          
                  /*right top menu*/
                document.getElementById("signout-tab").style.display = 'none'; 
                document.getElementById("login-email").style.display = 'none';
                 document.getElementById("my-collection-tab").style.display = 'none';

            }else{
                document.getElementById("login-name").innerHTML = user.name;
                document.getElementById("login-email").innerHTML = user.email;
                
                /*right top menu*/
                document.getElementById("login-email").style.display = 'block';
                document.getElementById("signup-tab").style.display = 'none';
                document.getElementById("signin-tab").style.display = 'none';
                document.getElementById("signout-tab").style.display = 'block';
                document.getElementById("my-collection-tab").style.display = 'block';
            }
        }

    </script>
</head>

<body>

    <div class="header">
        <a class="logo">
            <!-- <i id="top-left-user-icon" class="fa fa-user"></i> -->
            <div id="login-name">WELCOME</div>
            <!-- <i id="top-left-email-icon" class="fa fa-envelope"></i> -->
            <div id="login-email"></div>
        </a>
        <div class="header-right">
            <a id="home-tab" href="index.php">Home</a>
            <a id="signup-tab" href="registration.php">Sign Up</a>
             <a id="my-collection-tab" href="my-collection.php">My Collection</a>
            <a id="signin-tab" onclick="document.getElementById('login-modal').style.display='block'">Login</a>
            <a id="signout-tab">Logout</a>
        </div>
    </div>

    <?php 
    /*check session exist for auto login purpose*/
    $user_session = new UserSession();
    $user = $user_session->useSessionAutoLogin();
      echo '<script type="text/javascript">',
     'autoLogin('.json_encode($user).');',
     '</script>';    
     ?>


    <div id="login-modal" class="modal">

        <form class="modal-content animate" action="controllers/login.inc.php">
            <div class="imgcontainer">
                <span onclick="document.getElementById('login-modal').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>

            <div class="container">
                <label for="uname"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="uname" >

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" >

                <div class="input-error-message"></div>

                <button type="submit" name="submit">Login</button>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('login-modal').style.display='none'" class="cancelbtn">Cancel</button>
            </div>
        </form>
    </div>