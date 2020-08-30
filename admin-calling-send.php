<?php session_start(); ?>
<?php require 'admin-header.php'; ?>

<!-- Main -->
	<div id="main">
		<div class="inner">

				<!-- Header -->
				<?php require 'admin-header-sub.php'; ?>

				<!-- messageSend -->
				<section id="messageSend">
					<?php

          if (!empty($_REQUEST)) {
						$obj = $_REQUEST;
						error_log(print_r($obj, true));

						foreach ($obj as $key => $val){
							error_log($key);
							$msg = $_REQUEST['free'];		//メッセージを抜き取る
							error_log($msg);

							if (!empty($msg)) {
								//meg_noの指定がある場合は、webAPIにて、メッセージNoを更新する。
								$url = "http://commutalk.herokuapp.com/push_talk_msg.php?message=" . $msg;
								$ch = curl_init();
								curl_setopt($ch, CURLOPT_URL, $url);

								$response = curl_exec($ch);
								curl_close($ch);
								error_log(print_r($response, true));
							}
						}

            echo '<p>メッセージを発話しました。</p>';
						echo '<ul class="actions">';
						echo '<li><a href="admin-calling-list.php" class="button big">戻る</a></li>';
						echo '</ul>';
          }

					?>
				</section>

			</div>
		</div>

<?php require 'admin-menu.php'; ?>
<?php require 'footer.php'; ?>
