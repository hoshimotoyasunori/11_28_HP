<?php
session_start();
include("functions.php");
check_session_id();

// ユーザ名取得
$user_id = $_SESSION['id'];

// DB接続
$pdo = connect_to_db();

// いいね数カウント


// データ取得SQL作成
$sql = "SELECT username FROM users_table WHERE id = $user_id";
// $sql = "SELECT * FROM users_table LEFT OUTER JOIN (SELECT todo_id, COUNT(id) AS cnt FROM like_table GROUP BY todo_id) AS likes ON todo_table.id = likes.todo_id";
// "SELECT * FROM tablea LEFT OUTER JOIN tableb ON tablea.id = tableb.id";
// SQL準備&実行
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// データ登録処理後
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
    // <tr><td>deadline</td><td>todo</td><tr>の形になるようにforeachで順番に$outputへデータを追加
    // `.=`は後ろに文字列を追加する，の意味
    foreach ($result as $record) {
        $output = "<tr><td>{$record["username"]}</td></tr>";
        // $output .= "<tr>";
        // $output .= "<td>{$record["deadline"]}</td>";
        // $output .= "<td>{$record["todo"]}</td>";
        // $output .= "<td><a href='like_create.php?user_id={$user_id}&todo_id={$record["id"]}'>like{$record["cnt"]}</a></td>";
        // $output .= "<td><a href='todo_edit.php?id={$record["id"]}'>edit</a></td>";
        // $output .= "<td><a href='todo_delete.php?id={$record["id"]}'>delete</a></td>";
        // 画像出力を追加しよう
        // $output .= "<td><img src='{$record["image"]}' height='150px'></td>";
        // $output .= "</tr>";
    }
    // $valueの参照を解除する．解除しないと，再度foreachした場合に最初からループしない
    // 今回は以降foreachしないので影響なし
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
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
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
    <script type="text/javascript" src="js/jquery.snippet.min.js"></script>
    <link type="text/css" rel="stylesheet" href="css/jquery.snippet.css">
    <script type="text/javascript">
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
    </script>
</head>

