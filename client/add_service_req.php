<?php
include_once("db/session.php"); 


$user_id=$_SESSION['login_user'];
$sid=$_GET['sid'];
$service=mysqli_query($conn,"SELECT * FROM services  WHERE id='$sid'");
$result=mysqli_fetch_array($service);

$success="";
$error="";




?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/head.php")?>

    <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
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
                                            <h2>Add Services Request</h2>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                  
                                    <form action="upload_request.php" enctype="multipart/form-data" method="POST">
                                        <h5>Service Title: <strong style="color: #E72913;font-weight: 700;font-size: 24px"><?php echo $result['title'] ?></strong></h5>
                                        <input type="text"  value="<?php echo $sid ?>" id="sid" name="sid" style="display: none;">
                                        <textarea class="form-control mt-4" id="description" placeholder="description"></textarea>
                                        

                                        <div class="dropzone mt-4" id="myDropzone" name="docs" ></div>
                                        <button type="submit" class="btn btn-danger mt-4" id="submit-all"> upload </button>
                                            
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
     <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Dropzone.options.myDropzone= {
    url: 'upload_request.php',
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 50,
    maxFiles: 50,
    maxFilesize: 20,
    acceptedFiles: 'image/*',
    addRemoveLinks: true,
    success: function(file, response){
        Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: "Request Sent",
          showConfirmButton: false,
          timer: 1500,
          width:420
        })

        setTimeout(()=> {
            window.location.href="request_detail_page.php?id="+response;
        }, 1500)

    },
    init: function() {
        dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

        // for Dropzone to process the queue (instead of default form behavior):
        document.getElementById("submit-all").addEventListener("click", function(e) {
            // Make sure that the form isn't actually being sent.
            e.preventDefault();
            e.stopPropagation();
            dzClosure.processQueue();
        });

        //send all the form data along with the files:
        this.on("sendingmultiple", function(data, xhr, formData) {
            formData.append("description", $("#description").val());
            formData.append("sid", $("#sid").val());
        });
    }
}
    </script> 
    
</body>
</html>