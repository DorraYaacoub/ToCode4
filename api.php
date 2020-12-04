<?php
$url="http://localhost/RWS1/api.php";
header("Content-Type:application/json");
if (isset($_GET['id']) && $_GET['id']!="") {
	include('db.php');
	$order_id = $_GET['id'];
	$result = mysqli_query($con,"SELECT * FROM `transactions` WHERE id=$id");
	if(mysqli_num_rows($result)>0){
	$row = mysqli_fetch_array($result);
	
	$nom = $row['nom'];
	$prénom = $row['prénom'];
	response($id, $nom,$prénom);
	mysqli_close($con);
	}else{
		response(NULL, NULL, 200,"No Record Found");
		}
}else{
	response(NULL, NULL, 400,"Invalid Request");
	}

function response($order_id,$nom,$prénom){
	$response['id'] = $order_id;
	
	$response['nom'] = $nom;
	$response['prénom'] = $prénom;
	
	$json_response = json_encode($response);
	echo $json_response;
}
?>


