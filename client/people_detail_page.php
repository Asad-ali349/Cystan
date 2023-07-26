<?php
   include_once("session.php");
   
   
   $id=$_SESSION['login_user'];
   if (isset($_SESSION['success']) && isset($_SESSION['error'])) {
    $success=$_SESSION['success'];
    $error=$_SESSION['error'];
}else{
    $success="";
    $error="";   
}
   $groups=mysqli_query($conn,"SELECT grouping.*,pin_color.color_code FROM grouping LEFT JOIN pin_color ON pin_color.id=grouping.pin_color_id WHERE category_id='1'");
   
   $ind=mysqli_query($conn,"SELECT individual.*,grouping.name AS group_name FROM individual LEFT JOIN grouping ON grouping.id=individual.group_id WHERE individual.id='$id'" );
   $data=mysqli_fetch_array($ind);
   $docs= mysqli_query($conn,"SELECT company_docs.*,grouping.name AS typeName FROM company_docs LEFT JOIN grouping ON grouping.id=company_docs.type where company_id='$id' AND is_company='0'");
  $companies=mysqli_query($conn,"SELECT company.* ,grouping.name AS 'group',naics.sic_code,naics.naics_code,naics.description,naics.ins from company LEFT JOIN grouping ON grouping.id=company.group_id LEFT JOIN naics ON naics.id=company.naics_id WHERE owned_by='$id' AND status='1'");
   
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
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
               <div class="col-lg-12 col-12  mt-3 mb-4">
                  <div class="statbox widget box box-shadow mb-4">
                     <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-10 col-md-10 col-sm-12 col-12">
                              <h4 class="card-user_name"><?php echo $data['name']; ?></h4>
                           </div>
                           <div class="col-xl-2 col-md-2 col-sm-4 col-12">
                              <a href="update_people.php?id=<?php echo $data['id'];?>" class="btn btn-danger"><i class="far fa-edit" style=" font-size: 18px;margin-right: 5px" aria-hidden="true"></i>Update</a>
                           </div>
                        </div>
                     </div>
                     <div class="widget-content">
                        <div style="text-align: left;">
                           <div>
                               <i class="fa fa-envelope" style="height: 15px;width: 15px;margin-right: 5px"aria-hidden="true"></i>
                               <span class="card-user_name"><a href="mailto:<?php echo $data['email']; ?>"><?php echo $data['email'];?></a></span>        
                           </div>
                           <div>
                               <i class="fa fa-phone" style="height: 15px;width: 15px;margin-right: 5px"aria-hidden="true"></i>
                               <span><?php echo $data['phone'];?></span>        
                           </div>
                            
                           <div>
                               <i class="fa fa-map-marker" style="height: 15px;width: 15px;margin-right: 5px"aria-hidden="true"></i>
                               <span><a href="https://www.google.com/maps/dir/Current+Location/<?php echo $data['lattitude'];?>,<?php echo $data['longitude'];?>" target="_blank"><?php echo $data['street'].", ".$data['city'].", ".$data['state'].", ".$data['zip'].", ".$data['country']; ?></a></span>     
                           </div>
                           <br>

                           <div>
                               <span style="color: brown;"><b>SSN:</b></span>
                               <span style="color: brown;"><b> <?php echo $data['ssn'];?></b></span>        
                           </div>
                           <div>
                               <span >DOB (date of birth):</span>
                               <span> <?php echo $data['dob'];?></span>        
                           </div>
                           <div>
                               <span >Group:</span>
                               <span> <?php echo $data['group_name'];?></span>        
                           </div>
                           
                           <div>
                               <span >Credit Score:</span>
                               <span> <?php echo $data['credit_score'];?></span>        
                           </div>
                           <div>
                               <span >Loan Number:</span>
                               <span> <?php echo $data['loan_number'];?></span>        
                           </div>
                            <div>
                               <span >Cutomer ID:</span>
                               <span> <?php echo $data['id_number'];?></span>        
                           </div>
                           <div>
                              <span >Managed By:</span>
                              <span><?php 
                                       if ($data['manage_role']==0) {
                                          echo "Admin";
                                       }else if ($data['manage_role']==1) {
                                          $sid=$data['manage_by'];
                                          $get_name=mysqli_query($conn,"SELECT name from supervisor where id='$sid'");
                                          $result_get_name=mysqli_fetch_array($get_name);
                                          echo $result_get_name['name']." (Supervisor)";
                                       }else if ($data['manage_role']==2) {
                                          $eid=$data['manage_by'];
                                          $get_name=mysqli_query($conn,"SELECT name from employee where id='$eid'");
                                          $result_get_name=mysqli_fetch_array($get_name);
                                          echo $result_get_name['name']." (Employee)";
                                       }
                                    ?>      
                              </span>        
                           </div>
                           <div>
                              <img src="<?php echo $data['signature'] ?>">
                           </div>

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
               <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing ">
                  <div class="widget-content-area br-6 mt-2">
                     <div class="widget-header ml-4 mt-2">
                        <div class="row">
                           <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                              <h3>Docs details</h3>
                           </div>
                        </div>
                     </div>
                     <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th class="dt-no-sorting">Doc type</th>
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
                              <td>  <a href="<?php echo "../documents/".$data2['document'];?>"  target="_blank" style="color:blue"><?php echo $data2['name']; ?></a>
                              </td>
                              <td>
                                <form method="POST" action="update_doc_type.php" id="form_<?php echo $data2['id'] ?>">
                                <input type="hidden" name="document_id" value="<?php echo $data2['id'] ?>">                               
                                 <select class="form-control select2" data-file_id="<?php echo $data2['id']; ?>" name="typeid" >
                                    <option class="" value="">Select Type</option>
                                    <?php
                                        $type=mysqli_query($conn,"SELECT * FROM grouping where category_id='5'");
                                        while($data3=mysqli_fetch_array($type)){
                                            if($data2['typeName']==$data3['name'])
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
                                       echo $addedby['name']." [You]";
                                    }
                                    

                                 ?></td>
                              <td>
                                
                               
                                 <!-- <button type="submit" class=""><i class="far fa-check-circle" style="color: green; font-size: 18px;margin-right: 5px" aria-hidden="true"></i></button>
 -->


                                 <a href="unlink.php?id=<?php echo $data2['id'];?>&table=company_docs&page=people_detail_page.php?id=<?php echo $id?>" onclick="return confirm('Are you sure?')"><i class="far fa-times-circle" style="color: red; font-size: 20px;" aria-hidden="true"></i></a>
                               
                                 
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
               <div class="col-xl-12 col-lg-12 col-sm-12  mb-5">
                     <div class="widget-content widget-content-area br-6 mt-2">
                         <div class="widget-header ml-4 mt-2">
                             <div class="row">
                                 <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                     <h2>Company Record</h2>
                                 </div>                                                                        
                             </div>
                         </div>
                         <table id="html7-extension" class="table table-hover non-hover" style="width:100%">
                             <thead>
                                 <tr>
                                     <th>#</th>
                                     <th>Name</th>
                                     <th class="dt-no-sorting">Email</th>
                                     <th class="dt-no-sorting">Contact</th>
                                     <th class="dt-no-sorting">Address</th>
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
                                     <td><?php echo $data['street'].", ".$data['city'].", ".$data['state'].", ".$data['zip'].", ".$data['country']; ?></td>

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
                                                 <button class="btn btn-success" onclick="sendCredentials(email<?php echo $data['id'];?>,<?php echo $data['id'];?>,<?php echo $data['manage_role'];?>,<?php echo $data['managed_by'];?>,name<?php echo $data['id'];?>)">SEND</button>
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
         Dropzone.autoDiscover = false;
   
         $(function() {
             var myDropzone = new Dropzone(".dropzone", {
                 url: "upload.php?id=<?php echo $id?>&is_company=0",
                 paramName: "file",
                 maxFilesize: 5,
                 maxFiles: 20,
             });
         });

         
      </script>
      <script>
           $('.select2').change(function(e){
            
               var doc_type= e.target.value;
               var file_id = e.target.getAttribute('data-file_id');
              
               $.get('update_doc_type_ajax.php?file_id='+file_id+'&doc_type='+doc_type).done(function(data){
                     console.log(data)
               })
            });

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

        setTimeout(()=> {
            $('#alert').hide('slow')
        }, 5000)
    </script>
   </body>
</html>