<body>



    <header class="padded">
        <div class="container">
            <div class="row">
                <div class="one half">
                    <h2 class="logo"><a href="" target="_parent"><img src="img/8pos.jpeg" alt="GroundworkCSS">8PoS-Lab</a>
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
        <div class="padded">
            <div class="row">
                <div class="three fifths bounceInRight animated">
                    <h1 class="zero museo-slab">Team Build Up Tool</h1>
                    <p class="quicksand">チーム力を向上させるためにはハードワークと効率的な休息を取ることは
                        重要であり、チーム内の結束を高めることが不可欠なため効率の良いチームビルディングツールです。</p>
                </div>
                <!-- <div class="two fifths align-right-ipad align-right-desktop flipInX animated">
          <p class="quicksand">Example Layout 1 of 4</p>
          <p><a href="home.html" rel="prev" class="blue button">Back</a> <a href="layout-b.html" rel="next"
              class="green button">Next: Gallery </a></p>
        </div> -->
            </div>
        </div>
        <hr>
        <article class="row">
            <section class="two fourths right-one padded bounceInDown animated"><img src="img/dribun.png" alt="">
                <hr><img src="img/001.jpg" width="250px" height="130px" alt="" class="pull-left gap-right">
                <h1>動画分析ツール</h1>
                <p>スマホ/タブレット/PCなどで使えるようにし分析機能を搭載した自チームだけのコミュニケーションツールです。
                    選手自身も分析に取り組むことで何が理解できて、何が理解できていないのかコーチ・選手間との認識のずれに気づくことができ、共通理解を持つことで練習中やゲーム中でのコミュニケーションの質の向上に繋がります。</p>
                <!-- <p>
          <button class="asphalt">Read more</button>
        </p> -->
            </section>
            <aside class="one fourth left-two padded border-right bounceInLeft animated">
                <h1>FW item</h1>
                <div class="row">
                    <div class="one whole two-up-small-tablet one-up-mobile">
                        <ol class="list">
                            <li>Line out</li>
                            <li>Scrum</li>
                            <li>Kick off</li>
                            <li>Sign play</li>
                        </ol>
                    </div>
                    <!-- <div class="one whole two-up-small-tablet one-up-mobile">
            <ol class="list">
              <li>Ordered list item #1</li>
              <li>Ordered list item #2</li>
              <li>Ordered list item #3</li>
            </ol>
          </div> -->
                </div>
                <hr>
                <h3>FW Data Gallery</h3>
                <div class="row">
                    <div class="one half three-up-small-tablet two-up-mobile padded align-center">
                        <img src="http://via.placeholder.com/120x85/e67e22/ffffff/" alt=""></div>
                    <div class="one half three-up-small-tablet two-up-mobile padded align-center">
                        <img src="http://via.placeholder.com/120x85/e67e22/ffffff/" alt=""></div>
                    <div class="one half three-up-small-tablet two-up-mobile padded align-center">
                        <img src="http://via.placeholder.com/120x85/e67e22/ffffff/" alt=""></div>
                    <div class="one half three-up-small-tablet two-up-mobile padded align-center">
                        <img src="http://via.placeholder.com/120x85/e67e22/ffffff/" alt=""></div>
                    <div class="one half three-up-small-tablet two-up-mobile padded align-center">
                        <img src="http://via.placeholder.com/120x85/e67e22/ffffff/" alt=""></div>
                    <div class="one half three-up-small-tablet two-up-mobile padded align-center">
                        <img src="http://via.placeholder.com/120x85/e67e22/ffffff/" alt=""></div>
                </div>
                <div class="pad-right pad-left">
                    <p class="align-right">
                        <button class="orange">View more</button>
                    </p>
                </div>
            </aside>
            <aside class="one fourth padded border-left bounceInRight animated">
                <h1>BK item</h1>
                <div class="row">
                    <div class="one whole two-up-small-tablet one-up-mobile">
                        <ol class="list">
                            <li>Pass</li>
                            <li>Kick</li>
                            <li>Step</li>
                            <li>Sign play</li>
                        </ol>
                    </div>
                    <!-- <div class="one whole two-up-small-tablet one-up-mobile">
            <ol class="list">
              <li>Ordered list item #1</li>
              <li>Ordered list item #2</li>
              <li>Ordered list item #3</li>
            </ol>
          </div> -->
                </div>
                <hr>
                <h3>BK Data Gallery</h3>
                <div class="row">
                    <div class="one half three-up-small-tablet two-up-mobile padded align-center">
                        <img src="http://via.placeholder.com/120x85/e74c3c/ffffff/" alt=""></div>
                    <div class="one half three-up-small-tablet two-up-mobile padded align-center">
                        <img src="http://via.placeholder.com/120x85/e74c3c/ffffff/" alt=""></div>
                    <div class="one half three-up-small-tablet two-up-mobile padded align-center">
                        <img src="http://via.placeholder.com/120x85/e74c3c/ffffff/" alt=""></div>
                    <div class="one half three-up-small-tablet two-up-mobile padded align-center">
                        <img src="http://via.placeholder.com/120x85/e74c3c/ffffff/" alt=""></div>
                    <div class="one half three-up-small-tablet two-up-mobile padded align-center">
                        <img src="http://via.placeholder.com/120x85/e74c3c/ffffff/" alt=""></div>
                    <div class="one half three-up-small-tablet two-up-mobile padded align-center">
                        <img src="http://via.placeholder.com/120x85/e74c3c/ffffff/" alt=""></div>
                </div>
                <div class="pad-right pad-left">
                    <p class="align-right">
                        <button class="red">View more</button>
                    </p>
                </div>
            </aside>
        </article>
        <article class="row bounceInUp animated">
            <section class="one third padded">
                <h3>Section 1</h3>
                <div class="row">
                    <div class="two-up-small-tablet one-up-mobile align-center"><img src="img/splyza-team.png" width="380px" height="200px" alt=""></div>
                    <div class="two-up-small-tablet one-up-mobile">
                        <p class="padded no-pad-mobile">
                            実際の試合やトレーニングの動画を用いて、コーチを中心に行っていた分析を選手が主体的にい行うことによりプレーへの理解度向上、自主的なチームを作ることができ、各選手が分析を行っているので内容の濃いミーティングを行うことができるようになり、チーム力向上につながるツール。
                        </p>
                    </div>
                </div>
            </section>
            <section class="one third padded">
                <h3>Section 2</h3>
                <div class="row">
                    <div class="two-up-small-tablet one-up-mobile align-center"><img src="img/scrum.jpg" width="380px" height="200px" alt=""></div>
                    <div class="two-up-small-tablet one-up-mobile">
                        <p class="padded no-pad-mobile">
                            骨格分析を用いて、普段の練習の効率化を図ることができ、チーム内での意思疎通を容易にすることを目的とした解析ツール。伝えづらい、わかりにくい、感覚でしか伝えることができなかったことを可視化することでコミュニケーションを取る際の大幅な時間短縮をすることができ、効率のいいトレーニングを行うことができる。
                        </p>
                    </div>
                </div>
            </section>
            <section class="one third padded">
                <h3>Section 3</h3>
                <div class="row">
                    <div class="two-up-small-tablet one-up-mobile align-center"><img src="img/niconama.jpg" width="380px" height="200px" alt=""></div>
                    <div class="two-up-small-tablet one-up-mobile">
                        <p class="padded no-pad-mobile">
                            分析を行った動画を用いて、それを元にチャットを行うことができる。動画の再生と並行してコメントを残すことができることで味方がその時に何を考えていたのかがわかりやすくなり、更なるコミュニケーションの効率化が図ることができ、チーム力向上につながるteam
                            build
                            upツールになっている。
                    </div>
                </div>
            </section>
        </article>
    </div>
    <footer class="gap-top bounceInUp animated">
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
    <script type="text/javascript" src="js/groundwork.all.js"></script>


</body>

</html>