<?php
include_once("db/session.php"); 


$user_id=$_SESSION['login_user'];

$success="";
$error="";

$id=$_GET['id'];


$companies=mysqli_query($conn,"SELECT * FROM individual WHERE status='1'");
$peopleG=mysqli_query($conn,"SELECT * FROM grouping WHERE category_id='2'");
$colors=mysqli_query($conn,"SELECT * FROM pin_color");


if (isset($_POST['submit'])) {

    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];  
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
    $signature=$_POST['sign'];
    if ($signature=="") {
        $sql=mysqli_query($conn,"UPDATE individual SET name='$name',email='$email',ssn='$ssn', phone='$phone',street='$address',city='$city',state='$state',zip='$zip',country='$country',credit_score='$score',lattitude='$latitude',longitude='$longitude',group_id='$group' ,id_number='$idNumber',loan_number='$loan' WHERE id='$id'");
        if ($sql==true) {
             $success="People Updated";
        }else{
            $error= "Error: " . $sql . "<br>" . $conn->error;
        }
    }else{
        $sql=mysqli_query($conn,"UPDATE individual SET name='$name',email='$email',ssn='$ssn', phone='$phone',street='$address',city='$city',state='$state',zip='$zip',country='$country',credit_score='$score',lattitude='$latitude',longitude='$longitude',group_id='$group' ,id_number='$idNumber',loan_number='$loan',signature='$signature' WHERE id='$id'");
        if ($sql==true) {
             $success="People Updated";
        }else{
            $error= "Error: " . $sql . "<br>" . $conn->error;
        }
    }  

     
}

$people=mysqli_query($conn,"SELECT individual.id,individual.name,individual.ssn,individual.email,individual.phone,individual.group_id,individual.street,individual.city,individual.state,individual.zip,individual.country,individual.credit_score,individual.lattitude,individual.longitude,grouping.name AS group_name,individual.id_number,individual.loan_number FROM individual LEFT JOIN grouping ON grouping.id=individual.group_id WHERE individual.id='$id'");
$peopleData=mysqli_fetch_array($people);


?>

<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/head.php")?>

    <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="signature_assets/css/jquery_signature.css">
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
                        <div class="col-lg-12 col-12 layout-spacing"  >
                            <div class="statbox widget box box-shadow mb-4">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h2>Edit Individual</h2>
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
                                                <label>Name:</label>
                                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $peopleData['name']?>" required>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label>Email:</label>
                                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $peopleData['email']?>" required>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label>Phone:</label>
                                                <input type="phone" class="form-control" id="" name="phone" value="<?php echo $peopleData['phone']?>" required>
                                            </div>

                                            
                                            <div class="form-group col-md-4">
                                                <label>People Group:</label>
                                                <select class="form-control select2" name="group" required>
                                                    <option class="" value="<?php echo $peopleData['group_id']?>">
                                                        <?php echo $peopleData['group_name'];?></option>
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
                                                <label>ID Number:</label>
                                                <input type="text" class="form-control" id="id_number" name="id_number" value="<?php echo $peopleData['id_number']?>" required>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label>Loan Number:</label>
                                                <input type="text" class="form-control" id="loan" name="loan" value="<?php echo $peopleData['loan_number']?>" >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>SSN:</label>
                                                <input type="text" class="form-control" id="ssn" name="ssn" value="<?php echo $peopleData['ssn']?>" >
                                            </div>
                                           

                                            <div id="password-field" class="field-wrapper input mb-2 col-md-12">
                                                <div class="d-flex justify-content-between">
                                                    <label for="password">Signature</label>
                                                    
                                                </div>
                                                <div class="row" id="sig">
                                                                            
                                                    <div class="col-md-12 " >
                                                        <center><canvas id="sig-canvas" width="300" height="160">
                                                            Get a better browser, bro.
                                                        </canvas></center>
                                                    </div>
                                                
                                                    <div class="col-md-12" style="display:none">
                                                        <input type="text" id="letterid" value="" >
                                                        <textarea id="sig-dataUrl" class="form-control" name="sign" rows="5"></textarea>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row ml-1">
                                                            <div class="col-md-6 mt-3 " >
                                                                <button type="button" style="float:right;" class="btn btn-success"  id="sig-submitBtn">Save</button>
                                                            </div>
                                                            <div class="col-md-6 mt-3">
                                                                <button type="button" class="btn btn-dark" id="sig-clearBtn">Clear</button>
                                                                
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

                                            <hr>

                                           <div class="form-group col-md-12 mt-4">
                                                <h5>Address Details:</h5>
                                            </div>


                                            <div class="form-group col-md-8">
                                                <label>Street:</label>
                                                <input type="text" class="form-control" id="" name="address" value="<?php echo $peopleData['street']?>" >
                                            </div>
                                             <div class="form-group col-md-4">
                                                <label>City:</label>
                                                <input type="text" class="form-control" id="" name="city" value="<?php echo $peopleData['city']?>" >
                                            </div>
                                             <div class="form-group col-md-4">
                                                <label>State:</label>
                                                <input type="text" class="form-control" id="" name="state" value="<?php echo $peopleData['state']?>" >
                                            </div>
                                             <div class="form-group col-md-4">
                                                <label>Zip:</label>
                                                <input type="text" class="form-control" id="" name="zip" value="<?php echo $peopleData['zip']?>" >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Country:</label>
                                                <input type="text" class="form-control" id="" name="country" value="<?php echo $peopleData['country']?>" >
                                            </div>
                                             <div class="form-group col-md-4">
                                                <label>Credit Score:</label>
                                                <input type="number" class="form-control" id="" name="score" value="<?php echo $peopleData['credit_score']?>" >
                                            </div>
                                             <div class="form-group col-md-4">
                                                <label>Latitude:</label>
                                                <input type="text" class="form-control" id="latitude" name="latitude" value="<?php echo $peopleData['lattitude']?>" >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Longitude:</label>
                                                <input type="text" class="form-control" id="longitude" name="longitude" value="<?php echo $peopleData['longitude']?>" >
                                            </div>
                                            <div id="googleMap" style="width:100%;height:400px;"></div>
                                             <hr>


                                        </div>
                                   
                                        <center><button type="submit" name="submit" class="btn btn-danger mt-3">Update Individual</button></center>
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
        }, 1000)
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

        var x=document.getElementById("latitude").value;
        var y=document.getElementById("longitude").value;
        x=parseFloat(x)
        y=parseFloat(y)
         marker = new google.maps.Marker({
            position: {
                lat: x,
                lng: y
            },
            map: map,
            title: x+","+y
        });


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
    <script  src="signature_assets/js/jquery.signature.js"></script>
    
</body>
</html>