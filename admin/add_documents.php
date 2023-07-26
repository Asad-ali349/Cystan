<?php

include_once("db/session.php"); 


$user_id=$_SESSION['login_user'];
$success="";
$error="";
$cid=$_GET['id'];
$sup=mysqli_query($conn,"SELECT * FROM grouping WHERE category_id='5'");

if (isset($_POST['submit'])) {

    $name=$_POST['name'];
    $type=$_POST['filetype'];
    $date=$_POST['date'];

    $filename = date("Y-m-d-H-i-s").$_FILES["img"]["name"]; 
    $tempname = $_FILES["img"]["tmp_name"];     
    $folder = "documents/".$filename;
    if (move_uploaded_file($tempname, $folder)) {
        $sql=mysqli_query($conn,"INSERT INTO company_docs(name,type,upload_date,document,company_id) VALUES('$name','$type','$date','$filename','$cid')");
        if ($sql==true) {
            $success="Document Added";
        }else{
            $error="Error: " . $sql . "<br>" . $conn->error;
        }
    }   
         
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/head.php")?>

    <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css">
<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div>
</div></div>
    <!--  END LOADER -->

    <?php include_once("includes/topbar.php");?>    

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
                        <div class="col-lg-12 col-12 layout-spacing" >
                            
                            <div class="statbox widget box box-shadow mb-4">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h2>Add Documents</h2>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                       
                                        <div class="form-row mb-4">
                                             <div class="form-group col-md-12 mt-4">
                                                <h5>Document Details:</h5>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <select class="form-control select2" name="filetype" >
                                                    <option class="" value="">Select Document Type</option>
                                                    <?php
                                                    while ($data=mysqli_fetch_array($sup)) {
                                                    ?>
                                                    <option value="<?php echo $data['id']?>"><?php echo $data['name']?></option>
                                                    <?php        
                                                    }
                                                  ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="date" class="form-control" id="email" name="date"  required>
                                            </div>

                                           <div class="form-group col-md-4">
                                                <input type="file" class="form-control-file" id="file" name="img" >
                                            </div>
                                            <hr>
                                        </div>
                                   
                                        <center><button type="submit" name="submit" class="btn btn-danger mt-3">Add Document</button></center>
                                    </form>
                                </div>
                            </div>
                        </div>
                   
            </div>
            <?php include_once 'includes/footer.php'; ?>

        </div>
        <!--  END CONTENT PART  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="assets/js/custom.js"></script>
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
    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/scrollspyNav.js"></script>

    
</body>
</html>