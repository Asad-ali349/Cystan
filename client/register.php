<?php 
session_start();
include_once("../db/conn.php");
$success=false;
$error="";



if (isset($_POST['submit'])) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $verfication_code=random_int(100000, 999999);
       


    $sql=mysqli_query($conn,"INSERT INTO individual(name,email,password,token) VALUES('$name','$email','$pass','$verfication_code')");
    if ($sql==true) {
        $get_id=mysqli_fetch_array(mysqli_query($conn,"SELECT id from individual where name='$name'AND email='$email'AND password='$pass'"));
        $id=$get_id['id'];
        $_SESSION['login_user'] = $id;
        $_SESSION['manage_by']=0;
        $_SESSION['manage_role']=0;
        $_SESSION['email']=$eamil;
        $success="Registered successfully";
        $_SESSION['verfication_code']=$verfication_code;
        // $msg="Your verfication code is ".$verfication_code;
        // $msg = wordwrap($msg, 70, "\r\n");
        // $mailsuccess=mail($email,"Verfication Code",$msg);
        // if (!$mailsuccess) {
        //     $response = error_get_last()['message'];
        //     $error =$response;
        // }else{
            ?>        
            <div class="alert alert-success mb-4 " role="alert" id="alert">

                <strong>Success! </strong><?php echo $success;?>
            </div> 
            <?php        
            
            header("Location: verification.php");
            
        // }
        


    }else{
        $error="Email: " . $email . " already registered";
    }

}


 ?>
<!DOCTYPE html>
<html lang="en">
    <?php include_once("includes/head.php")?>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/authentication/form-2.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">
     <link href="assets/css/components/cards/card.css" rel="stylesheet" type="text/css" />

<body class="form">
    

    <div class="form-container outer">
        <?php 
            if ($success!="") {

                ?>        
                <div class="alert alert-success mb-4 " role="alert" id="alert">

                    <strong>Success! </strong><?php echo $success;?>
                </div> 
                <?php        
            }elseif ($error!="") {
                ?>        
                <div class="alert alert-danger mb-4" role="alert" id="alert">

                    <strong>Error! </strong><?php echo $error;?>
                </div> 
                <?php         
            }
            ?>
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">Register</h1>
                        <p class="signup-link register">Already have an account? <a href="index.php">Log in</a></p>
                        <form class="text-left" action="" method="POST">
                            <div class="form">

                                <div id="username-field" class="field-wrapper input">
                                    <label for="username">FULL NAME</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <input id="username" name="name" type="text" class="form-control" placeholder="Full Name" required>
                                </div>

                                <div id="email-field" class="field-wrapper input">
                                    <label for="email">EMAIL</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                    <input id="email" name="email" type="text" value="" class="form-control" required placeholder="Email">
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">PASSWORD</label>
                                        
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password" name="password" onkeyup="checkpass()" type="password" required class="form-control" placeholder="Password">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                </div>
                                <div id="password-field" class="field-wrapper input mb-2">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">CONFIRM PASSWORD</label>
                                        
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="cpass" name="cpass" type="password" required onkeyup="checkpass()" class="form-control" placeholder="Confirm Password">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    <span id="msg"></span>                                   
                                </div>
                                        
                                <div class="field-wrapper terms_condition">
                                    <div class="n-chk">
                                        <label class="new-control new-checkbox checkbox-primary">
                                          <input type="checkbox" class="new-control-input" required>
                                          <span class="new-control-indicator"></span><span>I agree to the <a data-toggle="modal" data-target="#modal">  terms and conditions </a></span>
                                        </label>
                                    </div>

                                </div>

                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" name="submit" class="btn btn-danger" value="">Register</button>
                                    </div>
                                </div>

                                

                            </div>
                        </form>
                        <div class="modal md" id="modal" tabindex="-1" role="dialog">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" style="color:#e72913;font-weight: 50px; font-size: 30px;">Terms & Conditions</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                              </div>
                              
                            </div>
                          </div>
                        </div>
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
    <script>
        setTimeout(()=> {
            $('#alert').hide('slow')
        }, 1000)
        
        

        function checkpass(){
            var pass=$('#password').val()
            var cpass=$('#cpass').val()

            if (pass!=cpass) {
                console.log(pass,cpass)
                $('#msg').text('not Matched')
                $('#msg').css('color','red')
                $('#msg').css('display','block')
            }else{
                console.log(pass,cpass)
                console.log(" Matched")
                $('#msg').css('display','none')
            }
        }
    </script>
    
</body>
</html>