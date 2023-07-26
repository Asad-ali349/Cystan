<?php
include_once("db/session.php"); 

if(!isset($_SESSION['login_user'])|| $_SESSION['login_user']==''){         
        echo "<script>window.location.href='index.php';</script>";
    }
$user_id=$_SESSION['login_user'];

$response=['error'=>false];


if (isset($_POST['id'])) {
	
	
		$sql=mysqli_query($conn,"SELECT company.id,company.name,company.website,grouping.pin_color_id,company.total_employees,company.parent_company_id,company.group_id,company.contact,company.email,company.street,company.city,company.state,company.zip,company.country,company.review_avg,company.review_count,company.credit_score,company.anual_revenue,company.naics_id,company.latitude,company.longitude,grouping.name AS group_name,naics.sic_code,naics.naics_code,naics.description,naics.ins FROM supervisor LEFT JOIN employee ON employee.supervisor_id=supervisor.id LEFT JOIN company ON company.managed_by=employee.id LEFT JOIN grouping ON grouping.id=company.group_id LEFT JOIN naics ON naics.id= company.naics_id WHERE company.manage_role='2' AND supervisor.id='$user_id' AND company.is_company='1'");


		$supercompanies=mysqli_query($conn,"SELECT company.id,company.name,company.website,grouping.pin_color_id,company.total_employees,company.parent_company_id,company.group_id,company.contact,company.email,company.street,company.city,company.state,company.zip,company.country,company.review_avg,company.review_count,company.credit_score,company.anual_revenue,company.naics_id,company.latitude,company.longitude,grouping.name AS group_name,naics.sic_code,naics.naics_code,naics.description,naics.ins FROM company LEFT JOIN grouping ON grouping.id=company.group_id LEFT JOIN naics ON naics.id= company.naics_id WHERE company.manage_role='1' AND company.managed_by='$user_id' AND company.is_company='1'" );


		if (mysqli_num_rows($supercompanies)>0 ||mysqli_num_rows($sql)>0) {

			$count=0;
			while ($data=$supercompanies->fetch_array()) {
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
				$response['loc'][$count]=$loc;
				$count++;	
			}
			while ($data=$sql->fetch_array()) {
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
				$response['loc'][$count]=$loc;
				$count++;	
			}
			// print_r($response);

			header('content-Type:application/json');
			echo json_encode($response);
		}
}

?>