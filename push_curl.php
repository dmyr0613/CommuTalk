<?php
try{

	if (!empty($_GET)) {

		// $ch = curl_init();
		// // curl_setopt($ch, CURLOPT_URL, "curl --request POST --url 'https://app.nanonets.com/api/v2/ImageCategorization/LabelFile/' --header 'accept: multipart/form-data' -u 'jdMwAIdjpRQ8OnK4vv6EeTB53MwZe1z6:' -F 'modelId=b8303123-3ee6-488c-823a-52a9d5e6fc8c' -F 'file=@REPLACE_IMAGE_PATH.jpg'");
		// curl_setopt($ch, CURLOPT_URL, "curl --request POST --url 'https://app.nanonets.com/api/v2/ImageCategorization/LabelUrls/' --header 'accept: application/x-www-form-urlencoded' -d 'modelId=b8303123-3ee6-488c-823a-52a9d5e6fc8c&urls=http://commutalk.herokuapp.com/images/strawberry.jpg' -u 'jdMwAIdjpRQ8OnK4vv6EeTB53MwZe1z6:'");
		// $response = curl_exec($ch);
		// curl_close($ch);
		// error_log(print_r($response, true));

		$headers = array(
				"Accept: multipart/form-data",
				// "Authorization: Basic jdMwAIdjpRQ8OnK4vv6EeTB53MwZe1z6"
				'Authorization: Basic '. base64_encode("jdMwAIdjpRQ8OnK4vv6EeTB53MwZe1z6")
		);

		$options = "modelId=b8303123-3ee6-488c-823a-52a9d5e6fc8c&file=http://commutalk.herokuapp.com/images/strawberry.jpg";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://app.nanonets.com/api/v2/ImageCategorization/LabelFile/');
		// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic jdMwAIdjpRQ8OnK4vv6EeTB53MwZe1z6', 'Content-Type: application/x-www-form-urlencoded'));
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $options);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$response = curl_exec($ch);
		curl_close($ch);
		error_log(print_r($response, true));

//コマンドプロンプトで以下を実行すると、同じAPIエラーになる
// curl --request POST --url "https://app.nanonets.com/api/v2/ImageCategorization/LabelFile/" --header 'accept: multipart/form-data' -u 'jdMwAIdjpRQ8OnK4vv6EeTB53MwZe1z6:' -F 'modelId=b8303123-3ee6-488c-823a-52a9d5e6fc8c' -F 'file=http://commutalk.herokuapp.com/images/strawberry.jpg'


  }

}catch (PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}

?>
