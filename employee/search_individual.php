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
$comp=mysqli_query($conn,"SELECT * FROM individual WHERE status='1' AND manage_role='2' AND manage_by='$user_id'");
$is_searched=0;
if (isset($_POST['submit'])) {
    $comp_id=$_POST['comp_id'];
    $companies=mysqli_query($conn,"SELECT * from individual WHERE id='$comp_id'");
     $is_searched=1;  
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
                                            <h3>Search Individual</h3>
                                        </div>
                                    </div>
                                </div>
                               	<form action="" method="POST" class="mt-5">
                                       
                                    <div class="form-row mb-4">
                                        
                                        <div class="form-group col-md-5">
                                            <select class="form-control select2" name="comp_id" >
                                                <option class="" value="">Select Individual</option>
                                                <?php
                                                    while ($data=mysqli_fetch_array($comp)) {
                                                ?>
                                                    <option value="<?php echo $data['id']?>"><?php echo $data['name']." [".$data['email']."]"?></option>
                                                <?php        
                                                    }
                                                ?>

                                            </select>
                                        </div>

                                         
                                        <div class="form-group col-md-2">
                                            <button type="submit" name="submit" class="btn btn-danger" style="height: 45px"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button>
                                        </div>
                                        
                                         <hr>


                                    </div>
                                </form> 

                                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th class="dt-no-sorting">Email</th>
                                        <th class="dt-no-sorting">Contact</th>

                                        <th class="dt-no-sorting" >Companies</th>
                                        <th class="dt-no-sorting">Login</th>
                                        <th class="dt-no-sorting">Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  
                                        $count=1;
                                        if ($is_searched==1) {
                                           while ($data=mysqli_fetch_array($companies)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $data['name']; ?></td>
                                       
                                        <td>
                                            <input type="email" id="email<?php echo $data['id'];?>" value="<?php echo $data['email'];?>" style="display: none;">
                                            <?php echo $data['email']; ?>
                                        </td>
                                        <td><?php echo $data['phone'];?></td>
                                        
                                        <td class="justify-content-center"><span class="shadow-none badge badge-success ">
                                            <?php 
                                                $ind_id=$data['id'];
                                                $company_count=mysqli_query($conn,"SELECT COUNT(*) AS count from company where owned_by='$ind_id' AND status='1'");
                                                $result_company_count=mysqli_fetch_array($company_count);
                                                echo $result_company_count['count'];
                                            ?>
                                        </td>
                                         <td>
                                            <a onclick="sendCredentials(email<?php echo $data['id'];?>,<?php echo $data['id'];?>)">
                                           <svg viewBox="0 0 24 24" width="24" height="24" stroke="blue" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg></a>
                                        </td>
                                        <td>
                                              <a href="people_detail_page.php?id=<?php echo $data['id']?>" >
                                                <i class="far fa-user" style="color: green; font-size: 18px;" aria-hidden="true"></i></a>
                                            <a href="update_people.php?id=<?php echo $data['id']?>"><i class="far fa-edit" style="color: blue; font-size: 18px;margin-right: 5px;margin-left:10px" aria-hidden="true"></i></a>
                                            <a onclick="block(<?php echo $data['id'];?>);"><i class="far fa-times-circle" style="color: red; font-size: 20px;" aria-hidden="true"></i></a>
                                        </td>
                                        
                                    </tr>
                                    <!-- Modal -->
                                        
                                    <?php
                                        $count++;        
                                        }
                                        }
                                        
                                    ?>
                                </tbody>
                            </table>
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
   
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
    <script type="text/javascript">
        feather.replace();
        setTimeout(()=> {
            $('#alert').hide('slow')
        }, 5000)
        function sendCredentials(id,cid){
            var email=$(id).val();
            var password = Math.random().toString(36).slice(-8);
            console.log(email)
            console.log(password)
            console.log('Company id ='+cid) 

            $.post('send_ind_login.php', {email: email,password:password,id:cid}).then((result)=> {
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
        function block(id){
            console.log(id)
            swal({
              title: "Are you sure?",
              text: "Once deleted, All Clients related to this individual will also be deleted!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                $.get("block_unblock.php?id="+id+"&table=individual&status=0&page=view_people.php").then((result)=> {
                    if (result.error==false) {
                        swal("Poof! Individual has been deleted!", {
                          icon: "success",
                          buttons:false,
                        });
                        setTimeout(()=> {
                            location.reload();
                        }, 1000)
                        
                    }
                })                
              } 
            });
        }
    </script>
</body>
</html>