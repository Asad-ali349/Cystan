<?php
include_once("db/session.php"); 


$user_id=$_SESSION['login_user'];
$success="";
$error="";
$id=$_GET['id'];
$company=mysqli_query($conn,"SELECT company.id, company.ein, company.name,company.website,company.pin_color_id,company.total_employees,company.parent_company_id,company.group_id,company.contact,company.email,company.street,company.city,company.state,company.zip,company.country,company.review_avg,company.review_count,company.credit_score,company.anual_revenue,company.naics_id,company.latitude,company.longitude,grouping.name AS group_name,pin_color.name AS color_name,naics.sic_code,naics.naics_code,naics.description,naics.ins,company.customer_id,company.loan_number FROM company LEFT JOIN pin_color ON pin_color.id=company.pin_color_id LEFT JOIN grouping ON grouping.id=company.group_id LEFT JOIN naics ON naics.id= company.naics_id WHERE company.id='$id'");
$compData=mysqli_fetch_array($company);

$companyG=mysqli_query($conn,"SELECT * FROM grouping WHERE category_id='1'");
$companies=mysqli_query($conn,"SELECT * FROM company WHERE status='1'");
$pinColor=mysqli_query($conn,"SELECT * FROM pin_color");
$naicss=mysqli_query($conn,"SELECT * FROM naics");



