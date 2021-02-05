<?php
session_start();
include("functions.php");
check_session_id();

$user_id = $_SESSION['id'];
// DB接続
$pdo = connect_to_db();
$sql = "SELECT username FROM users_table WHERE id = $user_id";
// SQL準備&実行
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();
// データ登録処理後
// var_dump($_SESSION);
// exit();
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
    // fetchAll()関数でSQLで取得したレコードを配列で取得できる
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
    $output = "";

    foreach ($result as $record) {
        $output .= "{$record["username"]}";
        // $output .= "<div>{$record["username"]}<br>{$record["mail"]}<br>{$record["password"]}<br><a href='edit.php?id={$record["id"]}'>編集</a>・<a href='delete.php?id={$record["id"]}'>消去</a><br></div>";
    }
    unset($value);
}


?>


<!doctype html>
<html lang="ja">

<head>
    <link rel="stylesheet" href="_shared/style.css">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <title>8PoS-Lab</title>
    <!-- Modernizr -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <!-- jQuery-->
    <!-- <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script> -->
    <!-- framework css -->
    <!--[if gt IE 9]><!-->
    <link type="text/css" rel="stylesheet" href="css/groundwork.css">

    <style type="text/css">
        .logo {
            position: relative;
            top: -0.5em;
        }

        .logo a,
        .logo a:visited {
            text-decoration: none;
            color: #2B2B2D;
        }

        .logo img {
            height: 2em;
            position: relative;
            top: 0.55em;
            margin-right: 0.3em;
        }
    </style>
    <!-- snippet (syntax highlighting for code examples)-->
    <!-- <script type="text/javascript" src="js/jquery.snippet.min.js"></script> -->
    <link type="text/css" rel="stylesheet" href="css/jquery.snippet.css">
    <!-- <script type="text/javascript">
        (function() {

            $(document).ready(function() {
                $('pre[data-lang="html"]').snippet("html", {
                    style: "groundwork",
                    clipboard: "js/ZeroClipboard.swf"
                });
                $('pre[data-lang="css"]').snippet("css", {
                    style: "groundwork",
                    clipboard: "js/ZeroClipboard.swf"
                });
                $('pre[data-lang="sass"]').snippet("sass", {
                    style: "groundwork",
                    clipboard: "js/ZeroClipboard.swf"
                });
                return $('pre[data-lang="js"]').snippet("javascript", {
                    style: "groundwork",
                    clipboard: "js/ZeroClipboard.swf"
                });
            });

        }).call(this);
    </script> -->
</head>

<body style="background-color:#e3f2fd;">
    <header class="padded">
        <div class="container">
            <div class="row">
                <div class="one half">
                    <h2 class="logo"><a href="member.php" target="_parent"><img src="img/8pos.jpeg" alt="GroundworkCSS">8PoS-Lab</a>
                    </h2>
                </div>
                <div class="one half">
                    <p class="small double-pad-top no-pad-small-tablet align-right align-left-small-tablet">
                        <a href="https://gsacademy.jp/fukuoka/" target="_parent">G's Fukuoka</a> - DEV.7</br>
                        <!-- <a href="sign_up.php" target="_parent">sign-up</a></br> -->
                        <?= $output ?>さんログイン中<br>
                        <a href="logout.php" target="_parent">log-out</a>

                    </p>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <h1 class="heading">Room</h1>
            <p class="note">
                Change Room mode (before join in a room):
                <a href="#">mesh</a> / <a href="#sfu">sfu</a>
            </p>
            <div class="room">
                <div>
                    <video id="js-local-stream"></video>
                    <span id="js-room-mode"></span>:
                    <input type="text" placeholder="Room Name" id="js-room-id">
                    <button id="js-join-trigger">入室</button>
                    <button id="js-leave-trigger">退室</button>
                </div>

                <div class="remote-streams" id="js-remote-streams"></div>

                <div>
                    text-chat
                    <pre class="messages" id="js-messages"></pre>
                    <input type="text" id="js-local-text">
                    <button id="js-send-trigger">送信</button>
                </div>
            </div>
            <p class="meta" id="js-meta"></p>
        </div>
        <script src="//cdn.webrtc.ecl.ntt.com/skyway-4.3.0.js"></script>
        <script src="_shared/key.js"></script>
        <script src="_shared/script.js"></script>
    </main>
    <footer class=" animated gapped bottom">
        <div class="box square charcoal">
            <div class="container padded">
                <div class="row">
                    <div class="one small-tablet fourth padded">
                        <h5 class="green">Team Gallery</h5>
                        <ul class="unstyled">
                            <li><a href="./layout-a.html">FW </a></li>
                            <li><a href="./layout-b.html">BK</a></li>
                            <li><a href="./layout-c.html">Traning</a></li>
                            <li><a href="./layout-d.html">Game</a></li>
                        </ul>
                    </div>
                    <div class="three small-tablet fourths padded">
                        <h5 class="blue">Health saport</h5>
                        <ul class="unstyled three-column two-column-mobile">
                            <li><a href="./grid.html" title="Responsive grid system, grid adapters and helpers">Nutrition</a></li>
                            <li><a href="./helpers.html" title="Layout helpers, spinners and much more">stretch</a></li>
                            <li><a href="./helpers.html" title="Layout helpers, spinners and much more">yoga</a></li>
                            <li><a href="./navigation.html" title="Navigation">Urine check</a></li>
                            <li><a href="./navigation.html" title="Navigation">massage</a></li>
                            <li><a href="./navigation.html" title="Navigation">relaxation</a></li>
                            <li><a href="./navigation.html" title="Navigation">sleep quality</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- javascript-->
    <!-- <script type="text/javascript" src="js/groundwork.all.js"></script> -->


    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, Popper.js, Bootstrap JSの順番に読み込む -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>