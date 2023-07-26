<?php 
$user_id=$_SESSION['login_user'];
$nonapproveds = "SELECT COUNT(*) as count FROM service_requests JOIN individual ON individual.id=service_requests.individual_id INNER JOIN services ON service_requests.service_id=services.id INNER JOIN grouping ON services.service_type=grouping.id Where service_requests.status='0' AND individual.manage_role='2' AND individual.manage_by='$user_id' AND service_requests.is_deleted='0' ORDER BY service_requests.id DESC ";
$result_nonapproveds=mysqli_query($conn,$nonapproveds);

$payments = "SELECT COUNT(*) as count FROM service_requests JOIN individual ON individual.id=service_requests.individual_id INNER JOIN services ON service_requests.service_id=services.id INNER JOIN grouping ON services.service_type=grouping.id Where service_requests.status='1' AND individual.manage_role='2' AND individual.manage_by='$user_id' AND service_requests.is_deleted='0' ORDER BY service_requests.id DESC ";
$result_payments=mysqli_query($conn,$payments);

$progresss = "SELECT COUNT(*) as count FROM service_requests JOIN individual ON individual.id=service_requests.individual_id INNER JOIN services ON service_requests.service_id=services.id INNER JOIN grouping ON services.service_type=grouping.id Where service_requests.status='2' AND individual.manage_role='2' AND individual.manage_by='$user_id' AND service_requests.is_deleted='0' ORDER BY service_requests.id DESC";
$result_progresss=mysqli_query($conn,$progresss);

$completes = "SELECT COUNT(*) as count FROM service_requests JOIN individual ON individual.id=service_requests.individual_id INNER JOIN services ON service_requests.service_id=services.id INNER JOIN grouping ON services.service_type=grouping.id Where service_requests.status='3' AND individual.manage_role='2' AND individual.manage_by='$user_id' AND service_requests.is_deleted='0' ORDER BY service_requests.id DESC ";
$result_completes=mysqli_query($conn,$completes);

    
if (mysqli_num_rows($result_nonapproveds)>0 && mysqli_num_rows($result_payments)>0 && mysqli_num_rows($result_progresss)>0) {
    
    $datas=$result_nonapproveds->fetch_array();
    $ap_req=(int)$datas['count'];
    

    $datas=$result_payments->fetch_array();
    $dp_req=(int)$datas['count'];

    $datas=$result_progresss->fetch_array();
    $ir_req=(int)$datas['count'];

    $datas=$result_completes->fetch_array();
    $c_req=(int)$datas['count'];

    $t_req=$ap_req+$dp_req+$ir_req+$c_req;

    
}
    
                



