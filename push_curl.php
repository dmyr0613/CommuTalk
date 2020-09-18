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

	// $json = mb_convert_encoding($response, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
	$arr = json_decode($response,true);
	error_log(print_r($arr, true));

	$json_array = array();

	if ($arr === NULL) {
	        return;
	}else{
	        $json_count = count($arr["message"]["prediction"]);
					$label = array();
	        $probability = array();
	        for($i=$json_count-1;$i>=0;$i--){

							$row_array['label'] = $arr["result"]["prediction"][$i]["label"];
							$row_array['probability'] = $arr["result"]["prediction"][$i]["blogData"];

							array_push($json_array,$row_array);
	        }
	}



	//半分おまじない。JSONで送りますよという合図
  header("Content-Type: text/javascript; charset=utf-8");
  //JSON 形式にエンコードしてechoでPOST送信
  echo json_encode($json_array);

//コマンドプロンプトで以下を実行してもOKシングルクオーテーションではなくダブルクォーテーションで囲む
//curl --request POST --url "https://app.nanonets.com/api/v2/ImageCategorization/LabelUrls/" --header "accept: application/x-www-form-urlencoded" -d "modelId=b8303123-3ee6-488c-823a-52a9d5e6fc8c&urls=https://commutalk.herokuapp.com/images/strawberry.jpg" -u "jdMwAIdjpRQ8OnK4vv6EeTB53MwZe1z6:"

}catch (PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}

?>
