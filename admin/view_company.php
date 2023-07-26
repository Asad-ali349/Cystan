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


$companies=mysqli_query($conn,"SELECT 'emp_name',individual.name AS owner,company.*,grouping.name AS group_name,pin_color.name AS color_name,pin_color.color_code AS color_code,naics.sic_code,naics.naics_code,naics.description,naics.ins,company.customer_id,company.loan_number FROM company LEFT JOIN pin_color ON pin_color.id=company.pin_color_id LEFT JOIN grouping ON grouping.id=company.group_id LEFT JOIN naics ON naics.id= company.naics_id LEFT JOIN individual ON company.owned_by=individual.id WHERE company.status='1' AND company.manage_role='0'
UNION    
    SELECT employee.name AS emp_name,individual.name AS owner,company.*,grouping.name AS group_name,pin_color.name AS color_name,pin_color.color_code AS color_code,naics.sic_code,naics.naics_code,naics.description,naics.ins,company.customer_id,company.loan_number FROM company LEFT JOIN pin_color ON pin_color.id=company.pin_color_id LEFT JOIN grouping ON grouping.id=company.group_id LEFT JOIN naics ON naics.id= company.naics_id  LEFT JOIN employee ON employee.id=company.managed_by LEFT JOIN individual ON company.owned_by=individual.id  WHERE company.status='1' AND company.manage_role='2'
UNION
    SELECT supervisor.name AS emp_name,individual.name AS owner,company.*,grouping.name AS group_name,pin_color.name AS color_name,pin_color.color_code AS color_code,naics.sic_code,naics.naics_code,naics.description,naics.ins,company.customer_id,company.loan_number FROM company LEFT JOIN pin_color ON pin_color.id=company.pin_color_id LEFT JOIN grouping ON grouping.id=company.group_id LEFT JOIN naics ON naics.id= company.naics_id  LEFT JOIN supervisor ON supervisor.id=company.managed_by LEFT JOIN individual ON company.owned_by=individual.id  WHERE company.status='1' AND company.manage_role='1'  
    ORDER BY `id` DESC" );


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
                                        <h2>Company Record</h2>
                                    </div>                                                                        
                                </div>
                            </div>
                            <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th class="dt-no-sorting">Email</th>
                                        <th class="dt-no-sorting">Contact</th>
                                        <th class="dt-no-sorting">Managed By</th>
                                        <th class="dt-no-sorting">Own By</th>
                                        <th class="dt-no-sorting">Login</th>
                                        <th class="dt-no-sorting">Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  
                                        $count=1;
                                        while ($data=mysqli_fetch_array($companies)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td ><?php echo $data['name']; ?></td>
                                        <td>
                                            
                                            <?php echo $data['email']; ?>
                                                
                                            </td>
                                        <td><?php echo $data['contact']; ?></td>
                                        
                                        <td> <span class="shadow-none badge badge-success"><?php 
                                                if ($data['manage_role']==0) {
                                                     echo "Admin";
                                                 }elseif ($data['manage_role']==1) {
                                                     echo $data['emp_name']." (supervisor)";
                                                 }elseif ($data['manage_role']==2) {
                                                     echo $data['emp_name']." (Employee)";
                                                 } 
                                            ?>
                                        </td>
                                        <td><span class="shadow-none badge badge-success">
                                            <?php 
                                                if ($data['owned_by']==0) {
                                                    echo "None";
                                                }else{
                                                    echo $data['owner'];
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <a data-toggle="modal" data-target="#modal<?php echo $count; ?>">
                                           <svg viewBox="0 0 24 24" width="24" height="24" stroke="blue" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg></a>
                                        </td>
                                        <td>
                                             <a href="company_detail_page.php?id=<?php echo $data['id']?>" >
                                                <i class="far fa-user" style="color: green;font-size: 18px" aria-hidden="true"></i></a>
                                            <a href="update_company.php?id=<?php echo $data['id']?>"><i class="far fa-edit" style="color: blue; font-size: 18px;margin-right: 5px;margin-left:10px" aria-hidden="true"></i></a>
                                            <a href="block_unblock.php?id=<?php echo $data['id'];?>&table=company&page=view_company.php&status=0" onclick="return confirm('Are you sure?')"><i class="far fa-times-circle" style="color: red; font-size: 20px;" aria-hidden="true"></i></a>
                                        </td>
                                        
                                    </tr>
                                     <div class="modal md" id="modal<?php echo $count; ?>" tabindex="-1" role="dialog">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="name<?php echo $data['id']?>"><?php echo $data['name']; ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                    <label>Email:</label>
                                                    <input type="email" class="form-control" name="email" value="<?php echo $data['email']; ?>" id="email<?php echo $data['id'];?>">
                                              </div>
                                              <div class="modal-footer">
                                                    <button class="btn btn-danger" onclick="sendCredentials(email<?php echo $data['id'];?>,<?php echo $data['id'];?>,<?php echo $data['manage_role'];?>,<?php echo $data['managed_by'];?>,name<?php echo $data['id'];?>)">SEND</button>
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
    </script>

</body>
</html>