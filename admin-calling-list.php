<?php session_start(); ?>
<?php require 'admin-header.php'; ?>

<!-- Main -->
	<div id="main">
		<div class="inner">

				<!-- Header -->
				<?php require 'admin-header-sub.php'; ?>

				<!-- reserveMain -->
				<section id="reserveMain">
					<?php

						$msg_no = 0;
						// メッセージ情報を取得する。
						$sql=$pdo->prepare('select * from talk_message order by msg_no');
						$sql->execute();

						echo '<table>';
						echo '<th>No</th><th>メッセージ</th><th>発話</th>';
						foreach ($sql as $row) {
							$msg_no = $row['msg_no'];
							echo '<tr>';
							echo '<td>', $msg_no, '</td>';
							echo '<td><input type="text" name="msg_no_' . $msg_no . '" value="', $row['message'], '"></td>';
							echo '<td>';
							echo '<input type="button" id="sendAlart_' . $msg_no . '" class="button primary" value="Talk!!" onclick="sendAlart(' . $msg_no . ');">';
							echo '</td>';
						}
						echo '</table>';

						echo '<form action="admin-calling-send.php" method="post">';				//送信用のpost
						echo 'メッセージ入力後、Talk!!ボタンにてメッセージを発話します。';
						echo '<input type="text" name="free" value="">';
						echo '<p><input type="submit" class="button primary" value="Talk!!"></p>';
						echo '</form>';

						echo '下記ボタンクリックでページを再読み込みします。';
						echo '<p><INPUT TYPE="button" VALUE="Reload" onClick="window.location.reload();"></p>';
						echo '<p id="PassageArea"></p>';

						echo '<p><INPUT TYPE="button" VALUE="AnalyzeImage" onClick="sendAnalyzeImage();"></p>';
					?>
				</section>

			</div>
		</div>

<?php require 'admin-menu.php'; ?>
<?php require 'footer.php'; ?>

<script type="text/javascript">

	// アラート送信用 （引数にmsg_no）
	function sendAlart(msg_no) {

		console.log(msg_no);

		//WebAPIを呼び出し
		var request = new XMLHttpRequest();
		request.open('GET', 'http://commutalk.herokuapp.com/push_talk_msgno.php?msg_no=' + msg_no , true);
		request.onload = function () {
			//
		};
		request.send();

		 var msg = "通知を行いました。 メッセージNo:" + msg_no;   // 表示文作成
		 document.getElementById("PassageArea").innerHTML = msg;   // 表示更新

		 // window.location.reload();
	}

	function sendAnalyzeImage() {
		// var data = new FormData();
		// data.append('modelId', 'b8303123-3ee6-488c-823a-52a9d5e6fc8c');
		// data.append('file', 'https://commutalk.herokuapp.com/images/strawberry.jpg');
		//
		// const imgURL = 'https://commutalk.herokuapp.com/images/strawberry.jpg';
		// const data = 'modelId=b8303123-3ee6-488c-823a-52a9d5e6fc8c&urls=' + imgURL;
		//
		// var xhr = new XMLHttpRequest();
		//
		// xhr.addEventListener("readystatechange", function () {
		//   if (this.readyState === this.DONE) {
		//     console.log(this.responseText);
		//   }
		// });
		//
		// xhr.open("POST", "https://app.nanonets.com/api/v2/ImageCategorization/LabelFile/");
		// xhr.setRequestHeader("authorization", "Basic " + btoa("jdMwAIdjpRQ8OnK4vv6EeTB53MwZe1z6:"));
		//
		// xhr.send(data);
		// console.log(data);
		//
		// document.getElementById("PassageArea").innerHTML = "AnalyzeImage";   // 表示更新


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
