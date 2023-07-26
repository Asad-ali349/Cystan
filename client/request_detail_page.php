<?php
   include_once("db/session.php");
   require('stripe_config.php');
   
   $user_id=$_SESSION['login_user'];
   $user_email=$_SESSION['email'];
   
   $id=$_GET["id"];
   if (isset($_SESSION['success']) && isset($_SESSION['error'])) {
    $success=$_SESSION['success'];
    $error=$_SESSION['error'];
}else{
    $success="";
    $error="";   
}
   $services_req=mysqli_query($conn,"SELECT service_requests.*,Date(service_requests.created_at) as requested_date,services.title,grouping.name as type FROM `service_requests` JOIN services ON services.id=service_requests.service_id INNER JOIN grouping ON services.service_type=grouping.id WHERE service_requests.id='$id'" );
   $data=mysqli_fetch_array($services_req);
   $docs= mysqli_query($conn,"SELECT * FROM service_request_docs where service_request_id='$id' AND added_role='3'");
   $docs2= mysqli_query($conn,"SELECT service_request_docs.*,grouping.name as stype FROM service_request_docs LEFT JOIN grouping ON service_request_docs.type=grouping.id where service_request_docs.service_request_id='$id' AND service_request_docs.added_role!='3'");
   $trans=mysqli_query($conn,"SELECT transactions.*,services.title,individual.name FROM `transactions` INNER JOIN service_requests ON service_requests.id=transactions.req_id INNER JOIN individual ON individual.id=service_requests.individual_id INNER JOIN services ON services.id=service_requests.service_id WHERE service_requests.individual_id='$user_id' AND transactions.req_id='$id'");
    
