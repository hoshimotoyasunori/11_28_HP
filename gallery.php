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
$sql = "SELECT image FROM media WHERE filename LIKE '%{$search_word}%'";
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

<body>



    <header class="padded">
        <div class="container">
            <div class="row">
                <div class="one half">
                    <h1 class="logo"><a href="index.html" target="_parent"><img src="img/8pos.jpeg" alt="GroundworkCSS">
                            Gallery
                        </a>
                    </h1>
                    <p>⇒<a href="file_input.php">Add to Media</a></p>

                </div>
                <div class="one half">
                    <p class="small double-pad-top no-pad-small-tablet align-right align-left-small-tablet">
                        <a href="https://gsacademy.jp/fukuoka/" target="_parent">G's Fukuoka</a> -
                        DEV.7<br><?= $output ?>さんログイン中<br>
                        <a href="logout.php" target="_parent">logout</a>
                    </p>
                </div>
            </div>
            <nav role="navigation" class="nav gap-top" id="home">
                <ul role="menubar">
                    <!-- list1 -->
                    <li>
                        <button>Fowards</button>
                        <ul>
                            <li><a href="fw_page.php">FW Page</a></li>
                            <li><a href="fw_page.php">Scrum</a></li>
                            <li><a href="fw_page.php">Line out</a></li>
                        </ul>
                    </li>
                    <!-- list2 -->
                    <li>
                        <button>Backs</button>
                        <ul>
                            <li><a href="bk_page.php">BK Page</a></li>
                            <li><a href="bk_page.php">Traning</a></li>
                            <li><a href="bk_page.php">Sign play</a></li>
                        </ul>
                    </li>
                    <!-- list3 -->
                    <li>
                        <button>ALL member</button>
                        <ul>
                            <li><a href="member.php">ALL page</a></li>
                            <li><a href="self_analysis.php">analysis</a></li>
                            <li><a href="schedules.php">Schedule</a></li>
                        </ul>
                    </li>
                    <!-- list4 -->
                    <li><a href="gallery.php">Gallery</a></li>

                </ul>
            </nav>
        </div>
    </header>
    <main>

        <!-- <?= $output1 ?> -->
        <fieldset>
            <legend>リアルタイム検索型todoリスト</legend>

            <div>
                検索フォーム：
                <!-- <input type="text" id="search"> -->

                <select name="" id="search" size="10" style='height:160px;'>
                    <option value="">all</option>
                    <option value="game">game</option>
                    <option value="traning">traning</option>
                    <option value="lineout">lineout</option>
                    <option value="scrum">scrum</option>
                    <option value="kick">kick</option>
                    <option value="tackle" selected>tackle</option>
                </select>
                <!-- <button id="search">検索</button> -->
            </div>
            <table>

                <tbody id="result">
                    <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
                </tbody>
            </table>
        </fieldset>
        <article class="row">
            <div class="one sixth three-up-small-tablet two-up-mobile padded bounceInLeft animated"><a href="upload/<?= $result[6]['image'] ?>" title=" View Larger Image" class="block green"><img src="upload/<?= $result[6]['image'] ?>" alt=" Image 2"></a></div>
            <div class="one sixth three-up-small-tablet two-up-mobile padded rotateInDownLeft animated"><a href="<?= $result[1]['image'] ?>" title="View Larger Image" class="block blue"><img src="upload/<?= $result[1]['image'] ?>" alt="Image 2"></a> </div>
            <div class="one sixth three-up-small-tablet two-up-mobile padded bounceInUp animated"><a href="<?$result[2]['image'] ?>" title=" View Larger Image" class="block yellow"><img src="<?= $result[2]['image'] ?>" alt="Image 4"></a></div>
            <div class="one sixth three-up-small-tablet two-up-mobile padded bounceInDown animated"><a href="http://via.placeholder.com/900x500/9b59b6/ffffff/&amp;text=Image+3" title="View Larger Image" class="block purple"><img src="<?= $result[3]['image'] ?>" alt="Image 3"></a></div>
            <div class="one sixth three-up-small-tablet two-up-mobile padded rotateInUpRight animated"><a href="http://via.placeholder.com/900x500/e67e22/ffffff/&amp;text=Image+5" title="View Larger Image" class="block orange"><img src="<?= $result[4]['image'] ?>" alt="Image 5"></a></div>
            <div class="one sixth three-up-small-tablet two-up-mobile padded bounceInRight animated"><a href="http://via.placeholder.com/900x500/e74c3c/ffffff/&amp;text=Image+6" title="View Larger Image" class="block red"><img src="<?= $result[5]['image'] ?>" alt="Image 6"></a></div>
        </article>
        <article class="row">
            <div class="one sixth three-up-small-tablet two-up-mobile padded bounceInDown animated"><a href="http://via.placeholder.com/900x500/34495e/ffffff/&amp;text=Image+9" title="View Larger Image" class="block asphalt"><img src="<?= $result[6]['image'] ?>" alt="Image 9"></a></div>
            <div class="one sixth three-up-small-tablet two-up-mobile padded rotateInDownLeft animated"><a href="http://via.placeholder.com/900x500/1abc9c/ffffff/&amp;text=Image+8" title="View Larger Image" class="block turquoise"><img src="<?= $result[7]['image'] ?>" alt="Image 8"></a></div>
            <div class="one sixth three-up-small-tablet two-up-mobile padded rotateInUpRight animated"><a href="http://via.placeholder.com/900x500/3498db/ffffff/&amp;text=Image+11" title="View Larger Image" class="block blue"><img src="<?= $result[8]['image'] ?>" alt=" Image 11"></a></div>
            <div class="one sixth three-up-small-tablet two-up-mobile padded bounceInRight animated"><a href="http://via.placeholder.com/900x500/9b59b6/ffffff/&amp;text=Image+12" title="View Larger Image" class="block purple"><img src="<?= $result[9]['image'] ?>" alt="Image 12"></a></div>
            <div class="one sixth three-up-small-tablet two-up-mobile padded bounceInUp animated"><a href="http://via.placeholder.com/900x500/2ecc71/ffffff/&amp;text=Image+10" title="View Larger Image" class="block green"><img src="<?= $result[10]['image'] ?>" alt="Image 10"></a></div>
            <div class=" one sixth three-up-small-tablet two-up-mobile padded bounceInLeft animated"><a href="http://via.placeholder.com/900x500/f02475/ffffff/&amp;text=Image+7" title="View Larger Image" class="block pink"><img src="<?= $result[11]['image'] ?>" alt="Image 7"></a></div>
        </article>
        <article class="row">
            <div class="one sixth three-up-small-tablet two-up-mobile padded rotateInDownLeft animated"><a href="http://via.placeholder.com/900x500/e67e22/ffffff/&amp;text=Image+14" title="View Larger Image" class="block orange"><img src="<?= $result[12]['image'] ?>" alt="Image 14"></a></div>
            <div class="one sixth three-up-small-tablet two-up-mobile padded bounceInLeft animated"><a href="http://via.placeholder.com/900x500/f1c40f/ffffff/&amp;text=Image+13" title="View Larger Image" class="block yellow"><img src="<?= $result[13]['image'] ?>" alt="Image 13"></a></div>
            <div class="one sixth three-up-small-tablet two-up-mobile padded bounceInRight animated"><a href="http://via.placeholder.com/900x500/34495e/ffffff/&amp;text=Image+18" title="View Larger Image" class="block asphalt"><img src="<?= $result[14]['image'] ?>" alt="Image 18"></a></div>
            <div class="one sixth three-up-small-tablet two-up-mobile padded bounceInDown animated"><a href="http://via.placeholder.com/900x500/e74c3c/ffffff/&amp;text=Image+15" title="View Larger Image" class="block red"><img src="<?= $result[15]['image'] ?>" alt="Image 15"></a></div>
            <div class="one sixth three-up-small-tablet two-up-mobile padded rotateInUpRight animated"><a href="http://via.placeholder.com/900x500/1abc9c/ffffff/&amp;text=Image+17" title="View Larger Image" class="block turquoise"><img src="<?= $result[16]['image'] ?>" alt="Image 17"></a></div>
            <div class="one sixth three-up-small-tablet two-up-mobile padded bounceInUp animated"><a href="http://via.placeholder.com/900x500/f02475/ffffff/&amp;text=Image+16" title="View Larger Image" class="block pink"><img src="<?= $result[17]['image'] ?>" alt="Image 16"></a></div>
        </article>
        </div>
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
                        output.push(`<div class="one sixth three-up-small-tablet two-up-mobile padded bounceInDown animated"><img src="${x.image}" style="height:auto;"></div>`)
                    });
                    $('#result').html(output);
                    console.log(result);
                })
                .catch(function(error) {
                    console.log(error);
                })
                .finally();
        });
    </script>

</body>

</html>