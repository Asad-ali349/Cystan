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
        $url = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
        $email = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
        $phone = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
        $street = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
        $city = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
        $state = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
        $zip = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
        $country = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(8, $row)->getValue());
        $review_avg = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(9, $row)->getValue());
        $review_count = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(10, $row)->getValue());
        $credit_score = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(11, $row)->getValue());
        $annual_revinue = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(12, $row)->getValue());
        $loan_number = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(13, $row)->getValue());
        $id_number = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(14, $row)->getValue());
        $latitude = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(15, $row)->getValue());
        $longitude = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(16, $row)->getValue());
       
        $sql=mysqli_query($conn,"INSERT INTO company(name,website,contact,email,street,city,state,zip,country,review_avg,review_count,credit_score,anual_revenue,latitude,longitude,is_company,customer_id,loan_number) VALUES('$name','$url','$phone','$email','$street','$city','$state','$zip','$country','$review_avg','$review_count','$credit_score','$annual_revinue','$latitude','$longitude','1','$id_number','$loan_number')");

        // echo "name\t".$name."\n" ;
        // echo "url\t".$url."\n" ;
        // echo "email\t".$email."\n";
        // echo "phone\t".$phone ."\n";
        // echo "street\t".$street."\n";
        // echo "city\t".$city."\n";
        // echo "state\t".$state ."\n";
        // echo "zip\t".$zip."\n";
        // echo "country\t".$country."\n";
        // echo "review_avg\t".$review_avg."\n";
        // echo "review_count\t".$review_count."\n";
        // echo "credit_score\t".$credit_score ."\n";
        // echo "annual_revinue\t".$annual_revinue."\n"; 
        // echo "loan_number\t".$loan_number."\n" ;
        // echo "id_number\t".$id_number."\n";
        // echo "latitude\t".$latitude."\n" ;
        // echo "longitude\t".$longitude ."\n";

        
       }
        if ($sql==true) {
         $success="Company Added";
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
                                            <h2>Import Company</h2>
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