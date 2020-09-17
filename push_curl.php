<?php
try{

	$headers = array(
			"Accept: application/x-www-form-urlencoded",
			"Authorization: Basic jdMwAIdjpRQ8OnK4vv6EeTB53MwZe1z6:"
	);

	$options = "modelId=b8303123-3ee6-488c-823a-52a9d5e6fc8c&urls=https://commutalk.herokuapp.com/upload/001.jpg";

	$options2 = array(
			"modelId=b8303123-3ee6-488c-823a-52a9d5e6fc8c&urls=https://commutalk.herokuapp.com/upload/001.jpg",
			"jdMwAIdjpRQ8OnK4vv6EeTB53MwZe1z6:"
	);

	$headers2 = array(
			"accept: application/x-www-form-urlencoded",
			"modelId=b8303123-3ee6-488c-823a-52a9d5e6fc8c&urls=https://commutalk.herokuapp.com/upload/001.jpg",
			"Authorization: Basic jdMwAIdjpRQ8OnK4vv6EeTB53MwZe1z6"
	);

	$headers3 = array(
		'Authorization: Basic jdMwAIdjpRQ8OnK4vv6EeTB53MwZe1z6:',
		'Content-Type: application/x-www-form-urlencoded'
	);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://app.nanonets.com/api/v2/ImageCategorization/LabelUrls/');
	// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic jdMwAIdjpRQ8OnK4vv6EeTB53MwZe1z6', 'Content-Type: application/x-www-form-urlencoded'));
	// curl_setopt($ch, CURLOPT_HTTPHEADER, "Content-Type: application/x-www-form-urlencoded Authorization: Basic jdMwAIdjpRQ8OnK4vv6EeTB53MwZe1z6:");
	// curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: jdMwAIdjpRQ8OnK4vv6EeTB53MwZe1z6", "Accept: application/x-www-form-urlencoded"));

	// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	// curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type:application/x-www-form-urlencoded',]);

	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers3);
	curl_setopt($ch, CURLOPT_POST, 1);

	curl_setopt($ch, CURLOPT_POSTFIELDS, $options);
	// curl_setopt($ch, CURLOPT_POSTFIELDS, $options2);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$response = curl_exec($ch);
	curl_close($ch);
	error_log(print_r($response, true));

//コマンドプロンプトで以下を実行してもOKシングルクオーテーションではなくダブルクォーテーションで囲む
//curl --request POST --url "https://app.nanonets.com/api/v2/ImageCategorization/LabelUrls/" --header "accept: application/x-www-form-urlencoded" -d "modelId=b8303123-3ee6-488c-823a-52a9d5e6fc8c&urls=https://commutalk.herokuapp.com/images/strawberry.jpg" -u "jdMwAIdjpRQ8OnK4vv6EeTB53MwZe1z6:"

}catch (PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}

?>
