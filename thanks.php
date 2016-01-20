<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>PHP基礎</title>
	</head>
	<body>
		<?php
			// ステップ1.db接続
			$dsn = 'mysql:dbname=phpkiso;host=localhost';
			
			// 接続するためのユーザー情報
			$user = 'root';
			$password = '';

			// DB接続オブジェクトを作成
			$dbh = new PDO($dsn,$user,$password);

			// 接続したDBオブジェクトで文字コードutf8を使うように指定
			$dbh->query('SET NAMES utf8');

			// $dsn = 'mysql:dbname=LAA0686173-onelinebbs;host=mysql105.phy.lolipop.lan';
			// $user = 'LAA0686173';
			// $password = 'nexseed1204';



			$nickname = $_POST['nickname'];
			$email = $_POST['email'];
			$goiken = $_POST['goiken'];
			echo "ようこそ";
			echo $nickname;
			echo '様';
			echo '<br />';
			echo 'ご意見ありがとうございました。';
			echo "メールアドレス：";
			echo $email;
			echo '<br />';
			echo "ご意見『";
			echo $goiken;
			echo '』<br />';

			//ステップ2.データベースエンジンにSQL文で司令を出す
			$sql = 'INSERT INTO `survey`(`nickname`,`email`,`goiken`)VALUES("'.$nickname.'","'.$email.'","'.$goiken.'")';
			var_dump($sql);
			$stmt=$dbh->prepare($sql);
			//insert文を実行
			$stmt->execute();

			//ステップ3.データベースから切断
			$dbh=null;
		?>
	</body>
</html>