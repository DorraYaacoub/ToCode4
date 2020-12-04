get.php
<?php
try{
 $ip=$_GET['ip'];
 $url = 'http://api.ipinfodb.com/v3/ip-city/?key=gdg4fcfdfacc213c7ddf4ef911dfe97b55e4696be3532bf8302876c09ebad06b&format=json&ip='.$ip;
 $response = file_get_contents($url);
  $json_array=json_decode($response,true); 
 function display_array_recursive($json_rec){
		if($json_rec){
			foreach($json_rec as $key=> $value){
				if(is_array($value)){
					display_array_recursive($value);
				}else{
					echo $key.'--'.$value.'<br>';
				}	
			}	
		}	
	}
  	display_array_recursive($json_array);
}catch(Exception $e){
    echo $e->getMessage();
}
?>
