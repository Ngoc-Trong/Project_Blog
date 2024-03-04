<?php  include "include/db.php"; ?>
<?php  include "include/header.php"; ?>
<?php include 'admin/function.php'; ?>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $error = [
        'username'=>'',
        'email'=>'',
        'password'=>'',
    ];

    if($username == ''){
        $error['username'] = 'Username can not empty';
    }

    if(user_exist($username)){
        $error['username'] = 'Username already exist';
    }

    if($username == ''){
        $error['email'] = 'Email can not empty';
    }

    if(email_exist($email)){
        $error['email'] = 'Email already exist';
    }

    if($password == ''){
        $error['password'] = 'password can not empty';
    }

    foreach($error as $key => $value){
        if(empty($value)){
            unset($error[$key]);
        }
    }
    if(empty($error)){
        register_user($username,$email,$password);
        login_user($username,$password);
    }
}

?>


    <!-- Navigation -->
    
    <?php  include "include/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" autocomplete="on" value="<?php echo isset($username) ? $username : '' ?>">
                        <p> <?php echo isset($error['username']) ? $error['username'] : '' ?></p>
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com"  placeholder="Enter Desired Username" autocomplete="on" value="<?php echo isset($email) ? $email : '' ?>">
                        <p> <?php echo isset($error['email']) ? $error['email'] : '' ?></p>
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                            <p> <?php echo isset($error['password']) ? $error['password'] : '' ?></p>
                        </div>
                
                        <input type="submit" name="register" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "include/footer.php";?>
