<?php
try{

	if (!empty($_GET)) {

		//Heroku PostgresSQL
    // $dsn = 'pgsql:dbname=d13p6kmhdcirvm host=ec2-174-129-208-118.compute-1.amazonaws.com port=5432';
    // $user = 'gkijtxlavebgol';
    // $password = 'ecff643bfa3612a94627c9d668f867a06ce4b86e4a69f8a42d981af26c50a505';

	  // Kaimeido Heroku PostgresSQL
	  $dsn = 'pgsql:dbname=d8qp7bgte2p1ue host=ec2-174-129-254-249.compute-1.amazonaws.com port=5432';
	  $user = 'crridrugfblfyo';
	  $password = '345e1a510b468c26ac2149fa0d42d2b947fe8a762a34c89c027a906539cd0895';
    $pdo = new PDO($dsn, $user, $password);

    if ($pdo == null){
      error_log("接続に失敗しました。");
    }else{
      error_log("接続に成功しました。");
    }
		//POST値を取得
    $msg_no = $_GET['msg_no'];

		if (!empty($msg_no)) {
	    //talk_messageテーブルからレコード削除
	    $sqlText   = 'select message from talk_message';
	    $sqlText  .= ' where msg_no = ?';

	    error_log(print_r($sqlText, true));

	    $sql=$pdo->prepare($sqlText);
	    $sql->execute([$msg_no]);
	    $count = $sql->rowCount();
			error_log($count);

			if ($count > 0) {
				//locationテーブルへINSERT
				foreach ($sql as $row) {
					// 送信する文字列
					$alert = $row['message'];
					error_log($alert);
				}
			}
		}
		//DB接続情報をクリア
		$pdo = null;

		if (!empty($alert)) {

			$options = '{';
			$options = $options . '  "ghkit":"hekuu759kh",';
			$options = $options . '  "code":"235684",';
			$options = $options . '  "message":"' . $alert . '"';
			$options = $options . '}';

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://zero.ghkit.jp/');
			// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ya29.ElqKBGN2Ri_Uz...HnS_uNreA', 'Content-Type: application/json'));
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($ch, CURLOPT_POST, 1);
			// curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($options));
			curl_setopt($ch, CURLOPT_POSTFIELDS, $options);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			$response = curl_exec($ch);
			curl_close($ch);
			error_log(print_r($response, true));
		}

  }

}catch (PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}

?>
