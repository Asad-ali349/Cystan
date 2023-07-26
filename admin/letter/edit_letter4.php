<?php 
     include("../db/letter_session.php");
    $user_id=$_SESSION['login_user']; 
    $lid=$_GET['lid'];
    $letter4=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM letter_4 WHERE id='$lid'"));
    $letter4_items=mysqli_query($conn,"SELECT * FROM letter_four_items WHERE letter_id='$lid'");

    $bureaus=mysqli_query($conn,"SELECT * FROM bureau");
    $ind=mysqli_query($conn,"SELECT * FROM individual where status='1'");
    $reasons=mysqli_query($conn,"SELECT * FROM reason_of_letter");
    $reason=mysqli_query($conn,"SELECT * FROM reason_of_letter");
    
    $success="";
    $error="";
    if (isset($_POST['submit'])) {
    
        $bureau=$_POST['bureau'];
        $date=$_POST['date'];
        $additional=$_POST['additional'];
        $additional=htmlspecialchars($additional);
        $additional =str_replace("'", "&apos;", $additional);
        $additional=str_replace('"', "&quot;", $additional);
        
        
        $add_letter=mysqli_query($conn,"UPDATE letter_4 SET b_id='$bureau',datee='$date',note='$additional' WHERE id='$lid'");
        if ($add_letter) {
            $delete=mysqli_query($conn,"DELETE FROM letter_four_items WHERE letter_id='$lid'");
    
             if (isset($_POST['item'])) {

                foreach($_POST['item'] as $key=>$val){
                    $item= $_POST['item'][$key];
                    $letter_reason= $_POST['reason'][$key];
                    
                    $item=mysqli_query($conn,"INSERT INTO letter_four_items(letter_id,item,reason_id)VALUES ('$lid','$item','$letter_reason')");
                    if ($item==false) {
                        echo $conn->error;
                    }
                }
                if ($add_letter==true && $item==true) {
                     header("Location: letter_preview4.php?id=$lid");    
                    
    
                }
            }
        }else{
            echo "Error: ".$conn->error;
        }
    
    }
    $get_service=mysqli_query($conn,"SELECT * from services");
    
     ?>
