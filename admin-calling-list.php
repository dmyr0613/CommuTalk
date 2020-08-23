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
						echo '<th>No</th><th>メッセージ</th><th>送信</th>';
						foreach ($sql as $row) {
							$msg_no = $row['msg_no'];
							echo '<tr>';
							echo '<td>', $msg_no, '</td>';
							// 一意にするため、nameにデバイス名を付加する。　
							echo '<td><input type="text" name="msg_no_' . $msg_no . '" value="', $row['message'], '"></td>';

							echo '<td>';
							//echo '<input type="button" name="msg_id_' . $msg_no . '" value="Talk!!" onclick="sendAlart(', $row['message'], ');">';
							echo '<input type="button" id="sendAlart_' . $msg_no . '" class="button primary" value="Talk!!" onclick="sendAlart(1);">';
							echo '</td>';
						}
						echo '</table>';

						echo '<h4>下記ボタンクリックでも通知メッセージを送信します。</h4>';
						echo '<p>';
						echo '<input type="button" value="通知No1" id="sendAlart1" onclick="sendAlart(1);">';
						echo '　';
						echo '<input type="button" value="通知No2" id="sendAlart2" onclick="sendAlart(2);">';
						echo '　';
						echo '<input type="button" value="通知No3" id="sendAlart3" onclick="sendAlart(3);">';
						echo '　';
						echo '<input type="button" value="通知No4" id="sendAlart4" onclick="sendAlart(4);">';
						echo '　';
						echo '<input type="button" value="通知No5" id="sendAlart5" onclick="sendAlart(5);">';
						echo '</p>';

						echo '<h4>下記ボタンクリックでページを再読み込みします。</h4>';
						echo '<p><INPUT TYPE="button" class="button primary" VALUE="再読み込み" onClick="window.location.reload();"></p>';
						echo '<p id="PassageArea"></p>';
					?>
				</section>

			</div>
		</div>

<?php require 'admin-menu.php'; ?>
<?php require 'footer.php'; ?>

<script type="text/javascript">

	// アラート送信用 （引数にmsg_no）
	function sendAlart(msg_no) {

		//WebAPIを呼び出し
		var request = new XMLHttpRequest();
		request.open('GET', 'http://commutalk.herokuapp.com/push_calling_fb3.php?message=' + msg_no , true);
		request.onload = function () {
			//
		};
		request.send();

		 var msg = "通知を行いました。 メッセージNo:" + msg_no;   // 表示文作成
		 document.getElementById("PassageArea").innerHTML = msg;   // 表示更新

		 // window.location.reload();
	}
</script>
