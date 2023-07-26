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
if(isset($_POST['submit'])){
    $rid=$_POST['sid'];
    $ind=$_POST['ind'];
    $manage=$_POST['client'];
    if ($manage=="supervisor") {
        $sup=$_POST['sup'];
        // $sup_emp=$_POST['sup_emp'];

        $update_individual=mysqli_query($conn,"UPDATE individual SET manage_by='$sup',manage_role='1' WHERE id='$ind'");
        $assigncomp=mysqli_query($conn,"UPDATE company SET managed_by='$sup',manage_role='1' WHERE owned_by='$ind'");
        if ($update_individual==true ) {
            $block=mysqli_query($conn,"UPDATE req_change_supervsior SET status='1' WHERE id='$rid'");
            if ($block==true) {
                $success="Assigned to supervisor Successfilly";
            }else{
                $error=$block->error;
            }
        }else{
            $error="Unable to Assign  ";
        }
    }else if($manage=="employee"){
        $emp=$_POST['emp'];
        // $sup_emp=$_POST['sup_emp']; 
        $update_individual=mysqli_query($conn,"UPDATE individual SET manage_by='$emp',manage_role='2' WHERE id='$ind'");
        $assigncomp=mysqli_query($conn,"UPDATE company SET managed_by='$emp',manage_role='2' WHERE owned_by='$ind'");
        if ($update_individual==true ) {
            $block=mysqli_query($conn,"UPDATE req_change_supervsior SET status='1' WHERE id='$rid'");
            if ($block==true) {
                $success="Assigned to Employee Successfilly";
            }else{
                $error=$block->error;
            }
        }else{
            $error="Unable to Assign  ";
        }
    }
}


$req=mysqli_query($conn,"SELECT req_change_supervsior.*,individual.name,individual.manage_role,individual.manage_by,supervisor.name as sup FROM req_change_supervsior INNER JOIN individual ON individual.id=req_change_supervsior.ind_id LEFT JOIN supervisor ON req_change_supervsior.recommended_sup_id=supervisor.id" );


