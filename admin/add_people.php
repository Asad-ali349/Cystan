<?php
include_once("db/session.php"); 


$user_id=$_SESSION['login_user'];
$success="";
$error="";
$companies=mysqli_query($conn,"SELECT * FROM company WHERE status='1'");
$peopleG=mysqli_query($conn,"SELECT * FROM grouping WHERE category_id='2'");
$colors=mysqli_query($conn,"SELECT * FROM pin_color");


if (isset($_POST['submit'])) {

    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    // $count=$_POST['count'];  
    $score=$_POST['score'];
    $latitude=$_POST['latitude'];
    $longitude=$_POST['longitude'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $zip=$_POST['zip'];
    $country=$_POST['country'];
    $group=$_POST['group']; 
    $idNumber=$_POST['id_number'];
    $loan=$_POST['loan'];   
    $ssn=$_POST['ssn'];   


        $sql=mysqli_query($conn,"INSERT INTO individual (name, email, phone, group_id, id_number, loan_number, ssn, street, city, state, zip, country, credit_score, lattitude, longitude, manage_by, manage_role, role, added_by) VALUES('$name','$email','$phone','$group','$idNumber','$loan','$ssn','$address','$city','$state','$zip','$country','$score','$latitude','$longitude','0','0','0','0')");
        if ($sql==true) {
             $success="People Added";
        }else{
            $error= "Group Not Selected";
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
                                            <h2>Add Individual</h2>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form action="" method="POST">
                                       
                                        <div class="form-row mb-4">
                                             <div class="form-group col-md-12 mt-4">
                                                <h5>Personal Details:</h5>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <input type="phone" class="form-control" id="" name="phone" placeholder="Phone" required>
                                            </div>

                                            
                                            <div class="form-group col-md-4">
                                                <select class="form-control select2" name="group" >
                                                    <option class="" value="">Select People Group</option>
                                                   <?php
                                                    while ($data=mysqli_fetch_array($peopleG)) {
                                                  ?>
                                                    <option value="<?php echo $data['id']?>"><?php echo $data['name']?></option>
                                                    <?php        
                                                    }
                                                  ?>
                                                </select>
                                            </div>
                                            
                                             <div class="form-group col-md-4">
                                                <input type="text" class="form-control" id="id_number" name="id_number" placeholder="Enter ID Number" >
                                            </div>

                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control" id="loan" name="loan" placeholder="Enter Loan Number" >
                                            </div>

                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control" id="ssn" name="ssn" placeholder="Enter SSN" >
                                            </div>
                                           

                                            <hr>

                                           <div class="form-group col-md-12 mt-4">
                                                <h5>Address Details:</h5>
                                            </div>


                                            <div class="form-group col-md-8">
                                                <input type="text" class="form-control" id="" name="address" placeholder="Street Address" >
                                            </div>
                                             <div class="form-group col-md-4">
                                                <input type="text" class="form-control" id="" name="city" placeholder="Enter City" >
                                            </div>
                                             <div class="form-group col-md-4">
                                                <input type="text" class="form-control" id="" name="state" placeholder="Enter State" >
                                            </div>
                                             <div class="form-group col-md-4">
                                                <input type="text" class="form-control" id="" name="zip" placeholder="ZIP " >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control" id="" name="country" placeholder="Country" >
                                            </div>
                                             <div class="form-group col-md-4">
                                                <input type="number" class="form-control" id="" name="score" placeholder="Enter Credit Score " >
                                            </div>
                                             <div class="form-group col-md-4">
                                                <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Enter Latitude " readonly>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Enter Longitude" readonly>
                                            </div>
                                            <div id="googleMap" style="width:100%;height:400px;"></div>
                                             <hr>


                                        </div>
                                   
                                        <center><button type="submit" name="submit" class="btn btn-danger mt-3">Add Individual</button></center>
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
     <script>
        function myMap() {
        var mapProp= {
            center:new google.maps.LatLng(51.508742,-0.120850),
            zoom:5,
        };
        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
        var marker;
        google.maps.event.addListener(map, 'click', function(event) {
        // alert(event.latLng.lat() + ", " + event.latLng.lng());
        $('#latitude').val(event.latLng.lat());
        $('#longitude').val(event.latLng.lng());
         if (marker && marker.setMap) {
            marker.setMap(null);
          }
         marker = new google.maps.Marker({
            position: {
                lat: event.latLng.lat(),
                lng: event.latLng.lng()
            },
            map: map,
            title: event.latLng.lat()+","+event.latLng.lng()
        });

        });

        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzLNZx3N6WSK_-i0I2hr8VUEQWrVBFn2s&callback=myMap"></script>
    
</body>
</html>