<?php
include("functions.php");

$search_word = $_GET['searchword'];
// var_dump($search_word);
// exit();
$pdo = connect_to_db();

$sql = "SELECT * FROM media WHERE image LIKE '%{$search_word}%' order by id desc";

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
    // エラー処理を記述 
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result); // JSON形式にして出力 
    exit();
}