if (isset($_POST['submit'])) {

    $name=$_POST['name'];
    $url=$_POST['url'];
    $employee=$_POST['employee'];
    $parent=$_POST['parentCompany'];
    $naics=$_POST['naics'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $revenue=$_POST['revenue'];
    $average=$_POST['average'];
    $count=$_POST['count'];
    $score=$_POST['score'];
    $latitude=$_POST['latitude'];
    $longitude=$_POST['longitude'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $zip=$_POST['zip'];
    $country=$_POST['country'];
    $companyGroup=$_POST['group'];   
     $idNumber=$_POST['id_number'];
    $loan=$_POST['loan']; 
    $ein=$_POST['ein']; 

    $sql=mysqli_query($conn,"UPDATE company SET name='$name',website='$url',total_employees='$employee',parent_company_id='$parent',contact='$phone',email='$email',street='$address',city='$city',state='$state',zip='$zip',country='$country',review_avg='$average',review_count='$count',credit_score='$score',anual_revenue='$revenue',latitude='$latitude',longitude='$longitude',naics_id='$naics',group_id='$companyGroup' ,customer_id='$idNumber',loan_number='$loan', ein='$ein' WHERE id='$id'");
    
    
    $company=mysqli_query($conn,"SELECT company.id,company.name,company.ein, company.website,company.pin_color_id,company.total_employees,company.parent_company_id,company.group_id,company.contact,company.email,company.street,company.city,company.state,company.zip,company.country,company.review_avg,company.review_count,company.credit_score,company.anual_revenue,company.naics_id,company.latitude,company.longitude,grouping.name AS group_name,pin_color.name AS color_name,naics.sic_code,naics.naics_code,naics.description,naics.ins,company.customer_id,company.loan_number FROM company LEFT JOIN pin_color ON pin_color.id=company.pin_color_id LEFT JOIN grouping ON grouping.id=company.group_id LEFT JOIN naics ON naics.id= company.naics_id WHERE company.id='$id'");

    $compData=mysqli_fetch_array($company);

    if ($sql==true) {
         $success="Company Updated";
    }else{
        $error="Error: " . $sql . "<br>" . $conn->error;
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
                        <div class="col-lg-12 col-12 layout-spacing"  >
                            <div class="statbox widget box box-shadow mb-4">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h2>Edit Company</h2>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form action="" method="POST">
                                       
                                        <div class="form-row mb-4">
                                             <div class="form-group col-md-12 mt-4">
                                                <h5>Company Details:</h5>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputEmail4">Company Name:</label> 
                                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $compData['name']?>" required>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="inputEmail4">URL:</label> 
                                                <input type="url" class="form-control" id="email" name="url" value="<?php echo $compData['website']?>" >
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="inputEmail4">#Employees:</label> 
                                                <input type="number" class="form-control" id="" name="employee" value="<?php echo $compData['total_employees']?>" >
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="inputEmail4">Parent Company:</label> 
                                                <select class="form-control select2" name="parentCompany" >
                                                    <option class="" value="<?php echo $compData['parent_company_id']?>">
                                                        <?php 
                                                                $pid= $compData['parent_company_id'];
                                                                if ($pid!=0) {
                                                                    $pcom=mysqli_query($conn,"SELECT name FROM company WHERE id='$pid'");
                                                                    $result=mysqli_fetch_array($pcom);
                                                                    echo $result['name'];
                                                                }else{
                                                                     echo "none";
                                                                }
                                                                

                                                                ?></option>
                                                     <?php
                                                    while ($data=mysqli_fetch_array($companies)) {
                                                  ?>
                                                    <option value="<?php echo $data['id']?>"><?php echo $data['name']?></option>
                                                    <?php        
                                                    }
                                                  ?>

                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputEmail4">Company Group:</label> 
                                                <select class="form-control select2" name="group"  required >
                                                    <option class="" value="<?php echo $compData['group_id']?>">
                                                        <?php echo $compData['group_name'];
                                                        ?> 
                                                    </option>
                                                    <?php
                                                    while ($data=mysqli_fetch_array($companyG)) {
                                                  ?>
                                                    <option value="<?php echo $data['id']?>"><?php echo $data['name']?></option>
                                                    <?php        
                                                    }
                                                  ?>
                                                </select>
                                            </div>
                                           
                                            <div class="form-group col-md-4">

                                                <label for="inputEmail4">NAICS:</label> 
                                                <select class="form-control select2" name="naics" id="naics">
                                                    <option class="" value="<?php echo $compData['naics_id']?>">
                                                        <?php echo $compData['naics_code']."-".$compData['description'];?></option>
                                                     <?php
                                                    while ($data=mysqli_fetch_array($naicss)) {
                                                  ?>
                                                    <option value="<?php echo $data['id']?>"><?php echo $data['naics_code']."-".$data['description']?></option>
                                                    <?php        
                                                    }
                                                  ?>
                                                </select>
                                            </div>

                                            <div id="naics_content" class="form-group col-md-12">

                                                   <!-----NAICS----->
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                    <label for="inputEmail4">NAICS Code:</label> 
                                                    <input type="text" class="form-control" id="input1"  value="<?php echo $compData['naics_code']?>" required readonly>
                                                </div>
                                                 <div class="form-group col-md-3">
                                                    <label for="inputEmail4">Description:</label> 
                                                    <input type="text" class="form-control" id="input2"  value="<?php echo $compData['description']?>" required readonly>
                                                </div>
                                                 <div class="form-group col-md-3">
                                                    <label for="inputEmail4">Institute:</label> 
                                                    <input type="text" class="form-control" id="input3"  value="<?php echo $compData['ins']?>" required readonly>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputEmail4">SIC Code:</label> 
                                                    <input type="text" class="form-control" id="input4"  value="<?php echo $compData['sic_code']?>" required readonly>
                                                </div>

                                                </div>
                                                
                                            </div>
                                             <div class="form-group col-md-4">
                                                <label>ID Number:</label>
                                                <input type="text" class="form-control" id="id_number" name="id_number" value="<?php echo $compData['customer_id']?>" required>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label>Loan Number:</label>
                                                <input type="text" class="form-control" id="loan" name="loan" value="<?php echo $compData['loan_number']?>" >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>EIN:</label>
                                                <input type="text" class="form-control" id="ein" name="ein" value="<?php echo $compData['ein']?>" >
                                            </div>

                                            <hr>

                                           <div class="form-group col-md-12 mt-4">
                                                <h5>Personal Details:</h5>
                                            </div>


                                            <div class="form-group col-md-8">
                                                <label for="inputEmail4">Street:</label> 
                                                <input type="text" class="form-control" id="" name="address" value="<?php echo $compData['street']?>" >
                                            </div>
                                             <div class="form-group col-md-4">
                                                <label for="inputEmail4">City:</label> 
                                                <input type="text" class="form-control" id="" name="city" value="<?php echo $compData['city']?>" >
                                            </div>
                                             <div class="form-group col-md-4">
                                                <label for="inputEmail4">State:</label> 
                                                <input type="text" class="form-control" id="" name="state" value="<?php echo $compData['state']?>" >
                                            </div>
                                             <div class="form-group col-md-4">
                                                <label for="inputEmail4">Zip:</label> 
                                                <input type="text" class="form-control" id="" name="zip" value="<?php echo $compData['zip']?>" >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputEmail4">Country:</label> 
                                                <input type="text" class="form-control" id="" name="country" value="<?php echo $compData['country']?>" >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputEmail4">Email:</label> 
                                                <input type="email" class="form-control" id="" name="email" value="<?php echo $compData['email']?>" required>
                                            </div>
                                             <div class="form-group col-md-4">
                                                <label for="inputEmail4">Phone:</label> 
                                                <input type="phone" class="form-control" id="" name="phone" value="<?php echo $compData['contact']?>" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputEmail4">Review Average:</label> 
                                                <input type="number" class="form-control" id="" name="average" value="<?php echo $compData['review_avg']?>" >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputEmail4">Review Count:</label> 
                                                <input type="number" class="form-control" id="" name="count" value="<?php echo $compData['review_count']?>" >
                                            </div>
                                             <div class="form-group col-md-4">
                                                <label for="inputEmail4">Credit Score:</label> 
                                                <input type="number" class="form-control" id="" name="score" value="<?php echo $compData['credit_score']?>" >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputEmail4">Annual Revenue:</label> 
                                                <input type="number" class="form-control" id="" name="revenue" value="<?php echo $compData['anual_revenue']?>" >
                                            </div>
                                             <div class="form-group col-md-4">
                                                <label for="inputEmail4">Latitude:</label> 
                                                <input type="text" class="form-control" id="latitude" name="latitude" value="<?php echo $compData['latitude']?>" readonly>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputEmail4">Longitude:</label> 
                                                <input type="text" class="form-control" id="longitude" name="longitude" value="<?php echo $compData['longitude']?>" readonly>
                                            </div>
                                             <hr>

                                            <div id="googleMap" style="width:100%;height:400px;"></div>
                                        </div>
                                   
                                        <center><button type="submit" name="submit" class="btn btn-danger mt-3">Update Company</button></center>
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
            $(document).ready(function(){

              $('#naics').on('change', function(){
                var val = this.value
                if (this.val!='') {
                  $.post('naics_content.php', {id: val}).then((result)=> {
                    $('#input1').val(result.naics_code);
                    $('#input2').val(result.description);
                    $('#input3').val(result.ins);
                    $('#input4').val(result.sic_code);
                  
                })  
              }
                
              })

              $('#naics').on('change', function() {

                if ( this.value == ''){
                  // alert('hide');
                  $('#naics_content').css("display", "none");

                }else{
                  // alert('show');
                  $('#naics_content').css("display", "block");
                }
              });
            });
        </script>
        <script>
            $(document).ready(function(){

              $('#naics').on('change', function(){
                var val = this.value
                if (this.val!='') {
                  $.post('naics_content.php', {id: val}).then((result)=> {
                    $('#input1').val(result.naics_code);
                    $('#input2').val(result.description);
                    $('#input3').val(result.ins);
                    $('#input4').val(result.sic_code);
                  
                })  
              }
                
              })

              $('#naics').on('change', function() {

                if ( this.value == ''){
                  // alert('hide');
                  $('#naics_content').css("display", "none");

                }else{
                  // alert('show');
                  $('#naics_content').css("display", "block");
                }
              });
            });
        </script>
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
    
</body>
</html>