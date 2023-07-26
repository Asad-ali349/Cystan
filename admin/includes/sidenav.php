<?php 
$user_id=$_SESSION['login_user'];
$nonapproveds = "SELECT COUNT(*) as count FROM `service_requests` where status=0 AND is_deleted='0' ";
$result_nonapproveds=mysqli_query($conn,$nonapproveds);

$payments = "SELECT COUNT(*) as count FROM `service_requests` where status=1 AND is_deleted='0' ";
$result_payments=mysqli_query($conn,$payments);

$progresss = "SELECT COUNT(*) as count FROM `service_requests` where status=2 AND is_deleted='0'";
$result_progresss=mysqli_query($conn,$progresss);

$completes = "SELECT COUNT(*) as count FROM `service_requests` where status=3 AND is_deleted='0' ";
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
                            <li>
                                <a href="search_company.php"> Search Company</a>
                            </li>
                            <li>
                                <a href="import_company.php"> Import Company</a>
                            </li>
                            <li>
                                <a href="companyfileformat.xlsx"> File Format</a>
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
                                <a href="add_people.php"> Add Individual </a>
                            </li>
                            <li>
                                <a href="view_people.php"> View Individual </a>
                            </li>
                            <li>
                                <a href="search_individual.php"> Search Individual</a>
                            </li>
                            <li>
                                <a href="assign_people.php"> Assign Individual</a>
                            </li>
                            <li>
                                <a href="import_people.php"> Import Individual</a>
                            </li>
                            <li>
                                <a href="peoplefileformat.xlsx"> File Format</a>
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
                                <a href="add_services.php"> Add Services</a>
                            </li>
                            <li>
                                <a href="view_services.php"> View Services</a>
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
                                <a href="view_services_req.php"> Non Approved &nbsp;<span class="badge badge-dark "><?php echo $ap_req ?></span> </a>
                            </li>
                            <li>
                                <a href="due_payment_services_req.php"> Due Payments &nbsp;<span class="badge badge-dark "><?php echo $dp_req ?></span></a>
                            </li>
                             <li>
                                <a href="inprogress_services_req.php">InProgress  &nbsp;<span class="badge badge-dark "><?php echo $ir_req ?></span></a>
                            </li>
                             <li>
                                <a href="completed_service_req.php">Completed  &nbsp;<span class="badge badge-dark "><?php echo $c_req ?></span></a>
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
                                <a href="add_bureau.php"> Add Bureau</a>
                            </li>
                            <li>
                                <a href="view_bureau.php"> View Bureau</a>
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
                                <a href="add_inq_vendor.php"> Add Creditor</a>
                            </li>
                            <li>
                                <a href="add_business_type.php"> Add Business Type</a>
                            </li>
                            <li>
                                <a href="view_inq_vendor.php"> View Creditors</a>
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
                                <a href="add_company_group.php">Company Groups</a>
                            </li>
                            <li>
                                <a href="add_people_group.php"> Individual Groups</a>
                            </li>
                            <li>
                                <a href="document_type.php"> Doc Types</a>
                            </li>
                            <li>
                                <a href="add_service_group.php"> Services Type</a>
                            </li>
                        </ul>
                    </li>
                    
                    
                    <li class="menu">
                        <a href="letter_reasons.php" class="dropdown-toggle" id="single">
                            <div class="">
                               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                <span>Letter Reason</span>
                            </div>
                            
                        </a>
                    </li>
                    <li class="menu">
                        <a href="request_to_change_supervisor.php" class="dropdown-toggle" id="single">
                            <div class="">
                              <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                <span>Request to change<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;supervisor</span>
                            </div>
                            
                        </a>
                    </li>
                    <li class="menu">
                        <a href="#Supervisor" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="two">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <span>Supervisor</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="Supervisor" data-parent="#accordionExample">
                            <li>
                                <a href="add_supervisor.php"> Add Supervisor</a>
                            </li>
                            <li>
                                <a href="view_supervisor.php"> View Supervisors</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="menu">
                        <a href="#Employee" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="two">
                            <div class="">
                               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <span>Employee</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="Employee" data-parent="#accordionExample">
                            <li>
                                <a href="add_employee.php"> Add Employee</a>
                            </li>
                            <li>
                                <a href="view_employee.php"> View Employees</a>
                            </li>
                            <li>
                                <a href="assign_employee.php">Assign Employee</a>
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
                                <a href="company_location.php">Companies</a>
                            </li>
                            <li>
                                <a href="people_location.php">Individual</a>
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
