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
	// error_log(print_r($response, true));

	//結果をJSON形式とする
	$arr = array();
	$arr = json_decode($response,true);
	// error_log(print_r($arr, true));

	//結果を返すJSON配列
	$json_array = array();

	if ($arr === NULL) {
	        return;
	}else{

		 error_log(print_r($arr['result']['0']['prediction'], true));
		 //診断対象結果の件数取得
		 $json_count = count($arr['result']['0']['prediction']);
     for($i=$json_count-1;$i>=0;$i--){
			 	//labelに診断対象名、probabilityに診断結果
 				$row_array['label'] = base64_encode($arr['result']['0']['prediction'][$i]['label']);
 				$row_array['probability'] = $arr['result']['0']['prediction'][$i]['probability'];
				// JSON配列へ格納
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
