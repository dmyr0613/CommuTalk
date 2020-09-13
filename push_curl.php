<?php
try{

	if (!empty($_GET)) {

		// $headers = array(
		// 		"Accept: application/x-www-form-urlencoded",
		// 		"modelId: b8303123-3ee6-488c-823a-52a9d5e6fc8c&urls=https://goo.gl/ICoiHc",
		// 		"Authorization: jdMwAIdjpRQ8OnK4vv6EeTB53MwZe1z6"
		// );

		// $ch = curl_init();
		// // curl_setopt($ch, CURLOPT_URL, "curl --request POST --url 'https://app.nanonets.com/api/v2/ImageCategorization/LabelFile/' --header 'accept: multipart/form-data' -u 'jdMwAIdjpRQ8OnK4vv6EeTB53MwZe1z6:' -F 'modelId=b8303123-3ee6-488c-823a-52a9d5e6fc8c' -F 'file=@REPLACE_IMAGE_PATH.jpg'");
		// curl_setopt($ch, CURLOPT_URL, "curl --request POST --url 'https://app.nanonets.com/api/v2/ImageCategorization/LabelUrls/' --header 'accept: application/x-www-form-urlencoded' -d 'modelId=b8303123-3ee6-488c-823a-52a9d5e6fc8c&urls=http://commutalk.herokuapp.com/images/strawberry.jpg' -u 'jdMwAIdjpRQ8OnK4vv6EeTB53MwZe1z6:'");
		// $response = curl_exec($ch);
		// curl_close($ch);
		// error_log(print_r($response, true));

		//////////////////////////////////////////////

		$headers = array(
				"Accept: application/x-www-form-urlencoded",
				"Authorization: Basic jdMwAIdjpRQ8OnK4vv6EeTB53MwZe1z6"
		);

		$options = "modelId=b8303123-3ee6-488c-823a-52a9d5e6fc8c&urls=http://commutalk.herokuapp.com/images/strawberry.jpg";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://app.nanonets.com/api/v2/ImageCategorization/LabelUrls/');
		// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ya29.ElqKBGN2Ri_Uz...HnS_uNreA', 'Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $options);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$response = curl_exec($ch);
		curl_close($ch);
		error_log(print_r($response, true));


//////////////////////////////////////////////

// curl
// --request POST
// --url 'https://app.nanonets.com/api/v2/ImageCategorization/LabelUrls/'
// --header 'accept: application/x-www-form-urlencoded'
// -d 'modelId=b8303123-3ee6-488c-823a-52a9d5e6fc8c&urls=https://goo.gl/ICoiHc'
// -u 'jdMwAIdjpRQ8OnK4vv6EeTB53MwZe1z6:'
//
// curl --request POST
// --url 'https://app.nanonets.com/api/v2/ImageCategorization/LabelUrls/'
// --header 'accept: application/x-www-form-urlencoded'
// -d 'modelId=b8303123-3ee6-488c-823a-52a9d5e6fc8c&urls=http://commutalk.herokuapp.com/images/strawberry.jpg'
// -u 'jdMwAIdjpRQ8OnK4vv6EeTB53MwZe1z6:'

//////////////////////////////////////////////
// require_once './unirest-php/src/Unirest.php';
// $api_key = getenv('jdMwAIdjpRQ8OnK4vv6EeTB53MwZe1z6');
// $model_id = getenv('modelId=b8303123-3ee6-488c-823a-52a9d5e6fc8c&urls=https://goo.gl/ICoiHc');
// $url = 'https://app.nanonets.com/api/v2/ObjectDetection/Model/'. $model_id;
// $image_path = $argv[1];
//
// echo $image_path."\n";
//
// $data = array(
//     "modelId" => $model_id
// );
// $files = array('file'=>$image_path);
//
// $body = Unirest\Request\Body::multipart($data, $files);
// $headers = array();
// $result = Unirest\Request::post($url, $headers, $body, $api_key, '');
// if ($result === FALSE) {
//     echo "Some Error in API";
// }
// else{
//     print_r(json_decode($result->raw_body, True)['result']);
// }
//
//
//////////////////////////////////////////////


  }

}catch (PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}

?>
