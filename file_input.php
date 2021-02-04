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
  <title>データ投稿画面</title>
</head>

<body>
  <form action="create_file.php" method="POST" enctype="multipart/form-data">
    <fieldset>
      <legend>データ投稿画面</legend>

      <div>
        date: <input type="date" name="date">
      </div>
      <div>
        タグ１: <select name="filename" id="">
          <option value="game">game</option>
          <option value="traning">traning</option>
          <option value="lineout">lineout</option>
          <option value="scrum">scrum</option>
          <option value="kick">kick</option>
          <option value="tackle">tackle</option>
        </select>
        タグ2: <select name="filename0" id="">
          <option value="team">team</option>
          <option value="fw">fw</option>
          <option value="bk">bk</option>
          <option value="private">private</option>
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