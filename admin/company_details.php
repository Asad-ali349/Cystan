<?php
include_once("db/session.php"); 


$user_id=$_SESSION['login_user'];
$groups=mysqli_query($conn,"SELECT grouping.*,pin_color.color_code FROM grouping LEFT JOIN pin_color ON pin_color.id=grouping.pin_color_id WHERE category_id='1'");
$id=$_GET["id"];
$companies=mysqli_query($conn,"SELECT company.id,company.name,company.website,company.pin_color_id,company.total_employees,company.parent_company_id,company.group_id,company.contact,company.email,company.street,company.city,company.state,company.zip,company.country,company.review_avg,company.review_count,company.credit_score,company.anual_revenue,company.naics_id,company.latitude,company.longitude,grouping.name AS group_name,pin_color.name AS color_name,pin_color.color_code AS color_code,naics.sic_code,naics.naics_code,naics.description,naics.ins FROM company LEFT JOIN pin_color ON pin_color.id=company.pin_color_id LEFT JOIN grouping ON grouping.id=company.group_id LEFT JOIN naics ON naics.id= company.naics_id WHERE company.id='$id'" );
$data=mysqli_fetch_array($companies);
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

    <link href="assets/css/components/cards/card.css" rel="stylesheet" type="text/css" />

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
        	 	<div class="row">
	        	 	<div class="col-lg-1 col-1 "  > 
	        	 	</div>
	        	 	<div class="col-lg-8 col-8 "  > 	
			            <div class="card component-card_1 " >
			            <div class="card-body">
			                <h4 class="card-user_name"><?php echo $data['name']; ?></h4>
		                    <div style="text-align: left;">
		                        <div>
		                            <i data-feather="mail" style="height: 15px;width: 15px;margin-right: 5px"aria-hidden="true"></i>
		                            <span class="card-user_name"><?php echo $data['email']; ?></span>        
		                        </div>
		                        <div>
		                            <i data-feather="phone" style="height: 15px;width: 15px;margin-right: 5px"aria-hidden="true"></i>
		                            <span><?php echo $data['contact']; ?></span>        
		                        </div>
		                         <div>
		                            <i data-feather="globe" style="height: 15px;width: 15px;margin-right: 5px"aria-hidden="true"></i>
		                            <span><?php echo $data['website']; ?></span>        
		                        </div>
		                        <div>
		                            <i data-feather="map-pin" style="height: 15px;width: 15px;margin-right: 5px"aria-hidden="true"></i>
		                            <span><?php echo $data['street'].", ".$data['city'].", ".$data['state'].", ".$data['country']; ?></span>     
		                        </div>
		                        <br>
		                        <div>
		                            <span >#employees:</span>
		                            <span> <?php echo $data['total_employees']; ?></span>        
		                        </div>
		                        <div>
		                            <span >Parent Company:</span>
		                            <span>
		                                <?php 
		                                $pid= $data['parent_company_id'];
		                                if ($pid!=0) {
		                                    $pcom=mysqli_query($conn,"SELECT name FROM company WHERE id='$pid'");
		                                    $result=mysqli_fetch_array($pcom);
		                                    echo $result['name'];
		                                }else{
		                                     echo "none";
		                                }
		                                

		                                ?>
		                            </span>        
		                        </div>
		                        <div>
		                            <span >Group:</span>
		                            <span> <?php echo $data['group_name']?></span>        
		                        </div>
		                       
		                        <div>
		                            <span >Review Average:</span>
		                            <span> <?php echo $data['review_avg']?></span>        
		                        </div>
		                        <div>
		                            <span >Review Count:</span>
		                            <span> <?php echo $data['review_count']?></span>        
		                        </div>
		                        <div>
		                            <span >Annual Revenue:</span>
		                            <span> <?php echo $data['anual_revenue']?></span>        
		                        </div>
		                        <div>
		                            <span >Credit Score:</span>
		                            <span> <?php echo $data['credit_score']?></span>        
		                        </div>
		                        <br>
		                        <div>
		                        
		                            <span >NAICS:</span>        
		                        </div>
		                        <div>
		                            <span >Naics Code:</span>
		                            <span> <?php echo $data['naics_code']?></span>        
		                        </div>
		                        
		                         <div>
		                            <span >Institute:</span>
		                            <span> <?php echo $data['ins']?></span>        
		                        </div> 
		                        <div>
		                            <span >Sic Code:</span>
		                            <span> <?php echo $data['sic_code']?></span>        
		                        </div>
		                        <div>
		                            <span >Description:</span>
		                            <span> <?php echo $data['description']?></span>        
		                        </div>
		                    </div>
			            </div>
			        </div>
		        </div>
		        <div class="col-lg-3 col-3 "  ></div>
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
     
</body>
</html>