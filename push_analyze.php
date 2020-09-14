<script type="text/javascript">

	// Nanonetsを呼ぶ
	function sendAnalyzeImage() {

		var data = 'modelId=b8303123-3ee6-488c-823a-52a9d5e6fc8c&urls=https://commutalk.herokuapp.com/images/strawberry.jpg';

		var xhr = new XMLHttpRequest();

		xhr.addEventListener("readystatechange", function () {
		  if (this.readyState === this.DONE) {
		    console.log(this.responseText);
		  }
		});

		xhr.open("POST", "https://app.nanonets.com/api/v2/ImageCategorization/LabelUrls/");
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.setRequestHeader("authorization", "Basic " + btoa("jdMwAIdjpRQ8OnK4vv6EeTB53MwZe1z6:"));

		xhr.send(data);
		document.getElementById("PassageArea").innerHTML = "AnalyzeImage";   // 表示更新
	}

</script>

<?php

try{

	$json_array = array();

  // foreach ($sql as $row) {
    //JSON形式にする
    $row_array['name'] = "イチゴ";
    $row_array['ratio'] = "0.99999";

    array_push($json_array,$row_array);
    // error_log(print_r($json_array, true));
  // }

  //半分おまじない。JSONで送りますよという合図
  header("Content-Type: text/javascript; charset=utf-8");
  //JSON 形式にエンコードしてechoでPOST送信
  echo json_encode($json_array);


}catch (PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}


//echo '<script src="assets/js/jquery.min.js"></script>';
//echo '<script src="assets/js/browser.min.js"></script>';
// echo '<script src="assets/js/breakpoints.min.js"></script>';
// echo '<script src="assets/js/util.js"></script>';
// echo '<script src="assets/js/main.js"></script>';

?>
