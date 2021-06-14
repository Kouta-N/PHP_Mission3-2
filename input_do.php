<!doctype html>
<html lang="ja">

<head>
  <meta charset="utf-8">
</head>

<body>
  <main>
    <?php 
  if ($_POST['input_name'] !== '' && $POST['content'] !== '') {
      echo '<h2>投稿が完了しました。</h2>';
      require('db_connect.php');
      $statement = $db->prepare('INSERT INTO boards(name,content) VALUES (:name,:content)');
      $statement->bindParam(':name', $_POST['input_name'], PDO::PARAM_STR);
      $statement->bindParam(':content', $_POST['content'], PDO::PARAM_STR);
      $statement->execute();
  }else{
    echo '<h2>値を入力してください。</h2>';
  }
?>
    <button onclick="location.href='index.php'">投稿一覧へ戻る</button>
  </main>
</body>

</html>