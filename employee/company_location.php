<?php
include_once("db/session.php"); 

if(!isset($_SESSION['login_user'])|| $_SESSION['login_user']==''){         
        echo "<script>window.location.href='index.php';</script>";
    }
$user_id=$_SESSION['login_user'];
$groups=mysqli_query($conn,"SELECT grouping.*,pin_color.color_code FROM grouping LEFT JOIN pin_color ON pin_color.id=grouping.pin_color_id WHERE category_id='1'");

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
    <link href="assets/css/elements/color_library.css" rel="stylesheet" type="text/css" />
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
                <div class="col-lg-12 col-12 row"  > 
                    <div class="col-lg-2 col-2 " > 
                        <a type="button" class="btn btn-danger mb-2 mr-2" data-toggle="modal" data-target=".bd-example-modal-lg">Filter<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sliders" style="margin-left: 10px" ><line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line><line x1="1" y1="14" x2="7" y2="14"></line><line x1="9" y1="8" x2="15" y2="8"></line><line x1="17" y1="16" x2="23" y2="16"></line></svg></a>
                    </div>
                </div>
                

                    <div class="col-lg-12 col-12 layout-spacing"  >
                            <div class="statbox widget box box-shadow ">
                                <div class="widget-header">
                                    <div class="row mb-2">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h3>Groups</h3>
                                        </div>                                                                        
                                    </div>
                                </div>
                            <div class=" row">
                                <?php 
                                    while ($data2=mysqli_fetch_array($groups)) {
                                ?>
                                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col " >
                                        <div class="color-box" style="height: 40px; background-color:#F1F2F3;" >
                                            <span class="cl-example" style="background-color:<?php echo $data2['color_code']?>; height: 40px;width: 20px"></span> 
                                            <div class="cl-info" style="margin-top: 7px">
                                                <h6 ><?php echo $data2['name']?></h6>
                                            </div>
                                        </div>
                                    </div>
                                <?php        
                                    }
                                ?>
                                      
                            </div>
                        </div>
                    </div>        
                

                <div class="col-lg-12 col-12 "  >   
                    <div id="googleMap" style="width:100%;height:500px;"></div>
                </div>
                
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">Filter</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="widget-content widget-content-area">
                                    <form method="POST" action="">
                                       
                                        <div class="form-row mb-4">
                                            
                                              <div class="form-group col-md-3">
                                                <h6>City:</h6>
                                                <input type="text" class="form-control"  id="city" name="city"placeholder="City" >
                                            </div>
                                           
                                              <div class="form-group col-md-3">
                                                <h6>State:</h6>
                                                <input type="text" class="form-control" id="state" placeholder="State" >
                                            </div>

                                            
                                              <div class="form-group col-md-3">
                                                <h6>Zip:</h6>
                                                <input type="text" class="form-control" id="zip" placeholder="Zip" >
                                            </div>

                                            
                                              <div class="form-group col-md-3">
                                                <h6>Country:</h6>
                                                <input type="text" class="form-control" id="country" placeholder="Country" >
                                            </div>  
                                            <div class="form-group col-md-4">
                                               <h6>Annual Revenue:</h6>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="number" class="form-control" id="minrev" name="minrev" placeholder="Min" >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="number" class="form-control" id="maxrev" name="maxrev" placeholder="Max" >
                                            </div>

                                            <div class="form-group col-md-4">
                                               <h6>Credit Score:</h6>
                                            </div>
                                              <div class="form-group col-md-4">
                                                <input type="number" class="form-control" id="mincre" name="mincre" placeholder="Min" >
                                            </div>

                                            <div class="form-group col-md-4">
                                                <input type="number" class="form-control" id="maxcre" name="maxcre" placeholder="Max" >
                                            </div>
                                            
                                            <hr>

                                            <div class="form-group col-md-12">
                                                
                                                    <h4>Groups</h4>
                                            </div>
                                            <div class="form-group col-md-12 n-chk">
                                                <?php 
                                                    $groupss=mysqli_query($conn,"SELECT grouping.*,pin_color.color_code FROM grouping LEFT JOIN pin_color ON pin_color.id=grouping.pin_color_id  WHERE category_id='1'");
                                                    while ($result_group=mysqli_fetch_array($groupss)) {
                                                ?>
                                                    <!-- <div class="n-chk "> -->
                                                            <label class="new-control new-radio radio-classic-primary">
                                                              <input type="checkbox" class="new-control-input" name="checkbox[]" value="<?php echo $result_group['id']?>">
                                                              <span class="new-control-indicator"></span><?php echo $result_group['name']?>
                                                            </label>
                                                
                                                        <!-- </div> -->
                                                <?php        
                                                    }
                                                ?>
                                            </div>

                                        </div>
                                   
                                        
                                    </form>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="filter" onclick="abc()">Apply</button>
                            </div>
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
   
    <script src="plugins/font-icons/feather/feather.min.js"></script>
    <script >
       feather.replace();
       
       
    </script>
    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/scrollspyNav.js"></script>
     <script>
        var filter=0;
       
        
        function abc(){
            $('.bd-example-modal-lg').modal("hide")
                filter=1;
                myMap();
        }

        function myMap() {
            

        var mapProp= {
            center:new google.maps.LatLng(27.555197450576824,-81.29883621447111),
            zoom:2,
        };
        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
        var marker=new Array();

        if (filter==0) {
            
             var val = 1
            $.post('company_loc_api.php', {id: val}).then((result)=> {
            
            
            result.loc.map((item, index)=> {

                if (item.pin_color_id==2) {
                    var color="http://maps.google.com/mapfiles/ms/icons/red-dot.png";

                } else if(item.pin_color_id==4) {
                    
                    var color="http://maps.google.com/mapfiles/ms/icons/green-dot.png";
                } else if(item.pin_color_id==5) {
                    
                    var color="http://maps.google.com/mapfiles/ms/icons/purple-dot.png";
                }else if(item.pin_color_id==6) {
                    
                    var color="http://maps.google.com/mapfiles/ms/icons/yellow-dot.png";
                }else if(item.pin_color_id==7) {
                    var color="http://maps.google.com/mapfiles/ms/icons/blue-dot.png";
                }
                var lt=parseFloat(item.latitude)
                var lo=parseFloat(item.longitude)
                 if (marker && marker.setMap) {
                    marker.setMap(null);
                  }
                marker[index] = new google.maps.Marker({
                    position: {
                        lat: lt,
                        lng: lo
                    },
                    map: map,
                    icon: {
                        url: color
                    },
                    title: item.name
                });
                var infowindow = new google.maps.InfoWindow({
                  content:' <div>'+
                            '  <a type="button" class="btn btn-light" style="width:100px;margin-bottom:5px;"  target="blank" href="company_details.php?id='+item.id+'" >View</a>'+
                           ' </div>'+
                           ' <div>'+
                            '  <a  target="blank" href="https://www.google.com/maps/dir/Current+Location/'+lt+','+lo+'" type="button" class="btn btn-primary" style="width:100px;margin-top:5px;">Route</a>'+
                           ' </div>'

                });

                google.maps.event.addListener(marker[index], 'click', function() {
                  infowindow.open(map,marker[index]);
                });



          })
          
        })
        } else if(filter==1) {
            
            var city=document.getElementById('city').value;
            var state=document.getElementById('state').value;
            var zip=document.getElementById('zip').value;
            var country=document.getElementById('country').value;
            var minrev=document.getElementById('minrev').value;
            var maxrev=document.getElementById('maxrev').value;
            var mincre=document.getElementById('mincre').value;
            var maxcre=document.getElementById('maxcre').value;
            var x = document.getElementsByName('checkbox[]');
            var gstring="";

            var count=0;
            for (var i = 0; i < x.length; i++) {
                if (x[i].checked) {
                    if (count==0) {
                        gstring += '(company.group_id ='+x[i].value;
                        count++;    
                    } else {
                        gstring += ' OR company.group_id ='+x[i].value;
                    }
                    
                }       
            }
            if (gstring!="") {
                gstring+=")";
            }
            
            
            $.post('filter_company_api.php', {city: city,state: state,zip: zip,country: country,minrev: minrev,maxrev: maxrev,mincre: mincre,maxcre: maxcre,group:gstring}).then((result)=> {
               
           result.company.map((item, index)=> {

                if (item.pin_color_id==2) {
                    var color="http://maps.google.com/mapfiles/ms/icons/red-dot.png";

                } else if(item.pin_color_id==4) {
                    
                    var color="http://maps.google.com/mapfiles/ms/icons/green-dot.png";
                } else if(item.pin_color_id==5) {
                    
                    var color="http://maps.google.com/mapfiles/ms/icons/purple-dot.png";
                }else if(item.pin_color_id==6) {
                    
                    var color="http://maps.google.com/mapfiles/ms/icons/yellow-dot.png";
                }else if(item.pin_color_id==7) {
                    var color="http://maps.google.com/mapfiles/ms/icons/blue-dot.png";
                }
                var lt=parseFloat(item.latitude)
                
                var lo=parseFloat(item.longitude)
                console.log(item.latitude+","+item.longitude)
                 if (marker && marker.setMap) {
                    marker.setMap(null);
                  }
                marker[index] = new google.maps.Marker({
                    position: {
                        lat: lt,
                        lng: lo
                    },
                    map: map,
                    icon: {
                        url: color
                    },
                    title: item.name
                });
                var infowindow = new google.maps.InfoWindow({
                  content:' <div>'+
                            '  <a type="button" class="btn btn-light" style="width:100px;margin-bottom:5px;"  target="blank" href="company_details.php?id='+item.id+'">View</a>'+
                           ' </div>'+
                           ' <div>'+
                            '  <a  target="blank" href="https://www.google.com/maps/dir/Current+Location/'+lt+','+lo+'" type="button" class="btn btn-primary" style="width:100px;margin-top:5px;">Route</a>'+
                           ' </div>'
                });

                google.maps.event.addListener(marker[index], 'click', function() {
                  infowindow.open(map,marker[index]);
                });
          })
            })
        }
       
                        
        // $.post('company_loc_api.php', {id: val}).then((result)=> {
        //     var marker=new Array();
        //     console.log(result);
        //    result.loc.map((item, index)=> {

        //         if (item.color==2) {
        //             var color="http://maps.google.com/mapfiles/ms/icons/red-dot.png";

        //         } else if(item.color==4) {
                    
        //             var color="http://maps.google.com/mapfiles/ms/icons/green-dot.png";
        //         } else if(item.color==5) {
                    
        //             var color="http://maps.google.com/mapfiles/ms/icons/purple-dot.png";
        //         }else if(item.color==6) {
                    
        //             var color="http://maps.google.com/mapfiles/ms/icons/yellow-dot.png";
        //         }else if(item.color==7) {
        //             var color="http://maps.google.com/mapfiles/ms/icons/blue-dot.png";
        //         }
        //         var lt=parseFloat(item.latitude)
        //         var lo=parseFloat(item.longitude)
        //         marker[index] = new google.maps.Marker({
        //             position: {
        //                 lat: lt,
        //                 lng: lo
        //             },
        //             map: map,
        //             icon: {
        //                 url: color
        //             },
        //             title: item.name
        //         });
        //         var infowindow = new google.maps.InfoWindow({
        //           content:' <div>'+
        //                     '  <a type="button" class="btn btn-light" style="width:100px;margin-bottom:5px;" >View</a>'+
        //                    ' </div>'+
        //                    ' <div>'+
        //                     '  <a  target="blank" href="https://www.google.com/maps/dir/Current+Location/'+lt+','+lo+'" type="button" class="btn btn-primary" style="width:100px;margin-top:5px;">Route</a>'+
        //                    ' </div>'
        //         });

        //         google.maps.event.addListener(marker[index], 'click', function() {
        //           infowindow.open(map,marker[index]);
        //         });
        //   })
          
        // })
        }
        

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzLNZx3N6WSK_-i0I2hr8VUEQWrVBFn2s&callback=myMap"></script>
    <!-- <script>
          function filters(){

            
            pin_color_id
        
          }
          
        </script> -->
</body>
</html>