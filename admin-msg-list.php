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

						// デバイス情報を取得する。
						$sql=$pdo->prepare('select * from talk_message order by msg_no');
						$sql->execute();

						echo '<form action="admin-msg-send.php" method="post">';				//送信用のpost
						echo '<table>';
						echo '<th width=25>メッセージNo</th><th>メッセージ</th><th width=20>修正</th><th width=20>削除</th>';
						foreach ($sql as $row) {
							$msg_no = $row['msg_no'];
							echo '<tr>';
							echo '<td>', $msg_no, '</td>';
							// 一意にするため、nameにデバイス名を付加する。　
							echo '<td><input type="text" name="msg_no_' . $msg_no . '" value="', $row['message'], '"></td>';

							echo '<td>';
							echo '<input type="checkbox" id="mod_' . $msg_no . '" name="mod_' . $msg_no . '">';
							echo '<label for="mod_' . $msg_no . '"> </label>';
							echo '</td>';
							echo '<td>';
							echo '<input type="checkbox" id="del_' . $msg_no . '" name="del_' . $msg_no . '">';
							echo '<label for="del_' . $msg_no . '"> </label>';
							echo '</td>';
						}
						//追加用のレコード
						$msg_no = $msg_no + 1;
						echo '<tr>';
						// echo '<td>', $msg_no, '</td>';
						echo '<td><input type="number" name="ins_no" value="' . $msg_no . '" class="input_number_only"></td>';
						echo '<td><input type="text" name="ins_msg" value="" ></td>';
						echo '<td>　</td>';
						echo '<td>　</td>';
						echo '</table>';
						echo '<input type="submit" class="button primary" value="Register">';
						echo '</form>';

					?>
				</section>

			</div>
		</div>

<?php require 'admin-menu.php'; ?>
<?php require 'footer.php'; ?>
