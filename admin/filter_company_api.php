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
    
    $query = "SELECT company.id,company.name,company.website,grouping.pin_color_id,company.total_employees,company.parent_company_id,company.group_id,company.contact,company.email,company.street,company.city,company.state,company.zip,company.country,company.review_avg,company.review_count,company.credit_score,company.anual_revenue,company.naics_id,company.latitude,company.longitude,grouping.name AS group_name, naics.sic_code,naics.naics_code,naics.description,naics.ins FROM company  LEFT JOIN grouping ON grouping.id=company.group_id LEFT JOIN naics ON naics.id= company.naics_id";
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
    $sql .=" AND company.status='1'"; 

   
    $sql_query=mysqli_query($conn,$sql); 
    
    if (mysqli_num_rows($sql_query)>0) {
    	
			$count=0;
			while ($data=$sql_query->fetch_array()) {
				
				$loc=[];
        $loc['id']=$data['id'];
				$loc['name']=$data['name'];
        $loc['url']=$data['website'];
        $loc['pin_color_id']=$data['pin_color_id'];
        $loc['total_employees']=$data['total_employees'];
        $loc['parent_company_id']=$data['parent_company_id'];
        $loc['group_id']=$data['group_id'];
        $loc['contact']=$data['contact'];
        $loc['email']=$data['email'];
        $loc['street']=$data['street'];
        $loc['state']=$data['state'];
        $loc['zip']=$data['zip'];
        $loc['country']=$data['country'];
        $loc['review_avg']=$data['review_avg'];
        $loc['review_count']=$data['review_count'];
        $loc['credit_score']=$data['credit_score'];
        $loc['anual_revenue']=$data['anual_revenue'];
        $loc['latitude']=$data['latitude'];
        $loc['longitude']=$data['longitude'];


        $loc['group_name']=$data['group_name'];
        $loc['sic_code']=$data['sic_code'];
        $loc['naics_code']=$data['naics_code'];
        $loc['description']=$data['description'];
        $loc['ins']=$data['ins'];


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