<?php
include_once("db/session.php"); 
require('stripe_config.php');

$user_id=$_SESSION['login_user'];
$user_email=$_SESSION['email'];
$manage_by=$_SESSION['manage_by'];
$manage_role=$_SESSION['manage_role'];


$companies=mysqli_query($conn,"SELECT COUNT(*) AS num FROM company WHERE status='1' AND owned_by='$user_id'");
$result_companies=mysqli_fetch_array($companies);


$services=mysqli_query($conn,"SELECT COUNT(*) as num FROM service_requests JOIN individual ON individual.id=service_requests.individual_id INNER JOIN services ON service_requests.service_id=services.id INNER JOIN grouping ON services.service_type=grouping.id where service_requests.status='1'  AND service_requests.individual_id='$user_id' AND service_requests.is_deleted='0'");
$result_services=mysqli_fetch_array($services);

$creditors=mysqli_query($conn,"SELECT COUNT(*) AS num FROM vendors");
$result_creditors=mysqli_fetch_array($creditors);



$ser_req=mysqli_query($conn,"SELECT service_requests.*,services.title,services.service_type,grouping.name as serType,individual.name as ind FROM service_requests JOIN individual ON individual.id=service_requests.individual_id INNER JOIN services ON service_requests.service_id=services.id INNER JOIN grouping ON services.service_type=grouping.id where service_requests.status='1'  AND service_requests.individual_id='$user_id' AND service_requests.is_deleted='0' ORDER BY service_requests.id DESC");


 $docs= mysqli_query($conn,"SELECT company_docs.*,grouping.name AS typeName FROM company_docs LEFT JOIN grouping ON grouping.id=company_docs.type");

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
    <link href="assets/css/users/user-profile.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .stripe-button-el{
            width: 50px;
        }
    </style>
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
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  " >

                                        <div class="user-profile layout-spacing">
                                            <div class="widget-content widget-content-area">
                                                <div class="d-flex justify-content-between">
                                                    <h3 class="mt-3 ml-4 ">Mananger</h3>

                                                </div>
                                                <div class="user-info-list" style="margin-top:-20px">
                                                    <?php 

                                                        if ($manage_role==0) {
                                                          $get_name=mysqli_query($conn,"SELECT * from admin where id='1'");
                                                          $result_get_name=mysqli_fetch_array($get_name);
                                                        }else if ($manage_role==1) {
                                                          $sid=$manage_by;
                                                          $get_name=mysqli_query($conn,"SELECT * from supervisor where id='$sid'");
                                                          $result_get_name=mysqli_fetch_array($get_name);
                                                          
                                                        }else if ($manage_role==2) {
                                                          $eid=$manage_by;
                                                          $get_name=mysqli_query($conn,"SELECT * from employee where id='$eid'");
                                                          $result_get_name=mysqli_fetch_array($get_name);
                                                          
                                                        }

                                                     ?>
                                                    <div class="">
                                                        <ul class="contacts-block list-unstyled">
                                                            <li class="contacts-block__item">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg><?php echo $result_get_name['name'] ?>
                                                            </li>
                                                            <li class="contacts-block__item">
                                                                <a href="mailto:example@mail.com"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg><?php echo $result_get_name['email'] ?></a>
                                                            </li>
                                                            <li class="contacts-block__item">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg> <?php echo $result_get_name['contact'] ?>
                                                            </li>
                                                            
                                                            
                                                            
                                                           
                                                        </ul>
                                                    </div>                                    
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                                        <a href="view_company.php"><div class="widget widget-one_hybrid widget-followers">
                                            <div class="widget-heading">
                                                <div class="w-title">
                                                    <div class="w-icon">
                                                        <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="building" class="svg-inline--fa fa-building fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M128 148v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12zm140 12h40c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12zm-128 96h40c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12zm128 0h40c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12zm-76 84v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm76 12h40c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12zm180 124v36H0v-36c0-6.6 5.4-12 12-12h19.5V24c0-13.3 10.7-24 24-24h337c13.3 0 24 10.7 24 24v440H436c6.6 0 12 5.4 12 12zM79.5 463H192v-67c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v67h112.5V49L80 48l-.5 415z"></path></svg>
                                                    </div>
                                                    <div class="">
                                                        <p class="w-value"><?php echo $result_companies['num']; ?></p>
                                                        <h5 class="">Companies</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div></a>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                                        <a href="due_payment_req.php"><div class="widget widget-one_hybrid widget-referral">
                                            <div class="widget-heading">
                                                <div class="w-title">
                                                    <div class="w-icon">
                                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                                                    </div>
                                                    <div class="">
                                                        <p class="w-value"><?php echo $result_services['num']; ?></p>
                                                        <h5 class="">Due Payments</h5>
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
                <div class="row mb-5">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6 mt-2">
                            <div class="widget-header ml-4 mt-2">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h3>Due Payments Requests</h3>
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
                                        <th class="dt-no-sorting">Requested Date</td>
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
                                        
                                        <td>
                                            <?php
                                                if ($data['price']==0) {
                                            ?>
                                                
                                            <?php        
                                                    echo "N/A";
                                                }else{
                                            ?>
                                                
                                            <?php        
                                                    echo "$".$data['price'];
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                $date=date_create($data['created_at']);
                                                echo date_format($date,"d-m-Y");
                                             ?>
                                        </td>
                                        <td>
                                            
                                            <?php
                                                if ($data['status']==0) {
                                            ?>
                                                <span class="shadow-none badge badge-primary">
                                            <?php        
                                                    echo "Waiting For approval";
                                                }else if($data['status']==1){
                                            ?>
                                                <span class="shadow-none badge badge-danger">
                                            <?php        
                                                    echo "Due Payment";
                                                }else if($data['status']==2){
                                            ?>
                                                <span class="shadow-none badge badge-success">
                                            <?php        
                                                    echo "Under Process";
                                                }  
                                             ?>    
                                        </td>
                                        <td>
                                            <a href="request_detail_page.php?id=<?php echo $data['id'] ?>"><i class="far fa-list-alt" style="color: green; font-size: 18px;margin-right: 10px" aria-hidden="true"></i></a>
                                            <a href="deleteGroup.php?id=<?php echo $data['id'];?>&table=service_requests&page=due_payment_req.php"><i class="far fa-times-circle" onclick="return confirm('Are you sure?')" style="color: red; font-size: 18px; margin-left: 5px;" aria-hidden="true"></i></a>
                                            <?php 
                                                if ($data['status']==1) {
                                            ?>
                                                    <form method="POST" action="submit.php?id=<?php echo $data['id']; ?>">
                                                        <script 
                                                            src="https://checkout.stripe.com/checkout.js"
                                                            class="stripe-button"
                                                            data-key="<?php echo $publisher_key; ?>"
                                                            data-amount="<?php echo 100*(float)$data['price']; ?>"
                                                            data-name="Cystan"
                                                            data-email="<?php echo $user_email; ?>"
                                                            data-description="Additions to Credit Report"
                                                            data-currency="usd"
                                                            data-image="logo/Cystan_a.png" 


                                                        ></script>

                                                    </form>
                                            <?php
                                                }

                                             ?>

                                        </td>
                                        
                                    </tr>
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