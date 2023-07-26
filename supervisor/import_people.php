<?php

include_once("db/session.php"); 


$user_id=$_SESSION['login_user'];
$success="";
$error="";
$output = '';
if(isset($_POST["import"]))
{

  $arrayVar = explode(".", $_FILES["excel"]["name"]);
  $extension = end($arrayVar);


  $file_ext = end($arrayVar); // For getting Extension of selected file
  $extension=strtolower($file_ext);
     $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
     if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
     {
      $file = $_FILES["excel"]["tmp_name"];
       // getting temporary source of excel file


      include("PHPExcel/PHPExcel-1.8/Classes/PHPExcel/IOFactory.php"); 



      // Add PHPExcel Library in this code
      $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file

      // $output .= "<label class='text-success'>Data Inserted</label><br /><table class='table table-bordered'>";
      foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
      {
       $highestRow = $worksheet->getHighestRow();
       for($row=2; $row<=$highestRow; $row++)
       {
        // $output .= "<tr>";

        //exce rows
       
        $name = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
        $email = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
        $phone = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
        $street = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
        $city = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
        $state = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
        $zip = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
        $country = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
        $credit_score = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(8, $row)->getValue());
        $loan_number = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(9, $row)->getValue());
        $id_number = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(10, $row)->getValue());
        $latitude = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(11, $row)->getValue());
        $longitude = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(12, $row)->getValue());
       
        $sql=mysqli_query($conn,"INSERT INTO individual(name,phone,email,street,city,state,zip,country,credit_score,lattitude,longitude,id_number,loan_number,manage_by, manage_role, role, added_by) VALUES('$name','$phone','$email','$street','$city','$state','$zip','$country','$credit_score','$latitude','$longitude','$id_number','$loan_number','1','1','1','1')");

       }
        if ($sql==true) {
         $success="Individual Added";
        }else{
            $error="Error: " . $sql . "<br>" . $conn->error;
        }
      }
      

     }
     else
     {
       $error="Please Select Excel File";
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
                                <div class="alert alert-danger mb-4" role="alert" id="alert">
                                    
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
                                            <h2>Import Individual</h2>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                       
                                        <div class="form-row mb-4">
                                             <div class="form-group col-md-12 mt-4">
                                                <h5>Choose File:</h5>
                                            </div>
                                            

                                           <div class="form-group col-md-4">
                                                <input type="file" class="form-control-file" id="file" name="excel" >
                                            </div>
                                            <hr>
                                        </div>
                                   
                                        <center><button type="submit" name="import" class="btn btn-danger mt-3">Import</button></center>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- <?php
                           echo $output;
                        ?> -->
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