?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/head.php")?>
 <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
    <link rel="stylesheet" href="plugins/font-icons/fontawesome/css/regular.css">
    <link rel="stylesheet" href="plugins/font-icons/fontawesome/css/fontawesome.css">
    <link href="assets/css/components/cards/card.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL CUSTOM STYLES -->
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
        
        
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <?php 
                        if ($success!="") {

                    ?>        
                            <div class="alert alert-success mt-4 " role="alert" id="alert">
                                
                                <strong>Success! </strong><?php echo $success;?>
                            </div> 
                    <?php        
                            $_SESSION['success']="";
                            $success="";
                        }elseif ($error!="") {
                    ?>        
                            <div class="alert alert-danger mt-4" role="alert" id="alert">
                                
                                <strong>Error! </strong><?php echo $error;?>

                            </div> 
                    <?php  
                            $_SESSION['error']="";
                            $error="";      
                        }
                    ?>
                <div class="row layout-top-spacing">
                    
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6 mt-2">
                            <div class="widget-header ml-4 mt-2">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h2>Requests To change Supervisor/Employee</h2>
                                    </div>                                                                        
                                </div>
                            </div>
                            <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="dt-no-sorting">individual</th>
                                        <th class="dt-no-sorting">Recommeded Supervisor</th>
                                        <th class="dt-no-sorting">Request Date</th>  
                                        <th class="dt-no-sorting">Status</th>
                                        <th class="dt-no-sorting">Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  
                                        $count=1;
                                        while ($data=mysqli_fetch_array($req)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td ><?php echo $data['name']; ?></td>
                                        
                                        
                                        <td> <span class="shadow-none badge badge-success"><?php 
                                                if ($data['sup']=="") {
                                                    echo "None";
                                                }else{

                                                    echo $data['sup'];
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $data['created_at'] ?></td>
                                        <td>
                                            <?php
                                                if ($data['status']==0) {
                                            ?>
                                                <span class="shadow-none badge badge-danger">
                                            <?php        
                                                    echo "Pending";
                                                }else if($data['status']==1){
                                            ?>
                                                <span class="shadow-none badge badge-success">
                                            <?php        
                                                    echo "Completed";
                                                }  
                                             ?>
                                        </td>
                                        <td>
                                            <?php
                                                if ($data['status']==0) {
                                            ?>
                                                <a data-toggle="modal" data-target="#modal<?php echo $count;?>"><i class="far fa-list-alt" style="color: green; font-size: 18px;" aria-hidden="true"></i></a>
                                            
                                            <a data-toggle="modal" data-target="#modal2<?php echo $count; ?>">
                                           <i class="far fa-check-circle" style="color: green; font-size: 18px;" aria-hidden="true"></i></a>

                                            <a href="deleteGroup.php?id=<?php echo $data['id'];?>&table=req_change_supervsior&page=request_to_change_supervisor.php" onclick="return confirm('Are you sure?')"><i class="far fa-times-circle" style="color: red; font-size: 20px;" aria-hidden="true"></i></a>
                                            <?php        
                                                    
                                                }else if($data['status']==1){
                                            ?>
                                                <a data-toggle="modal" data-target="#modal<?php echo $count;?>"><i class="far fa-list-alt" style="color: green; font-size: 18px;" aria-hidden="true"></i></a>
                                            
                                            

                                            <a href="deleteGroup.php?id=<?php echo $data['id'];?>&table=req_change_supervsior&page=request_to_change_supervisor.php" onclick="return confirm('Are you sure?')"><i class="far fa-times-circle" style="color: red; font-size: 20px;" aria-hidden="true"></i></a>
                                            <?php        
                                                    
                                                }  
                                             ?>
                                            
                                        </td>
                                        
                                    </tr>

                                    <!-- modal 1 start -->
                                        <div class="modal bd-example-modal-xl fade" id="modal<?php echo $count; ?>" tabindex="-1" role="dialog">
                                          <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title">Reason:</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                
                                                <div class="card-body">
                                                    <h5 class="card-title"></h5>
                                                    <p class="card-text"><?php echo $data['reason']; ?></p>
                                                   
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div> <!--modal 1 end -->

                                    <!-- Modal 2 start -->
                                     <div class="modal md" id="modal2<?php echo $count; ?>" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="name<?php echo $data['id']?>"><?php echo $data['name']; ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                   <h4>Assign Clients to:</h4>

                                                    <form action="" method="POST">

                                                      <input type="text" name="sid" id="sup<?php echo $data['id']?>" value="<?php echo $data['id']?>" style="display: none;">
                                                      <input type="text" name="ind" id="ind<?php echo $data['ind_id']?>" value="<?php echo $data['ind_id']?>" style="display: none;">
                                                        <div class="row">
                                                           <div class="col-md-6">
                                                               <div class="n-chk">
                                                                    <label class="new-control new-radio">
                                                                      <input type="radio" class="new-control-input" name="client" value="supervisor" onchange="handleChange1('supervisor<?php echo $count; ?>','employee<?php echo $count; ?>');" checked>
                                                                      <span class="new-control-indicator"></span>Supervisor
                                                                    </label>
                                                                </div>
                                                           </div>
                                                           <div class="col-md-6">
                                                               <div class="n-chk">
                                                                    <label class="new-control new-radio">
                                                                      <input type="radio" class="new-control-input" name="client" value="employee" onchange="handleChange1('employee<?php echo $count; ?>','supervisor<?php echo $count; ?>');">
                                                                      <span class="new-control-indicator"></span>Employee
                                                                    </label>
                                                                </div>
                                                           </div>
                                                       </div>
                                                       <div id='supervisor<?php echo $count; ?>' >
                                                           <select name='sup' class="form-control ">
                                                               <?php 
                                                                    $get_sup_for_client=mysqli_query($conn,"SELECT * FROM supervisor WHERE status='1'");
                                                                     while ($sup1=mysqli_fetch_array($get_sup_for_client)) {
                                                                        if($data['manage_role']=='1'){
                                                                            if ($sup1['id']!=$data['manage_by']){
                                                                                if ($sup1['id']==$data['recommended_sup_id']) {
                                                                                ?>
                                                                                    <option selected value="<?php echo $sup1['id']?>"><?php echo $sup1['name']?> </option>
                                                                                <?php      
                                                                                    // code...
                                                                                }else{



                                                                ?>
                                                                                <option value="<?php echo $sup1['id']?>"><?php echo $sup1['name']?> </option>
                                                                    <?php
                                                                                }
                                                                            }    
                                                                        }else{
                                                                    ?>
                                                                        <option value="<?php echo $sup1['id']?>"><?php echo $sup1['name']?> </option>
                                                                    <?php        
                                                                        }
                                                                        
                                                                    }
                                                               ?>
                                                           </select>
                                                       </div>
                                                       <div id='employee<?php echo $count;?>' style="display:none">
                                                           <select name='emp' class="form-control ">
                                                                <?php 
                                                                    $get_emp=mysqli_query($conn,"SELECT * FROM employee WHERE status='1'");
                                                                    while ($emp1=mysqli_fetch_array($get_emp)) {
                                                                        if($data['manage_role']=='2'){
                                                                            if ($emp1['id']!=$data['manage_by']){
                                                                ?>
                                                                                <option value="<?php echo $emp1['id']?>"><?php echo $emp1['name']?> </option>
                                                                    <?php
                                                                            }    
                                                                        }else{
                                                                    ?>
                                                                        <option value="<?php echo $emp1['id']?>"><?php echo $emp1['name']?> </option>
                                                                    <?php        
                                                                        }
                                                                        
                                                                    }
                                                               ?>
                                                           </select>
                                                       </div>
                                                       
                                                  </div>
                                                   <div class="modal-footer">
                                                        <button class="btn btn-danger" type="submit" name="submit">ASSIGN</button>
                                                  </div>
                                                   </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal 2 end -->
                                        
                                        
                                    <?php
                                        $count++;        
                                        }
                                    ?>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>

                </div>

            </div>
           <?php include_once("includes/footer.php");?>
        </div>
        <!--  END CONTENT AREA  -->

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
    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="plugins/table/datatable/datatables.js"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="plugins/table/datatable/button-ext/jszip.min.js"></script>    
    <script src="plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="plugins/table/datatable/button-ext/buttons.print.min.js"></script>
    <script>
        $('#html5-extension').DataTable( {
            "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            buttons: {
                buttons: [
                    { extend: 'copy', className: 'btn btn-sm' },
                    { extend: 'csv', className: 'btn btn-sm' },
                    { extend: 'excel', className: 'btn btn-sm' },
                    { extend: 'print', className: 'btn btn-sm' }
                ]
            },
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 20 
        } );
    </script>
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="plugins/font-icons/feather/feather.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        feather.replace();
        setTimeout(()=> {
            $('#alert').hide('slow')
        }, 5000)

        function sendCredentials(id,cid,managerole,manageby,name){
            var email=$(id).val();
            var password = Math.random().toString(36).slice(-8);
            var company=$(name).text();
            var email=$(id).val();
            // console.log(company)
            // console.log(password)
            // console.log('Company id ='+cid)
            // console.log(managerole)
            // console.log(manageby)

            $.post('send_credentials.php', {name:company,email: email,password:password,id:cid,managerole:managerole,manageby:manageby}).then((result)=> {
                $('.md').modal('hide');
                 // console.log(result.msg)
                 if (result.error==false) {
                    Swal.fire({
                      position: 'top-end',
                      icon: 'success',
                      title: result.msg,
                      showConfirmButton: false,
                      timer: 1500,
                      width:420
                    })
                 }else{
                     Swal.fire({
                      position: 'top-end',
                      icon: 'error',
                      title: result.msg,
                      showConfirmButton: false,
                      timer: 1500,
                      width:420
                    })
                 }
                  
            })

        }
        function handleChange1(sh,hi){
            console.log(sh)
            console.log(hi)
            
            $('#'+sh).css('display','block');
            $('#'+hi).css('display','none');

            
        }
    </script>

</body>
</html>