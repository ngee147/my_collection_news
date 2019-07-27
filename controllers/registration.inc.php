<?php

include_once '../models/user.inc.php';
include_once '../database/dbh.inc.php';

 if(isset($_POST['submit'])){

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $password_repeat = trim($_POST['password_repeat']);

    /*Error param*/
    $error_empty = false;
    $error_password_not_match = false;
    $error_email_format = false;
    $error_user_exist = false;

    /*success param*/
    $seccuss_registration = false;

    if(empty($name) || empty($email) || empty($password) ||  empty($password_repeat)){
         $error_empty = true;
    }elseif($password != $password_repeat){
        $error_password_not_match = true;
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error_email_format = true;
    }else{
        $conn = DBH::getInstance();

        /*data validation to avoid duplicated user registration*/
        $stmt = $conn->prepare("SELECT * FROM usersinfo WHERE email = ? LIMIT 1");
        $stmt->execute([$email]);
        $count = $stmt->rowCount();

        if($count > 0){
           $error_user_exist = true;
        }else{
            
            /*regitser new user to db*/
            $stmt = $conn->prepare("INSERT INTO usersinfo (name, email, password) VALUES (?,?,?)");
            $stmt->execute([$name,$email,md5($password)]);

            $seccuss_registration = true;
        }  
    }

 }else{
     echo "SYSTEM ERROR";
 }

 ?>

 <script> 
      /*handle response*/
     var error_empty = "<?php echo $error_empty; ?>";
     var error_password_not_match = "<?php echo $error_password_not_match; ?>";
     var error_email_format = "<?php echo $error_email_format; ?>";
     var error_user_exist = "<?php echo $error_user_exist; ?>";
     var seccuss_registration = "<?php echo $seccuss_registration; ?>";

     /*reset all default design*/
      $("#register-section form input").removeClass('input-error');
      $('#register-section .register-input-error-message').css({
            "color": "red", 
            "border": "1px solid red"
      });
      $('#register-section .register-input-error-message').hide();


     if(seccuss_registration == true){

            $('#register-section .register-input-error-message').css({
                "color": "green", 
                "border": "1px solid green"
                });
            $("#register-section .register-input-error-message").text("Successful Register!");

            /*reset input field*/
            $("#register-section form input[name='name']").val("");
            $("#register-section form input[name='email']").val("");
            $("#register-section form input[name='password']").val("");
            $("#register-section form input[name='password-repeat']").val("");
            $("#register-section form button[name='submit']").val("");

             $('#register-section .register-input-error-message').show();
         
     }else{
         if(error_empty == true){
            $("#register-section form input").addClass('input-error');
            $("#register-section .register-input-error-message").text("Please fill in all input field.");
         }else if(error_password_not_match == true){
            $("#register-section form input[type='password']").addClass('input-error');
             $("#register-section .register-input-error-message").text("Password not match.");
         }else if(error_email_format == true){
            $("#register-section form input[name='email']").addClass('input-empty');
            $("#register-section .register-input-error-message").text("Please enter correct email format.");
         }else if(error_user_exist == true){
            $("#register-section .register-input-error-message").text("User already exist, please proceed to login");
         }

         $('#register-section .register-input-error-message').show();
     }

 </script>




