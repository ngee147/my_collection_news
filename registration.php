<?php
    include_once 'view/tab-header.php';
?>

<link rel="stylesheet" href="css/registration.css" type="text/css">
<script>
    $(document).ready(function(){
        /* page load init*/
        $(".header-right a").eq(1).addClass('active');
        $('.input-error-message').hide();

        /*registration submit*/
         $("#register-section form").on('submit', function (event) {
                   event.preventDefault();
                   var name = $("#register-section form input[name='name']").val();
                   var email = $("#register-section form input[name='email']").val();
                   var password = $("#register-section form input[name='password']").val();
                   var password_repeat = $("#register-section form input[name='password-repeat']").val();
                   var submit = $("#register-section form button[name='submit']").val();

                    $(".register-input-error-message").load("controllers/registration.inc.php",
                    {
                        name: name,
                        email:email,
                        password:password,
                        password_repeat:password_repeat,
                        submit:submit
                    });
        });
    });
</script>

<div id="register-section">
    <form  action="controllers/registration.inc.php" method="POST">
        <div class="container">
            <h1>Register</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>

            <label for="name"><b>Name</b></label>
            <input type="text" placeholder="Enter Name" name="name" >

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" >

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" >

            <label for="password-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="password-repeat" >
            
            <div class="register-input-error-message"></div>
            
            <hr>

            <button type="submit" name="submit" class="registerbtn">Register</button>
        </div>
        
        <div class="container signin">
            <p>Already have an account? <a onclick="document.getElementById('login-modal').style.display='block'">Sign in</a>.</p>
        </div>
    </form>
</div>

<?php
    include_once 'view/footer.php';
?>