<!DOCTYPE html>
<html lang="en">
    <?php include_once("includes/head_for_letter.php")?>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css">
    <link rel="stylesheet" href="plugins/editors/markdown/simplemde.min.css">
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
                    <div class="alert alert-success mb-4 " role="alert" id="alert">
                        <strong>Success! </strong><?php echo $success;?>
                    </div>
                    <?php        
                        }elseif ($error!="") {
                        ?>        
                    <div class="alert alert-danger mb-4" role="alert">
                        <strong>Error! </strong><?php echo $error;?>
                    </div>
                    <?php         
                        }
                        ?>
                    <div class="col-lg-12 col-12 layout-spacing">
                        <div class="statbox widget box box-shadow mb-4">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h2>Corrections to Credit Report </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <form action="" method="POST" >
                                    <div class="form-row mb-4">
                                        
                                        <div class="form-group col-md-6">
                                            <label>Date:</label>
                                            <input type="date" name="date" value="<?php echo $letter4['datee'] ?>" required class="form-control"> 
                                        </div>
                                        <div class="form-group col-md-6" >
                                            <label>Bureaus:</label>
                                            <select class="form-control select2" id="letter" name="bureau">
                                                <option class="" value="">Select Bureau</option>
                                                <?php
                                                    while ($data2=mysqli_fetch_array($bureaus)) {
                                                        if ($letter4['b_id']==$data2['id']) {
                                                ?>
                                                        <option selected value="<?php echo $data2['id']?>"><?php echo $data2['title']?></option>
                                                <?php
                                                        }else{
                                                ?>
                                                        <option value="<?php echo $data2['id']?>"><?php echo $data2['title']?></option>
                                                <?php

                                                        }       
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-9">
                                            <h4>Add Item</h4>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button type="button" class="btn btn-danger" id="click"name="inquiries" style="float:right;">
                                                <li class="fa fa-plus"></li>
                                            </button>
                                        </div>
                                        <div class="form-group col-md-12" id="body">
                                            <?php 
                                                $count=0;
                                                while ($items=mysqli_fetch_array($letter4_items)) {
                                                    $reasons=mysqli_query($conn,"SELECT * FROM reason_of_letter");
                                            ?>
                                                <div class="row mt-2" id="<?php echo $count; ?>">
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control" name="item[]" value="<?php echo $items['item'] ?>" placeholder="Enter Item #" style="width:100%"  required>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <select class="form-control select2"  name="reason[]">
                                                            <option class="" value="">Select Reason</option>
                                                            <?php
                                                                while ($data3=mysqli_fetch_array($reasons)) {
                                                                    if ($items['reason_id']==$data3['id']) {
                                                            ?>
                                                                    <option selected value="<?php echo $data3['id']?>"><?php echo $data3['reason']?></option>
                                                            <?php
                                                                    }else{
                                                            ?>
                                                                    <option value="<?php echo $data3['id']?>"><?php echo $data3['reason']?></option>
                                                            <?php

                                                                    }       
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <button type="button" class="btn btn-danger" onclick="deleterow(<?php echo $count;?>)"  ><li class="fa fa-times"></li></button>
                                                    </div>
                                                </div>
                                            <?php
                                                $count++;
                                                }

                                             ?>
                                            
                                        </div>
                                        <div class="form-group col-md-12 mt-4" >
                                            <label>Additional Notes</label>
                                            <textarea id="editor" name="additional" rows="5"><?php echo $letter4['note']; ?></textarea>
                                        </div>
                                        <hr>
                                    </div>
                                    <center><button type="submit" name="submit" class="btn btn-danger mt-3">Update Letter</button></center>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include_once '../includes/footer.php'; ?>
            </div>
            <!--  END CONTENT PART  -->
        </div>
        <!-- END MAIN CONTAINER -->
        <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
        <script src="../assets/js/libs/jquery-3.1.1.min.js"></script>
        <script src="../bootstrap/js/popper.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="../assets/js/app.js"></script>
        <script>
            $(document).ready(function() {
                App.init();
            });
        </script>
        <script src="../assets/js/custom.js"></script>
        <!-- END GLOBAL MANDATORY SCRIPTS -->
        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script >
            $(document).ready(function() {
                $('.select2').select2();
            });
            
            setTimeout(()=> {
                $('#alert').hide('slow')
            }, 5000)
            
        </script>
        <script src="../plugins/highlight/highlight.pack.js"></script>
        <script src="../assets/js/custom.js"></script>
        <script src="../assets/js/scrollspyNav.js"></script>
        <script>
            $(function(){
              $('#select2').select2();
              var html = '';
              var counter=0;
              $('#click').click(function(){
                     counter++ ;
                   
                    html = '<div class="row mt-2" id="'+counter+'">'+
                              '<div class="col-sm-2">'+
                                  '<input type="text" class="form-control" name="item[]" placeholder="Enter Item #" style="width:100%"  required>'+
                              '</div>'+
                              '<div class="col-sm-9">'+
                                '<select class="form-control select2" id="select2" required name="reason[]">'+
                                      '<option class="" value="">Select Service Type</option>'+
                                      
                                      '<?php while ($data2=mysqli_fetch_array($reason)) {?>'+
                                          '<option value="<?php echo $data2['id']?>"><?php echo $data2['reason']?></option>'+
                                      '<?php }?>'+
                                  '</select>'+
                              '</div>'+
                               '<div class="col-sm-1">'+
                                '<button type="button" class="btn btn-danger" onclick="deleterow('+counter+')"  ><li class="fa fa-times"></li></button>'+
                              '</div>'+
                           '</div> ';
                    $('#body').append(html)
                    $('.select2').select2();
              })
            })
            
            function deleterow(id){
            
            $('#'+id).remove()
            
            }
            
            
            
            
            
            
        </script>
        <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
        
        <script>
            ClassicEditor.create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
        <script type="text/javascript">
            function changeletter(id){
                // console.log(id)
                var letter_no=$('#'+id).val();

                var req_id=<?php echo $srid; ?>

                // console.log("Letter No "+letter_no+" request id "+req_id)
                location.href="letter"+letter_no+".php?srid="+req_id
            }
        </script>
    </body>
</html>