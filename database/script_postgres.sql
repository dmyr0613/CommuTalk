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


--GHKitで音声再生
http://commutalk.herokuapp.com/push_calling_fb3.php?message='どうしましたか？'
http://commutalk.herokuapp.com/push_calling_fb3.php?message='素晴らしい！'
http://commutalk.herokuapp.com/push_calling_fb3.php?message='もう少しがんばろう！'
http://commutalk.herokuapp.com/push_calling_fb3.php?message='あと少しでお昼ごはんです。'
http://commutalk.herokuapp.com/push_calling_fb3.php?message='あと少しで終了時間です。'
http://commutalk.herokuapp.com/push_calling_fb3.php?message='今日もいちにちご苦労さまでした。'
