<?php  
include_once("db/session.php"); 

if(!isset($_SESSION['login_user'])|| $_SESSION['login_user']==''){         
        echo "<script>window.location.href='index.php';</script>";
    }
$user_id=$_SESSION['login_user'];
if (isset($_SESSION['success']) && isset($_SESSION['error'])) {
    $success=$_SESSION['success'];
    $error=$_SESSION['error'];
}else{
    $success="";
    $error="";   
}

$worker=mysqli_query($conn,"SELECT name,id from employee WHERE supervisor_id='$user_id'");

$companies=mysqli_query($conn,"SELECT individual.*,grouping.name AS group_name FROM supervisor LEFT JOIN employee ON employee.supervisor_id=supervisor.id LEFT JOIN individual ON individual.manage_by=employee.id LEFT JOIN grouping ON grouping.id=individual.group_id WHERE individual.manage_role='2' AND supervisor.id='$user_id' AND individual.status='1' UNION SELECT individual.*,grouping.name AS group_name FROM individual LEFT JOIN grouping ON grouping.id=individual.group_id WHERE individual.manage_role='1' AND individual.manage_by='$user_id' AND individual.status='1'" );



if (isset($_POST['sup'])) {
    $companyid=$_POST['companyid'];
    $supervisorid=$_POST['supervisorid'];
    

    if ($supervisorid==0) {
        $addGroup=mysqli_query($conn,"UPDATE individual SET manage_by='$user_id',manage_role='1' WHERE id='$companyid'");
        $assigncomp=mysqli_query($conn,"UPDATE company SET managed_by='$user_id',manage_role='1' WHERE owned_by='$companyid'");

        if($addGroup==true && $assigncomp==true) {
            $success="Assigned to Supervisor";
        }else{
             
            $error="Error: " . $sql . "<br>" . $conn->error;
        }
    }else{
        $addGroup=mysqli_query($conn,"UPDATE individual SET manage_by='$supervisorid',manage_role='2' WHERE id='$companyid'");
        $assigncomp=mysqli_query($conn,"UPDATE company SET managed_by='$supervisorid',manage_role='2' WHERE owned_by='$companyid'");

        if($addGroup==true && $assigncomp==true) {
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
                                                    <option class="" value="">Select Employee</option>
                                                    <option class="" value="0">Supervisor [Me]</option>
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
                                                <button type="submit" name="sup" class="btn btn-danger" style="height: 45px">Assign People</button>
                                            </div>
                                            
                                             <hr>


                                        </div>
                                    </form> 
                                
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
        }, 3000)
    </script>
</body>
</html>