<?php
try{

	$options = "modelId=b8303123-3ee6-488c-823a-52a9d5e6fc8c&urls=https://commutalk.herokuapp.com/upload/001.jpg";
	$headers = array(
		'Authorization: Basic ' . base64_encode("jdMwAIdjpRQ8OnK4vv6EeTB53MwZe1z6:"),
		'Content-Type: application/x-www-form-urlencoded'
	);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://app.nanonets.com/api/v2/ImageCategorization/LabelUrls/');
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $options);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$response = curl_exec($ch);
	curl_close($ch);
	error_log(print_r($response, true));

	$json = mb_convert_encoding($response, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
	$arr = json_decode($json,true);

error_log(print_r($arr, true));

	//半分おまじない。JSONで送りますよという合図
  header("Content-Type: text/javascript; charset=utf-8");
  //JSON 形式にエンコードしてechoでPOST送信
  echo json_encode($arr);

//コマンドプロンプトで以下を実行してもOKシングルクオーテーションではなくダブルクォーテーションで囲む
//curl --request POST --url "https://app.nanonets.com/api/v2/ImageCategorization/LabelUrls/" --header "accept: application/x-www-form-urlencoded" -d "modelId=b8303123-3ee6-488c-823a-52a9d5e6fc8c&urls=https://commutalk.herokuapp.com/images/strawberry.jpg" -u "jdMwAIdjpRQ8OnK4vv6EeTB53MwZe1z6:"

}catch (PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}

?>
