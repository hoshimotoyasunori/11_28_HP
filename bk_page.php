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

?>
<!DOCTYPE html>

<html class="no-js">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <title>GroundworkCSS Layouts: Ecommerce</title>
    <!-- Modernizr -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <!-- jQuery-->
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <!-- framework css -->
    <!-- [if gt IE 9-- -->
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
    <script type="text/javascript" src="js/jquery.snippet.min.js"></script>
    <link type="text/css" rel="stylesheet" href="css/jquery.snippet.css">
    <script type="text/javascript">
        (function() {

            $(document).ready(function() {
                $('pre[data-lang="html"]').snippet("html", {
                    style: "groundwork",
                    clipboard: "swf/ZeroClipboard.swf"
                });
                $('pre[data-lang="css"]').snippet("css", {
                    style: "groundwork",
                    clipboard: "swf/ZeroClipboard.swf"
                });
                $('pre[data-lang="sass"]').snippet("sass", {
                    style: "groundwork",
                    clipboard: "swf/ZeroClipboard.swf"
                });
                return $('pre[data-lang="js"]').snippet("javascript", {
                    style: "groundwork",
                    clipboard: "swf/ZeroClipboard.swf"
                });
            });

        }).call(this);
    </script>
</head>

<body>
    <header class="padded">
        <div class="container">
            <div class="row">
                <div class="one half">
                    <h2 class="logo"><a href="member.php" target="_parent"><img src="img/8pos.jpeg" alt="GroundworkCSS">8PoS-Lab</a>
                    </h2>
                </div>
                <div class="one half">
                    <p class="small double-pad-top no-pad-small-tablet align-right align-left-small-tablet">
                        <a href="https://gsacademy.jp/fukuoka/" target="_parent">G's Fukuoka</a> -
                        DEV.7<br>
                        <!-- <a href="sign_up.php" target="_parent">sign-up</a></br> -->
                        <?= $output ?>さんログイン中<br>
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
                            <li><a href="self-analysis.php">analysis</a></li>
                            <li><a href="schedule.php">Schedule</a></li>
                        </ul>
                    </li>
                    <!-- list4 -->
                    <li><a href="gallery.php">Gallery</a></li>

                </ul>
            </nav>
        </div>
    </header>


    <div class="container">
        <!-- <div class="padded">
            <div class="row">
                <form action="#" method="post">
                    <fieldset>
                        <legend>Example HTML5 Form</legend>
                        <div class="row">
                            <div class="one half padded">
                                <label for="file">File</label>
                                <input id="file" type="file" placeholder="file">
                            </div>
                        </div>
                        <div class="row">
                            <div class="one half padded">
                                <label for="name">Enemy</label>
                                <input id="name" type="text" placeholder="enemy">
                            </div>
                        </div>
                        <div class="row">
                            <div class="one whole padded">
                                <label for="date">Date</label>
                                <input id="date" type="date" placeholder="date">
                            </div>
                        </div>

                        <div class="row">
                            <div class="one whole padded">
                                <label for="message">comment</label>
                                <textarea id="message" placeholder="Enter your message..."></textarea>
                            </div>
                        </div>

                    </fieldset>
                </form>

            </div>
        </div> -->
        <hr>

        <!-- <div class="align-right padded"><a href="#" class="gap-right">My Account <i class="icon-user"></i></a><a href="#" class="gap-right">View Cart <i class="icon-shopping-cart"></i></a><a href="#">Sign Out <i class="icon-signout"></i></a></div> -->
        <div class="row">
            <form action="file_upload.php" method="POST" enctype="multipart/form-data">

                ファイルアップロード
                <!-- <input type="file" name="upfile" accept="image/*" capture="camera"> -->
                <input type="file" id="file" style="display:none;" name="upfile" onchange="$('#fake_input_file').val($(this).val())">
                <input type="button" value="ファイル選択" name="upfile" onClick="$('#file').click();">
                <input id="fake_input_file" readonly type="text" name="upfile" accept="image/*" capture="camera" value="" onClick="$('#file').click();">
                <!-- <input type="submit" name="submit" value="送信" id="Submit"> -->

                <button>submit</button>
            </form>


            <!-- <aside class="one sixth padded bounceInLeft animated">
                <nav title="Shop by Category" role="menu" class="small-tablet nav vertical menu">
                    <ul>
                        <li class="one whole"><a>Nav item #1</a></li>
                        <li class="one whole"><a>Nav item #2</a></li>
                        <li class="one whole"><a>Nav item #3</a></li>
                        <li class="one whole"><a>Nav item #4</a></li>
                        <li class="one whole"><a>Nav item #5</a></li>
                    </ul>
                </nav>
            </aside> -->


            <article class="four second">
                <div class="row">
                    <div class="one sixth three-up-small-tablet two-up-mobile padded rotateIn animated">
                        <div class="box">
                            <h4 data-compression="7" data-max="20" class="responsive align-center zero">投稿日 1</h4><img src="http://via.placeholder.com/300x300/2ecc71/ffffff/&amp;text=投稿日+1">
                            <p class="truncate">
                            </p>
                            <p>投稿者名</p>
                        </div>
                    </div>
                    <div class="one sixth three-up-small-tablet two-up-mobile padded rotateIn animated">
                        <div class="box">
                            <h4 data-compression="7" data-max="20" class="responsive align-center zero">投稿日 2</h4><img src="http://via.placeholder.com/300x300/3498db/ffffff/&amp;text=投稿日+2">
                            <p class="truncate">
                            </p>
                            <p>投稿者名</p>
                        </div>
                    </div>
                    <div class="one sixth three-up-small-tablet two-up-mobile padded rotateIn animated">
                        <div class="box">
                            <h4 data-compression="7" data-max="20" class="responsive align-center zero">投稿日 3</h4><img src="http://via.placeholder.com/300x300/9b59b6/ffffff/&amp;text=投稿日+3">
                            <p class="truncate">
                            </p>
                            <p>投稿者名</p>
                        </div>
                    </div>
                    <div class="one sixth three-up-small-tablet two-up-mobile padded rotateIn animated">
                        <div class="box">
                            <h4 data-compression="7" data-max="20" class="responsive align-center zero">投稿日 4</h4><img src="http://via.placeholder.com/300x300/f1c40f/ffffff/&amp;text=投稿日+4">
                            <p class="truncate">
                            </p>
                            <p>投稿者名</p>
                        </div>
                    </div>
                    <div class="one sixth three-up-small-tablet two-up-mobile padded rotateIn animated">
                        <div class="box">
                            <h4 data-compression="7" data-max="20" class="responsive align-center zero">投稿日 5</h4><img src="http://via.placeholder.com/300x300/e67e22/ffffff/&amp;text=投稿日+5">
                            <p class="truncate">
                            </p>
                            <p>投稿者名</p>
                        </div>
                    </div>
                    <div class="one sixth three-up-small-tablet two-up-mobile padded rotateIn animated">
                        <div class="box">
                            <h4 data-compression="7" data-max="20" class="responsive align-center zero">投稿日 6</h4><img src="http://via.placeholder.com/300x300/e74c3c/ffffff/&amp;text=投稿日+6">
                            <p class="truncate">
                            </p>
                            <p>投稿者名</p>
                        </div>
                    </div>
                    <div class="one sixth three-up-small-tablet two-up-mobile padded rotateIn animated">
                        <div class="box">
                            <h4 data-compression="7" data-max="20" class="responsive align-center zero">投稿日 7</h4><img src="http://via.placeholder.com/300x300/f02475/ffffff/&amp;text=投稿日+7">
                            <p class="truncate">
                            </p>
                            <p>投稿者名</p>
                        </div>
                    </div>
                    <div class="one sixth three-up-small-tablet two-up-mobile padded rotateIn animated">
                        <div class="box">
                            <h4 data-compression="7" data-max="20" class="responsive align-center zero">投稿日 8</h4><img src="http://via.placeholder.com/300x300/1abc9c/ffffff/&amp;text=投稿日+8">
                            <p class="truncate">
                            </p>
                            <p>投稿者名</p>
                        </div>
                    </div>
                    <div class="one sixth three-up-small-tablet two-up-mobile padded bounceInDown animated">
                        <div class="box">
                            <h4 data-compression="7" data-max="20" class="responsive align-center zero">投稿日 9</h4><img src="http://via.placeholder.com/300x300/34495e/ffffff/&amp;text=投稿日+9">
                            <p class="truncate">
                            </p>
                            <p>投稿者名</p>
                        </div>
                    </div>
                    <div class="one sixth three-up-small-tablet two-up-mobile padded bounceInUp animated">
                        <div class="box">
                            <h4 data-compression="7" data-max="20" class="responsive align-center zero">投稿日 10</h4><img src="http://via.placeholder.com/300x300/2ecc71/ffffff/&amp;text=投稿日+10">
                            <p class="truncate">
                            </p>
                            <p>投稿者名</p>
                        </div>
                    </div>
                    <div class="one sixth three-up-small-tablet two-up-mobile padded rotateInDownRight animated">
                        <div class="box">
                            <h4 data-compression="7" data-max="20" class="responsive align-center zero">投稿日 11</h4><img src="http://via.placeholder.com/300x300/3498db/ffffff/&amp;text=投稿日+11">
                            <p class="truncate">
                            </p>
                            <p>投稿者名</p>
                        </div>
                    </div>
                    <div class="one sixth three-up-small-tablet two-up-mobile padded bounceInRight animated">
                        <div class="box">
                            <h4 data-compression="7" data-max="20" class="responsive align-center zero">投稿日 12</h4><img src="http://via.placeholder.com/300x300/f1c40f/ffffff/&amp;text=投稿日+12">
                            <p class="truncate">
                            </p>
                            <p>投稿者名</p>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>



    <footer class="gap-top bounceInUp animated">
        <div class="box square charcoal">
            <div class="container padded">
                <div class="row">
                    <div class="one small-tablet sixth padded">
                        <h5 class="green">Team Gallery</h5>
                        <ul class="unstyled">
                            <li><a href="fw_page.php">FW </a></li>
                            <li><a href="bk_page.php">BK</a></li>
                            <li><a href="all_member_page.php">Traning</a></li>
                            <li><a href="game_page.php">Game</a></li>
                        </ul>
                    </div>
                    <div class="three small-tablet fifths padded">
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
    <script type="text/javascript" src="js/groundwork.all.js"></script>
    <!-- google analytics-->
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
        _gaq.push(['_trackPageview']);
        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>
</body>

</html>