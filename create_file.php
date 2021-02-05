<?php
session_start();
include("functions.php");
check_session_id();

if (
  !isset($_POST['date']) || $_POST['date'] == '' ||
  !isset($_POST['filename']) || $_POST['filename'] == '' ||
  !isset($_POST['filename0']) || $_POST['filename0'] == '' ||
  // !isset($_POST['upfile']) || $_POST['upfile'] == '' ||
  !isset($_POST['message']) || $_POST['message'] == ''
) {
  // var_dump($_POST);
  // exit();
  // 項目が入力されていない場合はここでエラーを出力し，以降の処理を中止する
  echo json_encode(["error_msg" => "no input"]);
  exit();
}
// 受け取ったデータを変数に入れる
$date = $_POST['date'];
$filename = $_POST['filename'];
$filename0 = $_POST['filename0'];
$message = $_POST['message'];
// $upfile = $_POST['upfile'];

// var_dump($upfile);
// exit();

// ここからファイルアップロード&DB登録の処理を追加しよう！！！

if (!isset($_FILES['upfile']) || $_FILES['upfile']['error'] != 0) {
  exit('画像の保存に失敗しました');
} else {
  $uploaded_file_name = $_FILES['upfile']['name']; //ファイル名の取得 
  $temp_path = $_FILES['upfile']['tmp_name']; //tmpフォルダの場所 
  $directory_path = 'upload/'; //アップロード先ォルダ

  // コード
  $extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);
  $unique_name = $date .  $filename . "-" . $filename0 . "." . $extension;
  $filename_to_save = $directory_path . $unique_name;
  // var_dump($temp_path);
  // exit();
  $img = "";
  if (!is_uploaded_file($temp_path)) {
    exit('画像がないです'); // tmpフォルダにデータがない
  } else {              // ↓ここでtmpファイルを移動する
    if (!move_uploaded_file($temp_path, $filename_to_save)) {

      exit('アップロードに失敗しました'); // 画像の保存に失敗
    } else {
      chmod($filename_to_save, 0644); // 権限の変更
    }
  }
}

$pdo = connect_to_db();
// $/ データ登録SQL作成
// `created_at`と`updated_at`には実行時の`sysdate()`関数を用いて実行時の日時を入力する
$sql = 'INSERT INTO media(id, date, filename, filename0, message, image, created_at, updated_at) VALUES(NULL, :date, :filename, :filename0, :message, :image, sysdate(), sysdate())';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':date', $date, PDO::PARAM_STR);
$stmt->bindValue(':filename', $filename, PDO::PARAM_STR);
$stmt->bindValue(':filename0', $filename0, PDO::PARAM_STR);
$stmt->bindValue(':message', $message, PDO::PARAM_STR);
$stmt->bindValue(':image', $filename_to_save, PDO::PARAM_STR);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
  header("Location:gallery.php");
  exit();
}
