<?php
include_once("db/session.php"); 


$user_id=$_SESSION['login_user'];
$sid=$_GET['id'];

$success="";
$error="";

if (isset($_POST['submit'])) {
    

    $name=$_POST['title'];
    $sType=$_POST['service_type'];
    $note=$_POST['note'];
    $note =str_replace("'", "&apos;", $note);
    $note=str_replace('"', "&quot;", $note);
   
            
    $sql=mysqli_query($conn,"UPDATE services SET title='$name',description='$note',service_type='$sType' WHERE id='$sid'");
        if ($sql==true) {
            $success="Service Updated";
        }else{
            $error="Error: " . $sql . "<br>" . $conn->error;
        }
    


     
}
// title price image service_type note

$groups=mysqli_query($conn,"SELECT * FROM grouping  WHERE category_id='6'");
$get_services=mysqli_query($conn,"SELECT * FROM services  WHERE id='$sid'");
$result=mysqli_fetch_array($get_services);


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
                        <div class="col-lg-12 col-12 layout-spacing">
                            
                            <div class="statbox widget box box-shadow mb-4">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h2>Update Services</h2>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                       
                                        <div class="form-row mb-4">
                                             <div class="form-group col-md-12 mt-4">
                                                <h5>Services Details:</h5>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="title" name="title" value="<?php echo $result['title']?>" required>
                                            </div>
                                            
                                             <div class="form-group col-md-6">
                                                
                                                <select class="form-control select2" name="service_type">
                                                    
                                                    <?php
                                                    while ($data2=mysqli_fetch_array($groups)) {

                                                        if ($result['service_type']==$data2['id']) {
                                                    ?>
                                                        <option value="<?php echo $data2['id']?>" selected><?php echo $data2['name']?></option>
                                                    <?php        
                                                        }else{

                                                    ?>
                                                        <option value="<?php echo $data2['id']?>"><?php echo $data2['name']?></option>
                                                    <?php        
                                                        }       
                                                    }
                                                  ?>
                                                </select>
                                            </div>
                                            
                                            
                                          
                                            <div class="form-group col-md-12">
                                                <textarea type="text" class="form-control" id="" rows="5" name="note" placeholder="Enter Description "><?php echo $result['description']?></textarea>
                                            </div>
                                             <hr>
                                        </div>
                                   
                                        <center><button type="submit" name="submit" class="btn btn-danger mt-3">Update Service</button></center>
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