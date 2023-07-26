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
$sql=mysqli_query($conn,"SELECT * FROM pin_color");
$groups=mysqli_query($conn,"SELECT grouping.id,grouping.name,grouping.pin_color_id,grouping.category_id,pin_color.color_code FROM grouping INNER JOIN pin_color ON grouping.pin_color_id = pin_color.id WHERE category_id='2'");

if (isset($_POST['submit'])) {
    $name=$_POST['name'];
    $color=$_POST['color'];
    
        $addGroup=mysqli_query($conn,"INSERT INTO grouping(name,pin_color_id,category_id) VALUES('$name','$color','2')");
        $groups=mysqli_query($conn,"SELECT grouping.id,grouping.name,grouping.pin_color_id,grouping.category_id,pin_color.color_code FROM grouping INNER JOIN pin_color ON grouping.pin_color_id = pin_color.id WHERE category_id='2'");
        if($addGroup==TRUE) {

             $success="Group Added";
        }else{
            $error="Error: " . $sql . "<br>" . $conn->error;
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
                        <div class="col-lg-12 col-12 layout-spacing" >
                            
                            <div class="statbox widget box box-shadow mb-4">
                                <div class="widget-header">
                                    <div class="row mb-2">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h3>Add Individual Group</h3>
                                        </div>                                                                        
                                    </div>
                                </div>
                                
                                    <form action="" method="POST">
                                       
                                        <div class="form-row mb-4">
                                            
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <select class="form-control select2" name="color">
                                                    <option class="" value="">Select Pin Color</option>
                                                    <?php
                                                    while ($data=mysqli_fetch_array($sql)) {
                                                  ?>
                                                    <option value="<?php echo $data['id']?>"><?php echo $data['name']?></option>
                                                <?php        
                                                    }
                                                  ?>

                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <button type="submit" name="submit" class="btn btn-danger" style="height: 45px">Add Group</button>
                                            </div>
                                            
                                             <hr>


                                        </div>
                                    </form>

                            </div>
                        </div>

                    
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing mb-4">
                        <div class="widget-content widget-content-area br-6 mt-2">
                            <div class="widget-header ml-4 mt-2">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h3>Individual Groups</h3>
                                    </div>                                                                        
                                </div>
                            </div>
                            <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th class="dt-no-sorting">Pin Color</th>
                                        <th class="dt-no-sorting">Action</th>
                                        
                                    </tr>


                                </thead>
                                <tbody>
                                    <?php  
                                        $count=1;
                                        while ($data=mysqli_fetch_array($groups)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $count ?></td>
                                        <td><?php echo $data['name']; ?> </td>
                                        <td>
                                            <div style="width: 20px;height: 20px;border-radius: 20px ;background-color: <?php echo $data['color_code']; ?>"></div>
                                        </td>
                                        <td>
                                            
                                            <a data-toggle="modal" data-target="#modal<?php echo $count; ?>"><i class="far fa-edit" style="color: blue; font-size: 18px;margin-right: 5px" aria-hidden="true"></i></a>
                                            <a href="deleteGroup.php?id=<?php echo $data['id'];?>&table=grouping&page=add_people_group.php" onclick="return confirm('Are you sure?')"><i class="far fa-times-circle" style="color: red; font-size: 20px;" aria-hidden="true"></i></a>
                                        </td>
                                        <div class="modal md" id="modal<?php echo $count; ?>" tabindex="-1" role="dialog">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title"><?php echo "Update Individual Group" ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                    <input type="text" class="form-control"  value="<?php echo $data['id']; ?>" id="id<?php echo $data['id'];?>" style="display: none;">
                                                    <label>Name:</label>
                                                    <input type="text" class="form-control"  value="<?php echo $data['name']; ?>" id="name<?php echo $data['id'];?>">
                                                    <label>Pin Color:</label>
                                                    <select class="form-control" id="color<?php echo $data['id'];?>" >
                                                    <option class="" value="">Select Pin Color</option>
                                                    <?php
                                                        $color=mysqli_query($conn,"SELECT * FROM pin_color");
                                                        while ($data3=mysqli_fetch_array($color)) {
                                                            if ($data['pin_color_id']==$data3['id']) {
                                                    ?>
                                                                <option value="<?php echo $data3['id']?>" selected><?php echo $data3['name']?></option>
                                                    <?php            
                                                            }else{   
                                                    ?>
                                                                <option value="<?php echo $data3['id']?>"><?php echo $data3['name']?></option>
                                                    <?php
                                                            }        
                                                        }
                                                    ?>

                                                </select>
                                              </div>
                                              <div class="modal-footer">
                                                    <button class="btn btn-danger" onclick="updateGroup(name<?php echo $data['id'];?>,color<?php echo $data['id'];?>,id<?php echo $data['id'];?>)">Update</button>
                                              </div>
                                            </div>
                                          </div>
                                    </div>
                                        
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
         function updateGroup(name,colorid,id){
            var gid=$(id).val();
            var gname=$(name).val();
            var cid=$(colorid).val();
            console.log("Groupid = "+gid+" Group Name = "+gname+" colorid = "+cid);
            

            

            $.post('update_group.php', {id: gid,name:gname,color:cid}).then((result)=> {
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