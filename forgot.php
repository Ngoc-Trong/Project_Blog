<?php  //use PHPMailer\PHPMailer; ?>
<?php  include "include/db.php"; ?>
<?php  include "include/header.php"; ?>
<?php  include "admin/function.php" ?>

<?php 

require './vendor/autoload.php';
require './classes/config.php';



if( !isset($_GET['forgot'])){
    redirect('index.php');
}

if(ifItIsMethod('post')){
    if(isset($_POST['email'])){
        $email = $_POST['email'];
        $length = 50;
        $token = bin2hex(openssl_random_pseudo_bytes($length));
        if(email_exist($email)){
            if($stmt = mysqli_prepare($connection, "UPDATE users SET token='{$token}' WHERE user_email = ?")){
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);

                // configure PHPMailer
                $mail = new PHPMailer();
                
                $mail->isSMTP();
                $mail->Host       = config::SMTP_HOST;                     //Set the SMTP server to send through
                $mail->Username   = config::SMTP_USER;                     //SMTP username
                $mail->Password   = config::SMTP_PASSWORD;                               //SMTP password
                $mail->Port       = config::SMTP_PORT;
                $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                $mail->SMTPAuth   = true; 
                $mail->isHTML(true);
                $mail->CharSet="UTF-8";
                
                $mail->setFrom('hoaganheo@gmail.com','ad');
                $mail->addAddress($email);

                $mail->Subject = '<p>Please click here to reset your password </p> <a href=""></a>';
                $mail->Body = 'Please click to reset your password
                <a href="http://localhost:8080/cms/reset.php?email='.$email.'&token='.$token.'">Reset Password</a>';

                if($mail->send()){
                    $email_sent = true;
                }else{
                    $email_sent = false;
                }

            }else{
                echo "WRONG";
            }
        }


        //$token = md5(uniqid(rand(), true));
    }
}
?>


<!-- Page Content -->
<div class="container">

    <div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">

                <?php if(!isset($email_sent)): ?>

                                <h3><i class="fa fa-lock fa-4x"></i></h3>
                                <h2 class="text-center">Forgot Password?</h2>
                                <p>You can reset your password here.</p>
                                <div class="panel-body">




                                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">

                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                                <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                        </div>

                                        <input type="hidden" class="hide" name="token" id="token" value="">
                                    </form>

                                </div><!-- Body-->
                                <?php else:?>
                                    <h2>Please check your email</h2>
                                <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <hr>

    <?php include "include/footer.php";?>

</div> <!-- /.container -->

