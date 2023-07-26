<?php 
    
    include("../db/letter_session.php");
    $user_id=$_SESSION['login_user']; 
    $srid=$_GET['srid'];
    $bureaus=mysqli_query($conn,"SELECT * FROM bureau");
    
    $success="";
    $error="";
    if (isset($_POST['submit'])) {
    
        $bureau=$_POST['bureau'];
        $date=$_POST['date'];
        $dob=$_POST['dob'];
        $residence=$_POST['residence'];
        $fname=$_POST['fname'];
        $balance=$_POST['balance'];
        $additional=$_POST['additional'];
        $additional=htmlspecialchars($additional);
        $additional =str_replace("'", "&apos;", $additional);
        $additional=str_replace('"', "&quot;", $additional);

        // print_r($_POST);

        $add_letter=mysqli_query($conn,"INSERT INTO `letter_1`(b_id,datee,req_id,note,dob,residence,former_name,balance) VALUES('$bureau','$date','$srid','$additional','$dob','$residence','$fname','$balance')");
        if ($add_letter) {
        	$get_id=mysqli_fetch_array(mysqli_query($conn,"SELECT id from letter_1 WHERE `b_id`='$bureau' AND `datee`='$date' AND `req_id`='$srid' AND `dob`='$dob' AND `residence`='$residence' AND `note`='$additional' AND `former_name`='$fname' AND `balance`='$balance'"));
                $lid=$get_id['id'];
                
            header("Location: letter_preview1.php?id=$lid");    
        }else{
            echo "Error: ".$conn->error;
        }
    
    }

    $get_service=mysqli_query($conn,"SELECT * from services");
    
     ?>
<!DOCTYPE html>
<html lang="en">
    <?php include_once("includes/head.php")?>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="../plugins/select2/select2.min.css">
    <link rel="stylesheet" href="../plugins/editors/markdown/simplemde.min.css">
    <body>
        <!-- BEGIN LOADER -->
        <div id="load_screen">
            <div class="loader">
                <div class="loader-content">
                    <div class="spinner-grow align-self-center"></div>
                </div>
            </div>
        </div>
        <!--  END LOADER -->
        <?php include_once("includes/head_for_letter.php");?>
        <!--  BEGIN MAIN CONTAINER  -->
        <div class="main-container" id="container">
            <?php include_once("includes/sidenav.php");?>
            <!--  BEGIN CONTENT PART content -->
            <div id="content" class="main-content">
                <div class="layout-px-spacing mt-4">
                    <?php 
                        if ($success!="") {
                        
                        ?>        
                    <div class="alert alert-success mb-4 " role="alert" id="alert">
                        <strong>Success! </strong><?php echo $success;?>
                    </div>
                    <?php        
                        }elseif ($error!="") {
                        ?>        
                    <div class="alert alert-danger mb-4" role="alert">
                        <strong>Error! </strong><?php echo $error;?>
                    </div>
                    <?php         
                        }
                        ?>
                    <div class="col-lg-12 col-12 layout-spacing">
                        <div class="statbox widget box box-shadow mb-4">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h2>Request for Credit Report </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <form action="" method="POST" >
                                    <div class="form-row mb-4">
                                        <div class="form-group col-md-12 mt-4">
                                            <label>Change Service letter:</label>
                                            <select class="form-control select2" id="service" onchange="changeletter('service')">
                                                <option class="" value="">Select Service</option>
                                                <?php
                                                    while ($data=mysqli_fetch_array($get_service)) {
                                                    ?>
                                                <option value="<?php echo $data['id']?>"><?php echo $data['title']?></option>
                                                <?php        
                                                    }
                                                    ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Date:</label>
                                            <input type="date" name="date" class="form-control" required> 
                                        </div>
                                        <div class="form-group col-md-6" required>
                                            <label>Bureau:</label>
                                            <select class="form-control select2" id="letter" name="bureau">
                                                <option class="" value="">Select Bureau</option>
                                                <?php
                                                    while ($data2=mysqli_fetch_array($bureaus)) {
                                                    ?>
                                                <option value="<?php echo $data2['id']?>"><?php echo $data2['title']?></option>
                                                <?php        
                                                    }
                                                    ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>DOB:</label>
                                            <input type="date" name="dob" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Past Residence:</label>
                                            <input type="text" name="residence" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Former Name:</label>
                                            <input type="text" name="fname" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>balance:</label>
                                            <input type="text" name="balance" class="form-control" required>
                                        </div>
                                        
                                        
                                        <div class="form-group col-md-12 mt-4" >
                                            <label>Additional Notes</label>
                                            <textarea id="editor" name="additional" rows="5"></textarea>
                                        </div>
                                        <hr>
                                    </div>
                                    <center><button type="submit" name="submit" class="btn btn-danger mt-3">Create Letter</button></center>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include_once '../includes/footer.php'; ?>
            </div>
            <!--  END CONTENT PART  -->
        </div>
        <!-- END MAIN CONTAINER -->
        <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
        <script src="../assets/js/libs/jquery-3.1.1.min.js"></script>
        <script src="../bootstrap/js/popper.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="../assets/js/app.js"></script>
        <script>
            $(document).ready(function() {
                App.init();
            });
        </script>
        <script src="../../assets/js/custom.js"></script>
        <!-- END GLOBAL MANDATORY SCRIPTS -->
        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script >
            $(document).ready(function() {
                $('.select2').select2();
            });
            
            setTimeout(()=> {
                $('#alert').hide('slow')
            }, 5000)
            
        </script>
        <script src="../plugins/highlight/highlight.pack.js"></script>
        <script src="../assets/js/custom.js"></script>
        <script src="../assets/js/scrollspyNav.js"></script>
        
        <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
        
        <script>
            ClassicEditor.create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
        <script type="text/javascript">
            function changeletter(id){
                // console.log(id)
                var letter_no=$('#'+id).val();

                var req_id=<?php echo $srid; ?>

                // console.log("Letter No "+letter_no+" request id "+req_id)
                location.href="letter"+letter_no+".php?srid="+req_id
            }
        </script>
    </body>
</html>