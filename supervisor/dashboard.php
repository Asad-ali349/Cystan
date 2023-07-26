<?php
include_once("db/session.php"); 

$user_id=$_SESSION['login_user'];

$supcompanies=mysqli_query($conn,"SELECT COUNT(*) as num FROM company LEFT JOIN grouping ON grouping.id=company.group_id LEFT JOIN naics ON naics.id= company.naics_id LEFT JOIN individual ON company.owned_by=individual.id WHERE company.manage_role='1' AND company.managed_by='$user_id' AND company.status='1'");
$result_supcompanies=mysqli_fetch_array($supcompanies);
$empcompanies=mysqli_query($conn,"SELECT COUNT(*) as num FROM supervisor LEFT JOIN employee ON employee.supervisor_id=supervisor.id LEFT JOIN company ON company.managed_by=employee.id LEFT JOIN grouping ON grouping.id=company.group_id LEFT JOIN naics ON naics.id= company.naics_id LEFT JOIN individual ON company.owned_by=individual.id WHERE company.manage_role='2' AND supervisor.id='$user_id' AND company.status='1'");
$result_empcompanies=mysqli_fetch_array($empcompanies);

$comp= (int)$result_supcompanies['num']+(int)$result_empcompanies['num'];




$supind=mysqli_query($conn,"SELECT Count(*) as num FROM individual LEFT JOIN grouping ON grouping.id=individual.group_id WHERE individual.manage_role='1' AND individual.manage_by='$user_id' AND individual.status='1'");
$result_supind=mysqli_fetch_array($supind);



$empind=mysqli_query($conn,"SELECT Count(*) as num FROM supervisor LEFT JOIN employee ON employee.supervisor_id=supervisor.id LEFT JOIN individual ON individual.manage_by=employee.id LEFT JOIN grouping ON grouping.id=individual.group_id WHERE individual.manage_role='2' AND supervisor.id='$user_id'  AND individual.status='1'");
$result_empind=mysqli_fetch_array($empind);

$ind= (int)$result_supind['num']+(int)$result_empind['num'];




$services=mysqli_query($conn,"SELECT COUNT(*) AS num FROM services");
$result_services=mysqli_fetch_array($services);
$creditors=mysqli_query($conn,"SELECT COUNT(*) AS num FROM vendors");
$result_creditors=mysqli_fetch_array($creditors);


$ser_req=mysqli_query($conn,"SELECT service_requests.*,services.title,services.service_type,grouping.name as serType,individual.name as ind,individual.manage_by,individual.manage_role FROM service_requests JOIN individual ON individual.id=service_requests.individual_id INNER JOIN services ON service_requests.service_id=services.id INNER JOIN grouping ON services.service_type=grouping.id Where service_requests.status='0' AND individual.manage_role='1' AND individual.manage_by='$user_id' AND service_requests.is_deleted='0'  UNION SELECT service_requests.*,services.title,services.service_type,grouping.name as serType,individual.name as ind,individual.manage_by,individual.manage_role FROM supervisor INNER JOIN employee ON employee.supervisor_id=supervisor.id INNER JOIN individual ON individual.manage_by=employee.id INNER JOIN service_requests ON service_requests.individual_id=individual.id INNER JOIN services ON service_requests.service_id=services.id INNER JOIN grouping ON services.service_type=grouping.id where individual.manage_role='2' AND employee.supervisor_id='$user_id' AND service_requests.status='0' AND service_requests.is_deleted='0' ");



?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/head.php")?>

    <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css">

    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">


    <link rel="stylesheet" href="plugins/font-icons/fontawesome/css/regular.css">
    <link rel="stylesheet" href="plugins/font-icons/fontawesome/css/fontawesome.css">
    <link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dashboard/dash_2.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
    <link rel="stylesheet" href="plugins/font-icons/fontawesome/css/regular.css">
    <link rel="stylesheet" href="plugins/font-icons/fontawesome/css/fontawesome.css">

    <link href="assets/css/components/cards/card.css" rel="stylesheet" type="text/css" />

    <link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
