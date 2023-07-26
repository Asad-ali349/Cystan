<?php 
$user_id=$_SESSION['login_user'];
$nonapproveds = "SELECT COUNT(*) as count FROM service_requests JOIN individual ON individual.id=service_requests.individual_id INNER JOIN services ON service_requests.service_id=services.id INNER JOIN grouping ON services.service_type=grouping.id where service_requests.status='0'  AND service_requests.individual_id='$user_id' AND service_requests.is_deleted='0' ORDER BY service_requests.id ";
$result_nonapproveds=mysqli_query($conn,$nonapproveds);

$payments = "SELECT COUNT(*) as count FROM service_requests JOIN individual ON individual.id=service_requests.individual_id INNER JOIN services ON service_requests.service_id=services.id INNER JOIN grouping ON services.service_type=grouping.id where service_requests.status='1'  AND service_requests.individual_id='$user_id' AND service_requests.is_deleted='0' ORDER BY service_requests.id ";
$result_payments=mysqli_query($conn,$payments);

$progresss = "SELECT COUNT(*) as count FROM service_requests JOIN individual ON individual.id=service_requests.individual_id INNER JOIN services ON service_requests.service_id=services.id INNER JOIN grouping ON services.service_type=grouping.id where service_requests.status='2'  AND service_requests.individual_id='$user_id' AND service_requests.is_deleted='0' ORDER BY service_requests.id ";
$result_progresss=mysqli_query($conn,$progresss);

$completes = "SELECT COUNT(*) as count FROM service_requests JOIN individual ON individual.id=service_requests.individual_id INNER JOIN services ON service_requests.service_id=services.id INNER JOIN grouping ON services.service_type=grouping.id where service_requests.status='3' AND service_requests.individual_id='$user_id' AND service_requests.is_deleted='0' ORDER BY service_requests.id ";
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
                        <a href="dashboard.php" class="dropdown-toggle" id="single">
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
                                <a href="add_company.php"> Add Company</a>
                            </li>
                            <li>
                                <a href="view_company.php"> View Company </a>
                            </li>
                        </ul>
                    </li>

                    

                    <li class="menu">
                        <a href="people_detail_page.php" class="dropdown-toggle" id="single">
                            <div class="">
                               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                <span>Profile</span>
                            </div>
                            
                        </a>
                    </li>

                    
                    <li class="menu">
                        <a href="view_services.php" class="dropdown-toggle" id="single">
                            <div class="">
                               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                                <span>Services</span>
                            </div>
                            
                        </a>
                    </li>
                    
                    <li class="menu">
                        <a href="#ServicesRequests" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="two">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>

                                <span> Request</span>

                            </div>
                            <span class="badge badge-dark count"><?php echo $t_req ?></span>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="ServicesRequests" data-parent="#accordionExample">
                            <li>
                                <a href="view_services_req.php"> Non Approved &nbsp;<span class="badge badge-dark "><?php echo $ap_req ?></span> </a>

                            </li>
                            <li>
                                <a href="due_payment_req.php"> Due Pending  &nbsp;<span class="badge badge-dark "><?php echo $dp_req ?></span></a>
                            </li>
                            <li>
                                <a href="inprogress_req.php"> In Progress &nbsp;<span class="badge badge-dark "><?php echo $ir_req ?></span></a>
                            </li>
                            <li>
                                <a href="my_services.php"> Completed  &nbsp;<span class="badge badge-dark "><?php echo $c_req ?></span></a>
                            </li>
                        </ul>

                    </li>
                    
                    <li class="menu">
                        <a href="transactions.php" class="dropdown-toggle" id="single">
                            <div class="">
                               <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                <span>Transactions</span>
                            </div>
                            
                        </a>
                    </li>
                    <li class="menu">
                        <a href="req_to_change_supervisor.php" class="dropdown-toggle" id="single">
                            <div class="">
                               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <span>Change Supervisor</span>
                            </div>
                            
                        </a>
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
