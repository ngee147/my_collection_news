<?php

include_once '../database/dbh.inc.php';
include_once '../models/user-session.inc.php';

    if(isset($_POST['submit'])){

        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        /*Error param*/
        $error_empty = false;
        $error_email_format = false;
        $error_not_exist = false;

        /*success param*/
        $seccuss_login = false;

        if(empty($email) || empty($password)){
            $error_empty = true;
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error_email_format = true;
        }else{
            $conn = DBH::getInstance();

                /*login data validation*/
                $stmt = $conn->prepare("SELECT * FROM usersinfo WHERE email = ? AND password = ? LIMIT 1");
                $stmt->execute([$email, md5($password)]);
                $count = $stmt->rowCount();

                if($count < 1){
                     $error_not_exist = true;
                }else{
                     $seccuss_login = true;
                     $user_session = new UserSession();
 
                     /*set seesion to cookie*/
                    $user_session->setUserSessionKey($email);

                    echo '<script>location.href="index.php";</script>' ;
                    //header ("Location: ../index.php?login=success");      
                }
        }

    }else{
        echo "SYSTEM ERROR";
    }

?>

<script>

     var error_empty = "<?php echo $error_empty; ?>";
     var error_email_format = "<?php echo $error_email_format; ?>";
     var error_not_exist = "<?php echo $error_not_exist; ?>";
     var seccuss_login = "<?php echo $seccuss_login; ?>";

     //   /*reset all default design*/
      $("#login-modal form input").removeClass('input-error');
      $('#login-modal .input-error-message').css({
            "color": "red", 
            "border": "1px solid red"
      });
        $('#register-section .input-error-message').hide();

        if(seccuss_login != true){
          if(error_empty == true){
            $("#login-modal form input").addClass('input-error');
            $("#login-modal .input-error-message").text("Please fill in all input field.");
         }else if(error_email_format == true){
            $("#login-modal form input[name='uname']").addClass('input-error');
            $("#login-modal .input-error-message").text("Please enter correct email format.");
         }else if(error_not_exist == true){
             $("#login-modal .input-error-message").text("Email and password combination not corerct.");
         }

         $('#register-section .input-error-message').show();
        }

</script>



