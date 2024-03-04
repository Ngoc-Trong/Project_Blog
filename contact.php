<?php  include "include/db.php"; ?>
 <?php  include "include/header.php"; ?>

<?php


if(isset($_POST['submit'])){
    $to = "hoangbuingoctrong@gmail.com";
    $subject = wordwrap($_POST['subject'],70);
    $body = $_POST['body'];
    $header = $_POST['email'];
    $headers = "From: $header" . "\r\n" .
    "CC: hoangbuingoctrong@gmail.com";
    mail($to,$subject,$body,$headers);
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
                <h1>Contact</h1>
                
                    <form role="form" action="contact.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="email" class="sr-only">username</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email">
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter Your Subject">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="body" id="body" cols="50" rows="10"></textarea>
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Submit">
                    </form>
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "include/footer.php";?>
