<?php 
 include("../db/letter_session.php");
$user_id=$_SESSION['login_user'];
$lid=$_GET['id'];
$letter=mysqli_fetch_array(mysqli_query($conn,"SELECT letter_12.*,bureau.*,individual.name,individual.email,individual.street,individual.state,individual.city,individual.zip,individual.ssn,individual.signature,individual.phone FROM `letter_12` INNER JOIN bureau ON letter_12.b_id=bureau.id INNER JOIN service_requests ON service_requests.id=letter_12.req_id INNER JOIN individual on individual.id=service_requests.individual_id where letter_12.id='$lid'"));


 ?>

<!DOCTYPE html>
<html lang="en">

    <?php include_once("includes/head_for_letter.php") ?>

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="../assets/css/apps/invoice-preview.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->

    <link rel="stylesheet" href="../plugins/font-icons/fontawesome/css/regular.css">
    <link rel="stylesheet" href="../plugins/font-icons/fontawesome/css/fontawesome.css">
    <link href="../assets/css/components/cards/card.css" rel="stylesheet" type="text/css" />

<body>

    <!--  BEGIN NAVBAR  -->
    <?php include_once("includes/topbar.php") ?> 
   
   
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <?php include_once("includes/sidenav.php") ?>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing mt-4 mb-3">
                <div class="row invoice  layout-spacing">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        
                        <div class="doc-container">

                            <div class="row">

                                <div class="col-xl-9">

                                    <div class="invoice-container">
                                        <div class="invoice-inbox">
                                            
                                            <div id="ct" class="">
                                                
                                                <div class="invoice-00001">
                                                    <div class="content-section">
    
                                                        
    
                                                        <div class="inv--detail-section inv--customer-detail-section mt-4">

                                                            <div class="row">
    
                                                                

                                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 align-self-center">
                                                                    <p class="inv-to" style="float:right;"><?php $d=strtotime($letter['datee']);
                                                                    $day=date("D,M d,Y",$d); echo $day; ?></p>
                                                                </div>
                                                                
                                                                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4">
                                                                    <p class="inv-to"><?php echo $letter['title']; ?></p>
                                                                    <p class="inv-street-addr"><?php echo $letter['po_box']; ?></p>
                                                                    <p class="inv-email-address"><?php echo $letter['address']; ?></p>
                                                                    <p class="inv-email-address"><?php echo $letter['website']; ?></p>
                                                                    <p class="inv-email-address"><?php echo $letter['phone']; ?></p>
                                                                </div>
                                                                

                                                                 
                                                                

                                                            </div>
                                                           
                                                            <div class="inv--product-table-section">
                                                                <div class="row">
                                                                    <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4 mt-5">
                                                                        <p class="inv-to">RE:  BANKRUPTCY ACCOUNTS NOT IDENTIFIED</p>
                                                                        <p><?php echo "To Whom It May Concern:" ?></p>
                                                                    </div>
                                                                </div>
                                                                <p>
                                                                    I received a copy of my credit report and the items listed below were included in my bankruptcy but are not identified as such on my credit report. Please see the attached copy of the credit report with these item numbers written next to the problem entries as well as a copy of my court documents which lists the creditors included in my bankruptcy. <br><br>

                                                                    According to the provisions of the Fair Credit Reporting Act § 611(a) [15 USC 1681i(a)], these disputed items must updated to reflect discharge in bankruptcy.<br><br>

                                                                    I am requesting an updated copy of my credit report, which should be sent to the address listed below. According to the provisions of  § 612 [15 USC § 1681j], there should be no charge for this report.<br>
                                                                    <?php echo htmlspecialchars_decode($letter['note']) ?></p><p>
                                                                    If you have any questions or need additional information, please contact me at the address listed below.<br><br>

                                                                    Thank you.<br><br>
                                                                    Sincerely,
                                                                </p>
                                                                        
                                                                        
                                                                        
                                                            </div>
                                                            <div class="col-md-12">
                                                                <img   src="<?php echo $letter['signature']; ?>" alt="Your signature will go here!" style="width: 200px;height: 100px;"/>
                                                            </div>
                                                        </div>

                                                        <div class="inv--detail-section inv--customer-detail-section ">

                                                            <div class="row">
    
                                                                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4">
                                                                    
                                                                    <p class="inv-to"><?php echo $letter['name']; ?></p>
                                                                    <p class="inv-street-addr"><?php echo $letter['street']; ?></p>
                                                                    <p class="inv-email-address"><?php echo $letter['city'].",".$letter['state'].",".$letter['zip']; ?></p>
                                                                    <p class="inv-email-address"><?php echo $letter['ssn']; ?></p>
                                                                </div>
                                                                
                                                                

                                                            </div>
                                                            
                                                        </div>
                                                        

                                                        
    
                                                    </div>
                                                </div> 
                                                
                                            </div>
    
    
                                        </div>
    
                                    </div>

                                </div>

                                <div class="col-xl-3">

                                    <div class="invoice-actions-btn">

                                        <div class="invoice-action-btn">

                                            <div class="row">
                                               
                                                <div class="col-xl-12 col-md-3 col-sm-6">
                                                    <a href="javascript:void(0);" class="btn btn-danger btn-print  action-print">Print</a>
                                                </div>
                                                <div class="col-xl-12 col-md-3 col-sm-6">
                                                    <a href="edit_letter12.php?lid=<?php echo $lid ?>" class="btn btn-primary btn-download">Edit</a>
                                                </div>
                                            </div>

                                             

                                        </div>
                                        
                                    </div>
                                    
                                </div>



                            </div>
                            
                            
                        </div>

                    </div>
                </div>
            </div>
            <?php include_once("../includes/footer.php") ?>
        </div>
        <!--  END CONTENT AREA  -->

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
    <script src="../assets/js/apps/invoice-preview.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   
</body>
</html>