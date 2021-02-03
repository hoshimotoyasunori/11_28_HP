<?php
session_start();
include("functions.php");
check_session_id();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型todoリスト（入力画面）</title>
</head>

<body>
  <form action="create_file.php" method="POST" enctype="multipart/form-data">
    <fieldset>
      <legend>DB連携型todoリスト（入力画面）</legend>

      <div>
        date: <input type="date" name="date">
      </div>
      <div>
        filename: <select name="filename" id="">
          <option value="game">game</option>
          <option value="traning">traning</option>
          <option value="lineout">lineout</option>
          <option value="scrum">scrum</option>
          <option value="kick">kick</option>
          <option value="tackle">tackle</option>
        </select>
      </div>
      <div>
        <input type="file" name="upfile" accept="image/*" caputure="camera">
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>