// if(isset($_POST['udate'])){
//         $type=$_POST['typeid'];
//     $update_doc=mysqli_query($conn,"UPDATE company_docs SET type='$type'");
//  }   
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <?php include_once("includes/head.php")?>
   <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css">
   <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
   <link href="assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />
   <link href="plugins/animate/animate.css" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" href="plugins/font-icons/fontawesome/css/regular.css">
   <link rel="stylesheet" href="plugins/font-icons/fontawesome/css/fontawesome.css">
   <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
   <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css">
   <link href="assets/css/components/cards/card.css" rel="stylesheet" type="text/css" />
   <link href="assetsss/plugins/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css">
   <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
   <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_html5.css">
   <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
   <link rel="stylesheet" href="plugins/font-icons/fontawesome/css/regular.css">
   <link rel="stylesheet" href="plugins/font-icons/fontawesome/css/fontawesome.css">
   <style type="text/css">
      
   </style>
   <body>
      <!-- BEGIN LOADER -->
      <div id="load_screen">
         <div class="loader">
            <div class="loader-content">
               <div class="spinner-grow align-self-center"></div>
            </div>
         </div>
      </div>
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
               <div class="col-lg-12 col-12  mt-3 mb-4"  >
                  <div class="statbox widget box box-shadow mb-4">
                     <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-10 col-md-10 col-sm-12 col-12">
                              <h4 class="card-user_name"><?php echo $data['title']; ?></h4>
                           </div>
                           <div class="col-xl-2 col-md-2 col-sm-4 col-12">
                              <?php
                                    if ($data['status']==0) {
                                ?>
                                    <span class="shadow-none badge badge-primary">
                                <?php        
                                        echo "Waiting For approval";
                                    }else if($data['status']==1){
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
                                        ;
                                    }else if($data['status']==2){
                                ?>  </a>
                                    <span class="shadow-none badge badge-success">
                                <?php        
                                        echo "Under Process";
                                    }  
                                 ?>
                           </div>
                        </div>
                     </div>
                     <div class="widget-content">
                        <div style="text-align: left;">
                           <div>
                              <span class="card-user_name">Type: <?php echo $data['type']; ?></span>        
                           </div>
                           <div>
                              
                              <span>Price: <?php echo $data['price']; ?></span>        
                           </div>
                           <div>
                              <span> Requested Date: <?php echo $data['requested_date']; ?></span>        
                           </div>
                           <div>
                              <span> Description: <?php echo $data['description']; ?></span>        
                           </div>
                           
                           <br>
                          
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-12 col-12  mt-3 mb-4" >
                  <div class="statbox widget box box-shadow mb-4">
                     <div class="widget-header">
                        <div class="row">
                           <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                              <h2>Add Documents</h2>
                           </div>
                        </div>
                     </div>
                     <div class="widget-content">
                        <form action="upload.php?id=<?php echo $id?> " enctype="multipart/form-data" class="dropzone" id="dropzonewidget">
                           
                        </form>
                     </div>
                  </div>
               </div>
               <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing mb-4">
                  <div class="widget-content-area br-6 mt-2">
                     <div class="widget-header ml-4 mt-2">
                        <div class="row">
                           <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                              <h3>Docs details Sent By You</h3>
                           </div>
                        </div>
                     </div>
                     <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th class="dt-no-sorting">Docs type</th>
                              <th class="dt-no-sorting">Upload Date</th>
                              <th class="dt-no-sorting">Uploaded By</th>
                              <th class="dt-no-sorting">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php  
                              $count=1;
                              while ($data2=mysqli_fetch_array($docs)) {
                              ?>
                           <tr>
                              <td><?php echo $count ?></td>
                              <td>  <a href="<?php echo "../request_document/".$data2['document'];?>"  target="_blank" style="color:blue"><?php echo $data2['document']; ?></a>
                              </td>
                              <td>
                                <form method="POST" action="update_doc_type.php" id="form_<?php echo $data2['id'] ?>">
                                <input type="hidden" name="document_id" value="<?php echo $data2['id'] ?>">                               
                                 
                                
                                
                                <select class="form-control select2" data-file_id="<?php echo $data2['id']; ?>" name="typeid" >
                                    <option class="" value="">Select Type</option>
                                    <?php
                                        $type=mysqli_query($conn,"SELECT * FROM grouping where category_id='5'");
                                        while($data3=mysqli_fetch_array($type)){
                                            if($data2['type']==$data3['id'])
                                            {
                                    ?>
                                            <option value="<?php echo $data3['id']?>" selected><?php echo $data3['name']?></option>
                                    <?php
                                        }
                                        else
                                        {
                                        ?>
                                            <option value="<?php echo $data3['id']?>"><?php echo $data3['name']?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                                
                              
                                 </form>
                              </td>
                              <td><?php 
                                    $date=date_create($data2['created_at']);
                                    echo date_format($date,"d-m-Y");
                                ?></td>
                                <td><?php 
                                    if ($data2['added_role']==0) {
                                       echo "Admin";
                                    }else if ($data2['added_role']==1) {
                                       $supid=$data2['added_by'];
                                       $addedby=mysqli_fetch_array(mysqli_query($conn,"SELECT name FROM supervisor where id='$supid'"));
                                       echo $addedby['name']." [Supervisor]";  
                                    }else if ($data2['added_role']==2) {
                                       // code...
                                       $empid=$data2['added_by'];
                                       $addedby=mysqli_fetch_array(mysqli_query($conn,"SELECT name FROM employee where id='$empid'"));
                                       echo $addedby['name']." [Employee]";
                                    }else if ($data2['added_role']==3) {
                                       // code...
                                       $empid=$data2['added_by'];
                                       $addedby=mysqli_fetch_array(mysqli_query($conn,"SELECT name FROM individual where id='$empid'"));
                                       echo $addedby['name']." [Individual]";
                                    }
                                    

                                 ?></td>
                              <td>
                                


                                 <a href="unlink.php?id=<?php echo $data2['id'];?>&table=service_request_docs&page=request_detail_page.php?id=<?php echo $id?>" onclick="return confirm('Are you sure?')"><i class="far fa-times-circle" style="color: red; font-size: 20px;" aria-hidden="true"></i></a>
                               
                                 
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
               <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing mb-4">
                  <div class="widget-content-area br-6 mt-2">
                     <div class="widget-header ml-4 mt-2">
                        <div class="row">
                           <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                              <h3>Docs details Sent From Cystan </h3>
                           </div>
                        </div>
                     </div>
                     <table id="html7-extension" class="table table-hover non-hover" style="width:100%">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th class="dt-no-sorting">Docs type</th>
                              <th class="dt-no-sorting">Upload Date</th>
                              <th class="dt-no-sorting">Uploaded By</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php  
                              $count=1;
                              while ($data2=mysqli_fetch_array($docs2)) {
                              ?>
                           <tr>
                              <td><?php echo $count ?></td>
                              <td>  <a href="<?php echo "../request_document/".$data2['document'];?>"  target="_blank" style="color:blue"><?php echo $data2['document']; ?></a>
                              </td>
                              <td>
                                <?php echo $data2['stype'] ?>
                              </td>
                              <td><?php 
                                    $date=date_create($data2['created_at']);
                                    echo date_format($date,"d-m-Y");
                                ?></td>
                                <td><?php 
                                    if ($data2['added_role']==0) {
                                       echo "Admin";
                                    }else if ($data2['added_role']==1) {
                                       $supid=$data2['added_by'];
                                       $addedby=mysqli_fetch_array(mysqli_query($conn,"SELECT name FROM supervisor where id='$supid'"));
                                       echo $addedby['name']." [Supervisor]";  
                                    }else if ($data2['added_role']==2) {
                                       // code...
                                       $empid=$data2['added_by'];
                                       $addedby=mysqli_fetch_array(mysqli_query($conn,"SELECT name FROM employee where id='$empid'"));
                                       echo $addedby['name']." [Employee]";
                                    }else if ($data2['added_role']==3) {
                                       // code...
                                       $empid=$data2['added_by'];
                                       $addedby=mysqli_fetch_array(mysqli_query($conn,"SELECT name FROM individual where id='$empid'"));
                                       echo $addedby['name']." [Individual]";
                                    }
                                    

                                 ?></td>
                              
                           </tr>
                           <?php
                              $count++;        
                              }
                              ?>
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6 mt-2">
                            <div class="widget-header ml-4 mt-2">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h3>Transaction Record</h3>
                                    </div>                                                                        
                                </div>
                            </div>
                            <table id="table22" class="table table-hover non-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="dt-no-sorting">Transcation Id</th>
                                        <th class="dt-no-sorting">Amount</td>
                                        <th class="dt-no-sorting">Date</th>
                                        <th class="dt-no-sorting">Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  
                                        $count=1;
                                        while ($data=mysqli_fetch_array($trans)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $count ?></td>
                                        <td><?php echo $data['transaction_id']; ?></td>
                                        <td><?php echo "$".(float)$data['amount']/100; ?></td>
                                        <td>
                                            <?php 
                                                $date=date_create($data['created_at']);
                                                echo date_format($date,"d-m-Y");
                                             ?>
                                        </td>
                                        <td>
                                            <?php 
                                                $date=date_create($data['created_at']);
                                                echo date_format($date,"h:i A");
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
      <script src="plugins/font-icons/feather/feather.min.js"></script>
      <script >
         feather.replace();
         
         
      </script>
      <script src="plugins/highlight/highlight.pack.js"></script>
      <script src="assets/js/custom.js"></script>
      <script src="assets/js/scrollspyNav.js"></script>
      <script src="assetsss/plugins/dropzone/dist/dropzone.js"></script>
      <script src="plugins/table/datatable/datatables.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
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
      <script>
         $('#html7-extension').DataTable( {
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
      <script>
         $('#table22').DataTable( {
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
      <script>
         Dropzone.autoDiscover = false;
         
         $(function() {
             var myDropzone = new Dropzone(".dropzone", {
                 url: "upload_req_docs.php?id=<?php echo $id?>",
                 paramName: "file",
                 maxFilesize: 100,
                 maxFiles: 20,
             });
         });

         
         function update(){
            alert("xyz");
         }
      </script>


      <script>
           $('.select2').change(function(e){
            
               var doc_type= e.target.value;
               var file_id = e.target.getAttribute('data-file_id');
              
               $.get('update_req_doc_type_ajax.php?file_id='+file_id+'&doc_type='+doc_type).done(function(data){
                     console.log(data)
               })
            });
           setTimeout(()=> {
            $('#alert').hide('slow')
        }, 5000)
      </script>

   </body>
</html>  