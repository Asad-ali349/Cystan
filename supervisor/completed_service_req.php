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
  $ser_req=mysqli_query($conn,"SELECT service_requests.*,services.title,services.service_type,grouping.name as serType,individual.name as ind,individual.manage_by,individual.manage_role FROM service_requests JOIN individual ON individual.id=service_requests.individual_id INNER JOIN services ON service_requests.service_id=services.id INNER JOIN grouping ON services.service_type=grouping.id Where service_requests.status='3' AND individual.manage_role='1' AND individual.manage_by='$user_id' AND service_requests.is_deleted='0'  UNION SELECT service_requests.*,services.title,services.service_type,grouping.name as serType,individual.name as ind,individual.manage_by,individual.manage_role FROM supervisor INNER JOIN employee ON employee.supervisor_id=supervisor.id INNER JOIN individual ON individual.manage_by=employee.id INNER JOIN service_requests ON service_requests.individual_id=individual.id INNER JOIN services ON service_requests.service_id=services.id INNER JOIN grouping ON services.service_type=grouping.id where individual.manage_role='2' AND employee.supervisor_id='$user_id' AND service_requests.status='3' AND service_requests.is_deleted='0' ;");


?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/head.php")?>
 <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
    <link rel="stylesheet" href="plugins/font-icons/fontawesome/css/regular.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                                        <h3>Completed  Requests</h3>
                                    </div>                                                                        
                                </div>
                            </div>
                            <table id="html5-extensions" class="table table-hover non-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Service Name</th>
                                        <th class="dt-no-sorting">Service Type</th>
                                        <th class="dt-no-sorting">Price</th>
                                        <th class="dt-no-sorting">Client</th>
                                        <th class="dt-no-sorting">Manage By</th>
                                        <th class="dt-no-sorting">Status</th>
                                        <th class="dt-no-sorting">Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  
                                        $count=1;
                                        while ($data=mysqli_fetch_array($ser_req)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $count ?></td>
                                        <td><?php echo $data['title']; ?></td>
                                        <td><?php echo $data['serType']; ?></td>
                                        <td><?php
                                                if ($data['price']==0) {
                                            ?>
                                                
                                            <?php        
                                                    echo "N/A";
                                                }else{
                                            ?>
                                                
                                            <?php        
                                                    echo "$".$data['price'];
                                                }
                                            ?></td>
                                        <td><a href="people_detail_page.php?id=<?php echo $data['individual_id']?>"><span class="shadow-none badge badge-success"><?php 
                                            echo $data['ind'];
                                        ?></a></td>
                                        <td><?php 
                                            if ($data['manage_role']==0) {
                                               echo "Admin";
                                            }else if ($data['manage_role']==1) {
                                               $supid=$data['manage_by'];
                                               $addedby=mysqli_fetch_array(mysqli_query($conn,"SELECT name FROM supervisor where id='$supid'"));
                                               echo $addedby['name']." [You]";  
                                            }else if ($data['manage_role']==2) {
                                               // code...
                                               $empid=$data['manage_by'];
                                               $addedby=mysqli_fetch_array(mysqli_query($conn,"SELECT name FROM employee where id='$empid'"));
                                               echo $addedby['name']." [Employee]";
                                            }
                                            

                                         ?></td>
                                        <td>
                                            <?php
                                                if ($data['status']==0) {
                                            ?>
                                                <span class="shadow-none badge badge-primary">
                                            <?php        
                                                    echo "Non Approved";
                                                }else if($data['status']==1){
                                            ?>
                                                <span class="shadow-none badge badge-danger">
                                            <?php        
                                                    echo "Due Payment";
                                                }else if($data['status']==2){
                                            ?>
                                                <span class="shadow-none badge badge-success">
                                            <?php        
                                                    echo "In Progress";
                                                }else if($data['status']==3){
                                            ?>
                                                <span class="shadow-none badge badge-warning">
                                            <?php        
                                                    echo "Completed";
                                                }  
                                             ?>
                                        </td>
                                        <td>
                                            <a href="request_detail_page.php?id=<?php echo $data['id'] ?>"><i class="far fa-list-alt" style="color: green; font-size: 18px;margin-right: 5px" aria-hidden="true"></i></a>
                                            
                                            <a href="delete_request.php?id=<?php echo $data['id'];?>&table=service_requests&page=completed_service_req.php&status=1"><i class="far fa-times-circle" onclick="return confirm('Are you sure?')" style="color: red; font-size: 18px; margin-left: 5px;" aria-hidden="true"></i></a>

                                        </td>
                                        
                                    </tr>
                                   
                            
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
        $('#html5-extensions').DataTable( {
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
        function addprice(price,rid) {
            console.log($(price).val())
            var pr=$(price).val()
            // console.log(rid)
            $.post('request_price.php', {id: rid,price:pr}).then((result)=> {
                    $('.modal').modal('hide');
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
                    setTimeout(()=> {
                        location.reload();
                    }, 1500)
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
    </script>

</body>
</html>