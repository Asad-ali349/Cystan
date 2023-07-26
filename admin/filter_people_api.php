<?php
include_once ("db/session.php");


if(  isset($_POST['city']) && isset($_POST['country']) && isset($_POST['state']) && isset($_POST['zip'])  && isset($_POST['minrev']) && isset($_POST['maxrev']) && isset($_POST['maxcre']) && isset($_POST['mincre']) && isset($_POST['group'] ) ){

    $by_city=$_POST['city'];
    $by_country=$_POST['country'];
    $by_state=$_POST['state'];
    $by_zip=$_POST['zip'];
   
    $by_minrev=$_POST['minrev'];
    $by_maxrev=$_POST['maxrev'];
    $by_mincre=$_POST['mincre'];
    $by_maxcre=$_POST['maxcre'];
    $by_group=$_POST['group'];
    
    $query = "SELECT individual.id,individual.name,individual.group_id,individual.phone,individual.email,individual.street,individual.city,individual.state,individual.zip,individual.country,individual.credit_score,individual.lattitude,individual.longitude,grouping.name AS group_name,grouping.pin_color_id as 'pin_color_id' FROM individual LEFT JOIN grouping ON grouping.id=individual.group_id";
    $conditions = array();

    if(! empty($by_city)) {
      $conditions[] = "company.city LIKE '%$by_city%'";
    }
    if(! empty($by_country)) {
      $conditions[] = "company.country LIKE '%$by_country%' ";
    }
    if(! empty($by_state)) {
      $conditions[] = "company.state LIKE '%$by_state%' ";
    }
    if(! empty($by_zip)) {
      $conditions[] = "company.zip ='$by_zip'";
    }
   
    if(! empty($by_minrev)) {
      $conditions[] = "company.anual_revenue>=$by_minrev";
    }
    if(! empty($by_maxrev)) {
      $conditions[] = "company.anual_revenue<=$by_maxrev";
    }
    if(! empty($by_mincre)) {
      $conditions[] = "company.credit_score>=$by_mincre";
    }
    if(! empty($by_maxcre)) {
      $conditions[] = "company.credit_score <= $by_maxcre";
    }
    
	if(! empty($by_group)) {
       $conditions[] = $by_group;
    } 
    
    

    $sql = $query;
    if (count($conditions) > 0) {
      $sql .= " WHERE " . implode(' AND ', $conditions);

    }
    $sql .=" AND individual.status='1'"; 

   	
    $sql_query=mysqli_query($conn,$sql); 
   
    if (mysqli_num_rows($sql_query)>0) {
    	
			$count=0;
			while ($data=$sql_query->fetch_array()) {
				
				$loc=[];
				$loc['id']=$data['id'];
        $loc['name']=$data['name'];
        $loc['group_id']=$data['group_id'];
        $loc['pin_color_id']=$data['pin_color_id'];
        $loc['contact']=$data['phone'];
        $loc['email']=$data['email'];
        $loc['street']=$data['street'];
        $loc['state']=$data['state'];
        $loc['zip']=$data['zip'];
        $loc['country']=$data['country'];
        $loc['credit_score']=$data['credit_score'];
        $loc['latitude']=$data['lattitude'];
        $loc['longitude']=$data['longitude'];


        $loc['group_name']=$data['group_name'];
        


				$response['company'][$count]=$loc;
				$count++;	
			}
				

			header('content-Type:application/json');
			echo json_encode($response);
		}


 

  } else {
      echo "<script>window.location.href='company_location.php';</script>";
  }

?>