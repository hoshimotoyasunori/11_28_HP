<?php
session_start();
include("functions.php");
check_session_id();
$user_id = $_SESSION['id'];
$pdo = connect_to_db();
$sql = "SELECT username FROM users_table WHERE id = $user_id";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();


if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
    $output = "";
    foreach ($result as $record) {
        $output = "<tr><td>{$record["username"]}</td></tr>";
    }
    unset($value);
}



$search_word = $_GET["serchword"];
$sql = "SELECT image FROM media WHERE filename LIKE '%{$search_word}%' order by id desc";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    unset($value);
}


?>
<!DOCTYPE html>

<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <title>8PoS-Lab</title>
    <!-- Modernizr -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <!-- jQuery-->
    <!-- <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script> -->
    <!-- framework css -->
    <!-- if gt IE 9-- -->
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
    <!-- snippet (syntax highlighting for code examples) -->
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

<body>



    <header class="padded">
        <div class="container">
            <div class="row">
                <div class="one half">
                    <h1 class="logo"><a href="index.html" target="_parent"><img src="img/8pos.jpeg" alt="GroundworkCSS">
                            Gallery
                        </a>
                    </h1>
                    <a href="file_input.php">⇒Add to Media</a>

                </div>
                <div class="one half">
                    <p class="small double-pad-top no-pad-small-tablet align-right align-left-small-tablet">
                        <a href="https://gsacademy.jp/fukuoka/" target="_parent">G's Fukuoka</a> -
                        DEV.7<br><?= $output ?>さんログイン中<br>
                        <a href="logout.php" target="_parent">logout</a>
                    </p>
                </div>
            </div>
            <!--  -->
            <a href="member.php">Back to TOP</a>
        </div>
    </header>
    <main>

        <!-- <?= $output1 ?> -->
        <fieldset>
            <legend>データ検索</legend>

            <div>
                <!-- <input type="text" id="search"> -->

                <select name="" id="search" size="10" style='height:120px;'>
                    <option value="">・ALL</option>
                    <option value="team">・team</option>
                    <option value="fw">・fw</option>
                    <option value="bk">・bk</option>
                    <option value="private">・private</option>
                    <option value="game">・Game</option>
                    <option value="traning">・Traning</option>
                    <option value="lineout">・Lineout</option>
                    <option value="scrum">・Scrum</option>
                    <option value="kick">・Kick</option>
                    <option value="tackle">・Tackle</option>
                </select>
                <!-- <button id="search">検索</button> -->
            </div>
            <table>

                <tbody id="result">
                    <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
                </tbody>
            </table>
        </fieldset>
        <fieldset id="media_file">
            <article class="row">
                <div class="one sixth three-up-small-tablet two-up-mobile padded rotateIn animated"><img src="<?= $result[0]['image'] ?>"></div>
                <div class="one sixth three-up-small-tablet two-up-mobile padded rotateIn animated"><img src="<?= $result[1]['image'] ?>"></div>
                <div class="one sixth three-up-small-tablet two-up-mobile padded rotateIn animated"><img src="<?= $result[2]['image'] ?>"></div>
                <div class="one sixth three-up-small-tablet two-up-mobile padded rotateIn animated"><img src="<?= $result[3]['image'] ?>"></div>
                <div class="one sixth three-up-small-tablet two-up-mobile padded rotateIn animated"><img src="<?= $result[4]['image'] ?>"></div>
                <div class="one sixth three-up-small-tablet two-up-mobile padded rotateIn animated"><img src="<?= $result[5]['image'] ?>"></div>
            </article>
            <article class="row">
                <div class="one sixth three-up-small-tablet two-up-mobile padded rotateIn animated"><img src="<?= $result[6]['image'] ?>"></div>
                <div class="one sixth three-up-small-tablet two-up-mobile padded rotateIn animated"><img src="<?= $result[7]['image'] ?>"></div>
                <div class="one sixth three-up-small-tablet two-up-mobile padded rotateIn animated"><img src="<?= $result[8]['image'] ?>"></div>
                <div class="one sixth three-up-small-tablet two-up-mobile padded rotateIn animated"><img src="<?= $result[9]['image'] ?>"></div>
                <div class="one sixth three-up-small-tablet two-up-mobile padded rotateIn animated"><img src="<?= $result[10]['image'] ?>"></div>
                <div class="one sixth three-up-small-tablet two-up-mobile padded rotateIn animated"><img src="<?= $result[11]['image'] ?>"></div>
            </article>
            <article class="row">
                <div class="one sixth three-up-small-tablet two-up-mobile padded rotateIn animated"><img src="<?= $result[12]['image'] ?>"></div>
                <div class="one sixth three-up-small-tablet two-up-mobile padded rotateIn animated"><img src="<?= $result[13]['image'] ?>"></div>
                <div class="one sixth three-up-small-tablet two-up-mobile padded rotateIn animated"><img src="<?= $result[14]['image'] ?>"></div>
                <div class="one sixth three-up-small-tablet two-up-mobile padded rotateIn animated"><img src="<?= $result[15]['image'] ?>"></div>
                <div class="one sixth three-up-small-tablet two-up-mobile padded rotateIn animated"><img src="<?= $result[16]['image'] ?>"></div>
                <div class="one sixth three-up-small-tablet two-up-mobile padded rotateIn animated"><img src="<?= $result[17]['image'] ?>"></div>
            </article>
        </fieldset>

    </main>

    <footer class="gap-top bounceInUp animated">
        <div class="box square charcoal">
            <div class="container padded">
                <div class="row">
                    <div class="one small-tablet fourth padded">
                        <h5 class="green">Team Gallery</h5>
                        <ul class="unstyled">
                            <li><a href="fw_page.php">FW </a></li>
                            <li><a href="bk_page.php">BK</a></li>
                            <li><a href="all_member_page.php">Traning</a></li>
                            <li><a href="game_page.php">Game</a></li>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        $('#search').on('click', function() {
            console.log($(this).val());
            const searchWord = $(this).val();
            const requestUrl = 'ajax_get.php';
            axios.get(`${requestUrl}?searchword=${searchWord}`)
                .then(function(response) {
                    console.log(response);
                    const output = [];
                    response.data.forEach(function(x) {
                        // output.push(`<img src="${x.image}" class="one sixth three-up-small-tablet two-up-mobile padded bounceInLeft animated">`)
                        output.push(`<div class="one sixth three-up-small-tablet two-up-mobile padded rotateIn animated"><img src="${x.image}" style="objest-fit:contain;"></a></div>`)
                    });
                    $('#result').html(output);
                    console.log(result);
                })
                .catch(function(error) {
                    console.log(error);
                })
                .finally();
            $('#media_file').css("display", "none");
        });
        // $('#serch').on('click', function() {
        //     $('#media_file').css("display", "none");
        // });
    </script>

</body>

</html>