<!doctype html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>削除完了</title>
</head>

<body>
  <?php
    require('db_connect.php');
     if(isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {
      $id = $_REQUEST['id'];
      $delete_column = $db->prepare('DELETE FROM boards WHERE id=?');
      $delete_column -> execute(array($id));
      echo '<h2>投稿の削除が完了しました。</h2>';
    }else{
      echo '<h2>投稿の削除に失敗しました。</h2>';
    }
  ?>
  <button onclick="location.href='index.php'">投稿一覧へ戻る</button>
</body>

</html>