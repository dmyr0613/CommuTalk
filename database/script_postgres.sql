create table talk_message (
  msg_no int,
  message varchar(100)
);

--メッセージ
insert into talk_message values(1, 'どうしましたか？');
insert into talk_message values(2, '素晴らしい！');
insert into talk_message values(3, 'もう少しがんばろう！');
insert into talk_message values(4, 'あと少しでお昼ごはんです。');
insert into talk_message values(5, 'あと少しで終了時間です。');
insert into talk_message values(6, '今日もいちにちご苦労さまでした。');



--デバイス名の存在チェック(なければINSERT)
http://calloncall.herokuapp.com/calling-check.php?device_name=dmyr-iPhone6s
--デバイス名の存在チェック2(なければINSERT。Tokenが異なればUPDATE)
http://calloncall.herokuapp.com/calling-check2.php?device_name=dmyr-iPhone6s&token=851fd0ba8b728b47d765f2d2bc90140474d5bb0c945606734c5e07d8dd40abc0
http://calloncall.herokuapp.com/calling-check2.php?device_name=generic_x86&token=cy9m7eDXFjo:APA91bHnGBIi1Zv6VlsRn1u2LF4a0OMzhIbfnnfZe1s49durSSLuasOj8cBQLWUcl9voza_Lviy3WTy-D6njbu-wJOPzbMo_uYWp7OKtXTJBO8SsagZCP8O5goY4Oxamqzsy5aCZIjOe
--msg_noの取得
http://calloncall.herokuapp.com/calling-get.php?device_name=dmyr-iPhone6s
--msg_noを更新 デバイス指定
http://calloncall.herokuapp.com/calling-set.php?device_name=dmyr-iPhone6s&msg_no=9
http://calloncall.herokuapp.com/calling-set.php?device_name=acer_T02&msg_no=1
--msg_noを更新 全デバイス
http://calloncall.herokuapp.com/calling-set.php?device_name=&msg_no=9
--msg_noのクリア
http://calloncall.herokuapp.com/calling-clear.php?device_name=dmyr-iPhone6s
http://calloncall.herokuapp.com/calling-clear.php?device_name=acer_T02
--レコード削除
http://calloncall.herokuapp.com/calling-delete.php?device_name=test
--call_message
http://calloncall.herokuapp.com/calling-msg-check.php?msg_no=1&message=TEST

--プッシュ通知
http://calloncall.herokuapp.com/push_calling.php?token=851fd0ba8b728b47d765f2d2bc90140474d5bb0c945606734c5e07d8dd40abc0&msg_no=1&message=TEST
--プッシュ通知ALL
http://calloncall.herokuapp.com/calling-push-all.php

--GHKitで音声再生
http://calloncall.herokuapp.com/push_calling_fb3.php?message='どうしましたか？'
http://calloncall.herokuapp.com/push_calling_fb3.php?message='素晴らしい！'
http://calloncall.herokuapp.com/push_calling_fb3.php?message='もう少しがんばろう！'
http://calloncall.herokuapp.com/push_calling_fb3.php?message='あと少しでお昼ごはんです。'
http://calloncall.herokuapp.com/push_calling_fb3.php?message='あと少しで終了時間です。'
http://calloncall.herokuapp.com/push_calling_fb3.php?message='今日もいちにちご苦労さまでした。'
