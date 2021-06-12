<!doctype html>
<html lang="ja">

<head>
  <meta charset="utf-8">
</head>

<body>
  <header></header>
  <main>
    <?php
    require('db_connect.php');
     if(isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {
      $id = $_REQUEST['id'];
      $delete_column = $db->prepare('DELETE FROM boards WHERE id=?');
      $delete_column -> execute(array($id));
      $boards = $db->prepare('SELECT * FROM boards ORDER BY id ASC');
      $boards->execute();
      $fetched_boards = $boards->fetchAll(PDO::FETCH_ASSOC);
      $delete_table = $db->prepare('DROP TABLE boards');
      $delete_table->execute();
      $create_table = $db->prepare('CREATE TABLE boards(id int PRIMARY KEY AUTO_INCREMENT,name text,content text)');
      $create_table->execute();
      foreach ($fetched_boards as $board) {
          $reset_table = $db->prepare('INSERT INTO boards (name,content) VALUES (:name, :content)');
          $reset_table->bindParam(':name', $board['name'], PDO::PARAM_STR);
          $reset_table->bindParam(':content', $board['content'], PDO::PARAM_STR);
          $reset_table->execute();
      }
      echo '<h2>投稿の削除が完了しました。</h2>';
    }else{
      echo '<h2>投稿の削除に失敗しました。</h2>';
    }
  ?>
    <p><a href="index.php">戻る</a></p>
  </main>
</body>

</html>