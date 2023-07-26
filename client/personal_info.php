<?php 
session_start();
include_once("../db/conn.php");
$get_supervisor=mysqli_query($conn,"SELECT * from supervisor where status='1'");

$success="";
$error="";
$id=$_SESSION['login_user'];
if (isset($_POST['submit'])) {
    echo "heeee";
    $ssn=$_POST['ssn'];
    $dob=$_POST['dob'];
    $signature=$_POST['sign'];

   


    $sql=mysqli_query($conn,"UPDATE individual SET ssn='$ssn',signature='$signature',dob='$dob' WHERE id='$id'");

    if ($sql==true) {
        echo "string";
        // $_SESSION['login_user'] = $id;
        $_SESSION['role'] = '3';
        $_SESSION['manage_role'] = '0';
        $_SESSION['manage_by'] = '0';
        header("Location: dashboard.php");

    }else{
        $error="Error: " . $sql . "<br>" . $conn->error;
    }

}

 ?>
<!DOCTYPE html>
<html lang="en">
    <?php include_once("includes/head.php")?>
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/authentication/form-2.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">
    <link rel="stylesheet" type="text/css" href="signature_assets/css/jquery_signature.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body class="form">
    

    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">Personal Info</h1>
                        
                        <form class="text-left" action="" method="POST">
                            <div class="form">

                                <div id="username-field" class="field-wrapper input">
                                    <label for="username">SSN</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <input id="username" name="ssn" type="text" required class="form-control" placeholder="SSN">
                                </div>

                                <div id="" class="field-wrapper input">
                                    <label for="email">DOB (date of birth)</label>
                                    <input id="dob" name="dob" type="date" required class="form-control" placeholder="DOB">
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">Signature</label>
                                        
                                    </div>
                                    <div class="row" id="sig">
                                                                
                                        <div class="col-md-8 " >
                                            <center><canvas id="sig-canvas" width="300" height="160">
                                                Get a better browser, bro.
                                            </canvas></center>
                                        </div>
                                    
                                        <div class="col-md-12" style="display:none">
                                            <input type="text" id="letterid" value="" >
                                            <textarea id="sig-dataUrl" class="form-control" required name="sign" rows="5"></textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row ml-1">
                                                <div class="col-md-11 mt-3">
                                                    <button type="button" class="btn btn-success"  id="sig-submitBtn">Save</button>
                                                </div>
                                                <div class="col-md-11 mt-3">
                                                    <button type="button" class="btn btn-default" id="sig-clearBtn">Clear</button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <center><img id="sig-image" style="display: none" src="" alt="Your signature will go here!"/></center>
                                        </div>
                                    </div>

                                </div>

                                

                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" name="submit" class="btn btn-danger" value="">Get Started!</button>
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
    <script  src="signature_assets/js/jquery.signature.js"></script>

</body>
</html>