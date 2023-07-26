<?php  
include_once("db/session.php"); 

$user_id=$_SESSION['login_user'];
if (isset($_SESSION['success']) && isset($_SESSION['error'])) {
    $success=$_SESSION['success'];
    $error=$_SESSION['error'];
}else{
    $success="";
    $error="";   
}
$worker=mysqli_query($conn,"SELECT name,id from supervisor WHERE status='1'");
$emp=mysqli_query($conn,"SELECT name,id from employee WHERE status='1'");

$companies=mysqli_query($conn,"SELECT individual.id,individual.name,individual.ssn,individual.email,individual.phone,individual.group_id,individual.street,individual.city,individual.state,individual.zip,individual.country,individual.credit_score,individual.lattitude,individual.longitude,grouping.name AS group_name,individual.id_number,individual.loan_number FROM individual LEFT JOIN grouping ON grouping.id=individual.group_id WHERE individual.status='1'" );
$comp=mysqli_query($conn,"SELECT individual.id,individual.name,individual.ssn,individual.email,individual.phone,individual.group_id,individual.street,individual.city,individual.state,individual.zip,individual.country,individual.credit_score,individual.lattitude,individual.longitude,grouping.name AS group_name,individual.id_number,individual.loan_number FROM individual LEFT JOIN grouping ON grouping.id=individual.group_id WHERE individual.status='1'" );
if (isset($_POST['sup'])) {
   $companyid=$_POST['companyid'];
    $supervisorid=$_POST['supervisorid'];
    
    if ($supervisorid==0) {
        $addGroup=mysqli_query($conn,"UPDATE individual SET manage_by='0',manage_role='0' WHERE id='$companyid'");
        $assigncomp=mysqli_query($conn,"UPDATE company SET managed_by='0',manage_role='0' WHERE owned_by='$companyid'");
        if($addGroup==TRUE) {
            $success="Assigned to Admin";
        }else{
             
            $error="Error: " . $sql . "<br>" . $conn->error;
        }        // code...
    }else{
        $addGroup=mysqli_query($conn,"UPDATE individual SET manage_by='$supervisorid',manage_role='1' WHERE id='$companyid'");
        $assigncomp=mysqli_query($conn,"UPDATE company SET managed_by='$supervisorid',manage_role='1' WHERE owned_by='$companyid'");
        if($addGroup==TRUE) {
            $success="Assigned to Supervisor";
        }else{
             
            $error="Error: " . $sql . "<br>" . $conn->error;
        }
    }    
    
    
}
if (isset($_POST['emp'])) {
   $compid=$_POST['compid'];
    $employeeid=$_POST['employeeid'];
    if ($employeeid==0) {
        $addGroup=mysqli_query($conn,"UPDATE individual SET manage_by='0',manage_role='0' WHERE id='$compid'");
        $assigncomp=mysqli_query($conn,"UPDATE company SET managed_by='0',manage_role='0' WHERE owned_by='$compid'");
        if($addGroup==TRUE) {
            $success="Assigned to Admin";
        }else{
             
            $error="Error: " . $sql . "<br>" . $conn->error;
        }
    }else{
        $addGroup=mysqli_query($conn,"UPDATE individual SET manage_by='$employeeid',manage_role='2' WHERE id='$compid'");
        $assigncomp=mysqli_query($conn,"UPDATE company SET managed_by='$employeeid',manage_role='2' WHERE owned_by='$compid'");
        if($addGroup==TRUE) {
            $success="Assigned to Employee";
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

    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">


    <link rel="stylesheet" href="plugins/font-icons/fontawesome/css/regular.css">
    <link href="assets/css/components/tabs-accordian/custom-tabs.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="plugins/font-icons/fontawesome/css/fontawesome.css">
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
                                $_SESSION['success']="";
                                $success="";
                            }elseif ($error!="") {
                        ?>        
                                <div class="alert alert-danger mb-4" role="alert" id="alert">
                                    
                                    <strong>Error! </strong><?php echo $error;?>

                                </div> 
                        <?php  
                                $_SESSION['error']="";
                                $error="";      
                            }
                        ?>

                        <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h3>Assign Individual</h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="widget-content widget-content-area animated-underline-content" style="border: none;"> -->
                                    
                                    <ul class="nav nav-tabs  mb-3" id="animateLine" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="animated-underline-home-tab" data-toggle="tab" href="#animated-underline-home" role="tab" aria-controls="animated-underline-home" aria-selected="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-x"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="18" y1="8" x2="23" y2="13"/><line x1="23" y1="8" x2="18" y2="13"/></svg> Supervisor</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="animated-underline-profile-tab" data-toggle="tab" href="#animated-underline-profile" role="tab" aria-controls="animated-underline-profile" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Employee</a>
                                        </li>
                                        
                                    </ul>

                                    <div class="tab-content" id="animateLineContent-4">
                                        <div class="tab-pane fade show active" id="animated-underline-home" role="tabpanel" aria-labelledby="animated-underline-home-tab">
                                                <form action="" method="POST">
                                       
                                        <div class="form-row mb-4">
                                            
                                            <div class="form-group col-md-5">
                                                <select class="form-control select2" name="companyid" >
                                                    <option class="" value="">Select Individual</option>
                                                    <?php
                                                        while ($data=mysqli_fetch_array($companies)) {
                                                    ?>
                                                        <option value="<?php echo $data['id']?>"><?php echo $data['name']?></option>
                                                    <?php        
                                                        }
                                                    ?>

                                                </select>
                                            </div>

                                            <div class="form-group col-md-5">
                                                <select class="form-control select2" name="supervisorid" >
                                                    <option class="" value="">Select Supervisor</option>
                                                    <option class="" value="0">Admin</option>
                                                    <?php
                                                        while ($data=mysqli_fetch_array($worker)) {
                                                    ?>
                                                        <option value="<?php echo $data['id']?>"><?php echo $data['name']?></option>
                                                    <?php        
                                                        }
                                                    ?>

                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <button type="submit" name="sup" class="btn btn-danger" style="height: 45px">Assign Individual</button>
                                            </div>
                                            
                                             <hr>


                                        </div>
                                    </form>     
                                        </div>
                                        <div class="tab-pane fade" id="animated-underline-profile" role="tabpanel" aria-labelledby="animated-underline-profile-tab">
                                            <form action="" method="POST">
                                       
                                                <div class="form-row mb-4">
                                                    
                                                    <div class="form-group col-md-5">
                                                        <select class="form-control select2" name="compid" >
                                                            <option class="" value="">Select Individual</option>
                                                            <?php
                                                                while ($data=mysqli_fetch_array($comp)) {
                                                            ?>
                                                                <option value="<?php echo $data['id']?>"><?php echo $data['name']?></option>
                                                            <?php        
                                                                }
                                                            ?>

                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-5">
                                                        <select class="form-control select2" name="employeeid" >
                                                            <option class="" value="">Select Employee</option>
                                                            <option class="" value="0">Admin</option>
                                                            <?php
                                                                while ($data=mysqli_fetch_array($emp)) {
                                                            ?>
                                                                <option value="<?php echo $data['id']?>"><?php echo $data['name']?></option>
                                                            <?php        
                                                                }
                                                            ?>

                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <button type="submit" name="emp" class="btn btn-danger" style="height: 45px">Assign Individual</button>
                                                    </div>
                                                    
                                                     <hr>


                                                </div>
                                            </form>
                                        </div>
                                        
                                    </div>

                                    

                                <!-- </div> -->
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
       
    </script>
    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/scrollspyNav.js"></script>

    <script src="plugins/table/datatable/datatables.js"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="plugins/table/datatable/button-ext/jszip.min.js"></script>    
    <script src="plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="plugins/table/datatable/button-ext/buttons.print.min.js"></script>
   
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="plugins/font-icons/feather/feather.min.js"></script>
    <script type="text/javascript">
        feather.replace();
    </script>
    <script type="text/javascript">
        setTimeout(()=> {
            $('#alert').hide('slow')
        }, 5000)
    </script>
</body>
</html>