?> 
        <div class="overlay"></div>
        <div class="search-overlay"></div>
        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme" >
            
            <nav id="sidebar">
                <div class="shadow-bottom"></div>

                <ul class="list-unstyled menu-categories" id="accordionExample">
                    <li class="menu mt-2">
                        <a href="../../dashboard.php" class="dropdown-toggle" id="single">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span>Dashboard</span>
                            </div>
                            
                        </a>
                        
                    </li>

                    <li class="menu">
                        <a href="#company" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="two">
                            <div class="">
                                <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="building" class="svg-inline--fa fa-building fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M128 148v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12zm140 12h40c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12zm-128 96h40c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12zm128 0h40c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12zm-76 84v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm76 12h40c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12zm180 124v36H0v-36c0-6.6 5.4-12 12-12h19.5V24c0-13.3 10.7-24 24-24h337c13.3 0 24 10.7 24 24v440H436c6.6 0 12 5.4 12 12zM79.5 463H192v-67c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v67h112.5V49L80 48l-.5 415z"></path></svg>
                                <span>Company</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="company" data-parent="#accordionExample">
                            <li>
                                <a href="../add_company.php"> Add Company</a>
                            </li>
                            <li>
                                <a href="../view_company.php"> View Company </a>
                            </li>
                            <li>
                                <a href="../search_company.php"> Search Company</a>
                            </li>
                        </ul>
                    </li>


                    <li class="menu">
                        <a href="#elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="two">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                <span>Individual</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="elements" data-parent="#accordionExample">
                            <li>
                                <a href="../add_people.php"> Add Individual </a>
                            </li>
                            <li>
                                <a href="../view_people.php"> View Individual </a>
                            </li>
                            <li>
                                <a href="../search_individual.php"> Search Individual </a>
                            </li>
                        </ul>
                    </li>
                     <li class="menu">
                        <a href="#Services" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="two">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                                <span>Services</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="Services" data-parent="#accordionExample">
                            <li>
                                <a href="../add_services.php"> Add Services</a>
                            </li>
                            <li>
                                <a href="../view_services.php"> View Services</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#ServicesRequests" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="two">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                                <span>Requests &nbsp;<span class="badge badge-dark "><?php echo $t_req ?></span></span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="ServicesRequests" data-parent="#accordionExample">
                            <li>
                                <a href="../view_services_req.php"> Non Approved &nbsp;<span class="badge badge-dark "><?php echo $ap_req ?></span> </a>
                            </li>
                            <li>
                                <a href="../due_payment_services_req.php"> Due Payments &nbsp;<span class="badge badge-dark "><?php echo $dp_req ?></span></a>
                            </li>
                             <li>
                                <a href="../inprogress_services_req.php">InProgress  &nbsp;<span class="badge badge-dark "><?php echo $ir_req ?></span></a>
                            </li>
                             <li>
                                <a href="../completed_service_req.php">Completed  &nbsp;<span class="badge badge-dark "><?php echo $c_req ?></span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#bureau" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="two">
                            <div class="">
                                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M11.5,1L2,6V8H21V6M16,10V17H19V10M2,22H21V19H2M10,10V17H13V10M4,10V17H7V10H4Z" />
                                </svg>
                                <span>Bureau</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="bureau" data-parent="#accordionExample">
                            <li>
                                <a href="../add_bureau.php"> Add Bureau</a>
                            </li>
                            <li>
                                <a href="../view_bureau.php"> View Bureau</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#Vendors" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="two">
                            <div class="">
                                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12 3C14.21 3 16 4.79 16 7S14.21 11 12 11 8 9.21 8 7 9.79 3 12 3M16 13.54C16 14.6 15.72 17.07 13.81 19.83L13 15L13.94 13.12C13.32 13.05 12.67 13 12 13S10.68 13.05 10.06 13.12L11 15L10.19 19.83C8.28 17.07 8 14.6 8 13.54C5.61 14.24 4 15.5 4 17V21H20V17C20 15.5 18.4 14.24 16 13.54Z" />
                                </svg>
                                <span>Creditors</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="Vendors" data-parent="#accordionExample">
                            <li>
                                <a href="../add_inq_vendor.php"> Add Creditor</a>
                            </li>
                            <li>
                                <a href="../view_inq_vendor.php"> View Creditors</a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu">
                        <a href="#Category" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="two">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
                                <span>Category</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="Category" data-parent="#accordionExample">
                            <li>
                                <a href="../add_company_group.php">Company Groups</a>
                            </li>
                            <li>
                                <a href="../add_people_group.php"> Individual Groups</a>
                            </li>
                            <li>
                                <a href="../document_type.php"> Doc Types</a>
                            </li>
                            <li>
                                <a href="../add_service_group.php"> Services Type</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#Map" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="two">
                            <div class="">
                               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                <span>Map</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="Map" data-parent="#accordionExample">
                            <li>
                                <a href="../company_location.php">Companies</a>
                            </li>
                            <li>
                                <a href="../people_location.php">Individual</a>
                            </li>
                        </ul>
                    </li>
                                         
                </ul>
                
            </nav>

        </div>
        <!--  END SIDEBAR  -->

        <script type="text/javascript">
            const currentLocation=location.href;
            const menuItem= document.querySelectorAll('a');
            const menuLength= menuItem.length;
            

            for (let i=0; i<menuLength; i++) {

                if (menuItem[i].href==currentLocation) {
                    
                    var submenu=menuItem[i].parentElement;
                    const mainMenu=submenu.parentElement;
                    const mainLi=mainMenu.parentElement;

                    if (menuItem[i].getAttribute('id')=="single") {
                        menuItem[i].setAttribute("aria-expanded","true");
                        menuItem[i].setAttribute("data-active","true");
                        break;
                    }
                    else if (menuItem[i].getAttribute('id')=="menue") {
                        
                    }

                    else  {
                        menuItem[i].parentElement.className="active";
                        submenu.parentElement.className="collapse submenu list-unstyled show";
                        mainLi.firstElementChild.setAttribute("aria-expanded","true");
                        mainLi.firstElementChild.setAttribute("data-active","true");

                    }

                 }

            }
             
        </script>
