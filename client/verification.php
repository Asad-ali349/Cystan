<?php 
session_start();
include_once("../db/conn.php");
$success="";
$error="";
$id=$_SESSION['login_user'];

$verification_code=$_SESSION['verfication_code'];
echo $verification_code;
if (isset($_POST['submit'])) {
    $code=$_POST['code'];
    if ($verification_code==$code) {
        $query=mysqli_query($conn,"UPDATE individual SET is_verified='1' WHERE id='$id'");
        if ($query==true) {
            // code...
            header("Location: personal_info.php");
        }else{
            $error=$conn->error;
        }
    }else{
        ?>        
        <div class="alert alert-danger mb-4" role="alert" id="alert">

            <strong>Error! </strong><?php echo "Incorrect Verification Code";?>
        </div> 
        <?php 
    }

}


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Password Recovery Boxed | CORK - Multipurpose Bootstrap Dashboard Template </title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/authentication/form-2.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">
</head>
<body class="form no-image-content">
    

    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">Email Verification</h1>
                        <p class="signup-link recovery">Enter verification code that sent to your mail!</p>
                        <form class="text-left" action="" method="POST">
                            <div class="form">

                                <!-- <div id="email-field" class="field-wrapper input">
                                    <div class="d-flex justify-content-between">
                                        <label for="email">6-Digit Code</label>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                </div> -->
                                <div class="field-wrapper input">
                                    
                                    <input id="code" name="code" type="text" class="form-control" value="" placeholder="6-digit Code" minlength="6" maxlength="6" required>
                                </div>

                                <div class="d-sm-flex justify-content-between">

                                    <div class="field-wrapper">
                                        <button type="submit" name="submit" class="btn btn-danger" value="">Verify</button>
                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>                    
                </div>
            </div>
        </div>
    </div>

    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/authentication/form-2.js"></script>
    <script type="text/javascript">
        setTimeout(()=> {
            $('#alert').hide('slow')
        }, 1000)
    </script>
</body>
</html>