<body >
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


                   <div class="row layout-top-spacing">


                        <div class="row">
                            
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                                        <a href="view_people.php"><div class="widget widget-one_hybrid widget-followers">
                                            <div class="widget-heading">
                                                <div class="w-title">
                                                    <div class="w-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                                    </div>
                                                    <div class="">
                                                        <p class="w-value"><?php echo $ind; ?></p>
                                                        <h5 class="">Individual</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div></a>
                                    </div>
                                    
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                                        <a href="view_company.php"><div class="widget widget-one_hybrid widget-followers">
                                            <div class="widget-heading">
                                                <div class="w-title">
                                                    <div class="w-icon">
                                                        <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="building" class="svg-inline--fa fa-building fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M128 148v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12zm140 12h40c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12zm-128 96h40c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12zm128 0h40c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12zm-76 84v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm76 12h40c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12zm180 124v36H0v-36c0-6.6 5.4-12 12-12h19.5V24c0-13.3 10.7-24 24-24h337c13.3 0 24 10.7 24 24v440H436c6.6 0 12 5.4 12 12zM79.5 463H192v-67c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v67h112.5V49L80 48l-.5 415z"></path></svg>
                                                    </div>
                                                    <div class="">
                                                        <p class="w-value"><?php echo $comp; ?></p>
                                                        <h5 class="">Companies</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div></a>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                                        <a href="view_services.php"><div class="widget widget-one_hybrid widget-referral">
                                            <div class="widget-heading">
                                                <div class="w-title">
                                                    <div class="w-icon">
                                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                                                    </div>
                                                    <div class="">
                                                        <p class="w-value"><?php echo $result_services['num']; ?></p>
                                                        <h5 class="">Service</h5>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </div></a>
                                    </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                                            <a href="view_inq_vendor.php"><div class="widget widget-one_hybrid widget-engagement">
                                                <div class="widget-heading">
                                                    <div class="w-title">
                                                        <div class="w-icon">
                                                            
                                                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M12 3C14.21 3 16 4.79 16 7S14.21 11 12 11 8 9.21 8 7 9.79 3 12 3M16 13.54C16 14.6 15.72 17.07 13.81 19.83L13 15L13.94 13.12C13.32 13.05 12.67 13 12 13S10.68 13.05 10.06 13.12L11 15L10.19 19.83C8.28 17.07 8 14.6 8 13.54C5.61 14.24 4 15.5 4 17V21H20V17C20 15.5 18.4 14.24 16 13.54Z" />
                                                            </svg>
                                                        </div>
                                                        <div class="">
                                                            <p class="w-value"><?php echo $result_creditors['num']; ?></p>
                                                            <h5 class="">Creditors</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div></a>
                                        </div>
                                </div>
                                
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="widget widget-chart-two">
                                    <div class="widget-heading">
                                        <h5 class="">Service Request Status</h5>
                                        
                                    </div>
                                    <div class="widget-content">
                                        <div id="chart-2" class=""></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    
                     
                    </div>
                <div class="row ">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6 mt-2">
                            <div class="widget-header ml-4 mt-2">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h3>New  Requests</h3>
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
                                            <?php if ($data['status']==2) {
                                             ?>
                                                <a href="letter<?php echo $data['service_id'] ?>.php?srid=<?php echo $data['id']; ?>"><i class="far fa-file" style="color: green; font-size: 18px;" aria-hidden="true"></i></a>
                                             <?php
                                            }else{
                                            ?>

                                                <a data-toggle="modal" data-target="#price<?php echo $count;?>"><i class="far fa-check-circle" style="color: green; font-size: 18px;" aria-hidden="true"></i></a>
                                            <?php
                                            } ?>
                                            <a href="deleteGroup.php?id=<?php echo $data['id'];?>&table=activity&page=view_activity.php"><i class="far fa-times-circle" style="color: red; font-size: 18px; margin-left: 5px;" aria-hidden="true"></i></a>

                                        </td>
                                        
                                    </tr>
                                    <div class="modal bd-example-modal-xl fade" id="price<?php echo $count; ?>" tabindex="-1" role="dialog">
                                          <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title"><strong style="color: #E72913;font-weight: 700;font-size: 24px">Service Title: </strong><?php echo $data['title']; ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                
                                                <div class="card-body">
                                                    <h5 class="card-title"></h5>
                                                    <label>Enter Amount:</label>

                                                    <input type="text" class="form-control" name="price" id="price<?php echo $data['id']; ?>">
                                                   
                                                </div>

                                              </div>
                                              <div class="modal-footer">
                                                  <button class="btn btn-danger" onclick="addprice(price<?php echo $data['id']; ?>,<?php echo $data['id']; ?>)"> Send</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    <!-- Modal -->
                            
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
    
    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/scrollspyNav.js"></script>

    
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="plugins/font-icons/feather/feather.min.js"></script>
    <script type="text/javascript">
        feather.replace();
    </script>
    <script src="plugins/apex/apexcharts.min.js"></script>
    <script src="assets/js/dashboard/dash_2.js"></script>
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
            "pageLength": 7 
        } );
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
            "pageLength": 7 
        } );
    </script>
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="plugins/font-icons/feather/feather.min.js"></script>
    <script type="text/javascript">
        feather.replace();
        setTimeout(()=> {
            $('#alert').hide('slow')
        }, 5000)
    </script>
    <script >
        $( document ).ready(function() {
            $.post('services_status_graph_data.php').then((result)=> {
                var count=result['count'];
                for (var i = 0; i < count.length; i++) {
                        count[i]=parseInt(count[i])
                    }
                var status=result['status'];
                 var options = {
                    chart: {
                        type: 'donut',
                        width: 397
                    },
                    colors: ['#2196f3', '#FF0000', '#42ba96'],
                    dataLabels: {
                      enabled: false
                    },
                    legend: {
                        position: 'bottom',
                        horizontalAlign: 'center',
                        fontSize: '14px',
                        markers: {
                          width: 10,
                          height: 10,
                        },
                        itemMargin: {
                          horizontal: 0,
                          vertical: 8
                        }
                    },
                    plotOptions: {
                      pie: {
                        donut: {
                          size: '65%',
                          background: 'transparent',
                          labels: {
                            show: true,
                            name: {
                              show: true,
                              fontSize: '18px',
                              fontFamily: 'Nunito, sans-serif',
                              color: undefined,
                              offsetY: -10
                            },
                            value: {
                              show: true,
                              fontSize: '26px',
                              fontFamily: 'Nunito, sans-serif',
                              color: '20',
                              offsetY: 16,
                              formatter: function (val) {
                                return val
                              }
                            },
                            total: {
                              show: true,
                              showAlways: true,
                              label: 'Total',
                              color: '#888ea8',
                              formatter: function (w) {
                                return w.globals.seriesTotals.reduce( function(a, b) {
                                  return a + b
                                }, 0)
                              }
                            }
                          }
                        }
                      }
                    },
                    stroke: {
                      show: true,
                      width: 25,
                    },
                    series: count,
                    labels: status,
                    responsive: [{
                        breakpoint: 1599,
                        options: {
                            chart: {
                                width: '350px',
                                height: '400px'
                            },
                            legend: {
                                position: 'bottom'
                            }
                        },
                
                        breakpoint: 1439,
                        options: {
                            chart: {
                                width: '250px',
                                height: '390px'
                            },
                            legend: {
                                position: 'bottom'
                            },
                            plotOptions: {
                              pie: {
                                donut: {
                                  size: '65%',
                                }
                              }
                            }
                        },
                    }]
                }


                var chart = new ApexCharts(
                  document.querySelector("#chart-2"),
                  options
                );
              
                chart.render();
            })
    });          
    </script>
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