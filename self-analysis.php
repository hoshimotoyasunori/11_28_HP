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
    <link rel="stylesheet" href="css/chart.css">

    <title>MINDset</title>
</head>

<body>
    <header class="padded">
        <div class="container">
            <div class="row">
                <div class="one half">
                    <h2 class="logo"><a href="index.html" target="_parent"><img src="img/8pos.jpeg" alt="GroundworkCSS">8PoS-Lab</a>
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
    <!-- <header>
        <h1 class="title">Always Ask "Why me ?" </h1>
        <ul class="list">
            <li id="clear">All Clear</li>
            <li id="restart"><a href="./index.html">restart</a></li>
        </ul>
    </header> -->
    <main id="data">
        <div class="box">
            <!-- 表の上の列-->
            <table>
                <!-- 表の上の左-->
                <tr>
                    <td class="td"><textarea id="sub_1_1"></textarea></td>
                    <td class="td"><textarea id="sub_1_2"></textarea></td>
                    <td class="td"><textarea id="sub_1_3"></textarea></td>

                </tr>
                <tr>
                    <td class="td"><textarea id="sub_1_4"></textarea></td>
                    <td class="td"><textarea id="sub_1" class="sub_target1" placeholder="目標"></textarea>
                    </td>
                    <td class="td"><textarea id="sub_1_5"></textarea></td>
                </tr>
                <tr>
                    <td class="td"><textarea id="sub_1_6"></textarea></td>
                    <td class="td"><textarea id="sub_1_7"></textarea></td>
                    <td class="td"><textarea id="sub_1_8"></textarea></td>
                </tr>
            </table>
            <table>
                <!-- 表の上の真ん中-->
                <tr>
                    <td class="td"><textarea id="sub_2_1"></textarea></td>
                    <td class="td"><textarea id="sub_2_2"></textarea></td>
                    <td class="td"><textarea id="sub_2_3"></textarea></td>
                </tr>
                <tr>
                    <td class="td"><textarea id="sub_2_4"></textarea></td>
                    <td class="td"><textarea id="sub_2" class="sub_target2" placeholder="目標"></textarea>
                    </td>
                    <td class="td"><textarea id="sub_2_5"></textarea></td>
                </tr>
                <tr>
                    <td class="td"><textarea id="sub_2_6"></textarea></td>
                    <td class="td"><textarea id="sub_2_7"></textarea></td>
                    <td class="td"><textarea id="sub_2_8"></textarea></td>
                </tr>
            </table>
            <table>
                <!-- 表の上の右-->
                <tr>
                    <td class="td"><textarea id="sub_3_1"></textarea></td>
                    <td class="td"><textarea id="sub_3_2"></textarea></td>
                    <td class="td"><textarea id="sub_3_3"></textarea></td>
                </tr>
                <tr>
                    <td class="td"><textarea id="sub_3_4"></textarea></td>
                    <td class="td"><textarea id="sub_3" class="sub_target3" placeholder="目標"></textarea>
                    <td class="td"><textarea id="sub_3_5"></textarea></td>
                </tr>
                <tr>
                    <td class="td"><textarea id="sub_3_6"></textarea></td>
                    <td class="td"><textarea id="sub_3_7"></textarea></td>
                    <td class="td"><textarea id="sub_3_8"></textarea></td>
                </tr>
            </table>
        </div>
        <div class="box">
            <!-- 表の2番目の列-->
            <table>
                <!-- 表の2番目の左-->
                <tr>
                    <td class="td"><textarea id="sub_4_1"></textarea></td>
                    <td class="td"><textarea id="sub_4_2"></textarea></td>
                    <td class="td"><textarea id="sub_4_3"></textarea></td>
                </tr>
                <tr>
                    <td class="td"><textarea id="sub_4_4"></textarea></td>
                    <td class="td"><textarea id="sub_4" class="sub_target4" style="border:none" placeholder="目標"></textarea>
                    </td>
                    <td class="td"><textarea id="sub_4_5"></textarea></td>
                </tr>
                <tr>
                    <td class="td"><textarea id="sub_4_6"></textarea></td>
                    <td class="td"><textarea id="sub_4_7"></textarea></td>
                    <td class="td"><textarea id="sub_4_8"></textarea></td>
                </tr>
            </table>
            <table>
                <!-- 表の2番目の真ん中-->
                <tr>
                    <td class="td"><textarea id="sub_target1" class="sub_target1" placeholder="目標"></textarea>
                    </td>
                    <td class="td"><textarea id="sub_target2" class="sub_target2" placeholder="目標"></textarea>
                    </td>
                    <td class="td"><textarea id="sub_target3" class="sub_target3" placeholder="目標"></textarea>
                    </td>
                </tr>
                <tr>
                    <td class="td"><textarea id="sub_target4" class="sub_target4" placeholder="目標"></textarea>
                    </td>
                    <td class="td"><textarea id="main_target" class="main_target" placeholder="目的" autofocus></textarea>
                    </td>
                    <td class="td"><textarea id="sub_target5" class="sub_target5" placeholder="目標"></textarea>
                    </td>
                </tr>
                <tr>
                    <td class="td"><textarea id="sub_target6" class="sub_target6" placeholder="目標"></textarea>
                    </td>
                    <td class="td"><textarea id="sub_target7" class="sub_target7" placeholder="目標"></textarea>
                    </td>
                    <td class="td"><textarea id="sub_target8" class="sub_target8" placeholder="目標"></textarea>
                    </td>
                </tr>
            </table>
            <table>
                <!-- 表の2番目の右-->
                <tr>
                    <td class="td"><textarea id="sub_5_1"></textarea></td>
                    <td class="td"><textarea id="sub_5_2"></textarea></td>
                    <td class="td"><textarea id="sub_5_3"></textarea></td>
                </tr>
                <tr>
                    <td class="td"><textarea id="sub_5_4"></textarea></td>
                    <td class="td"><textarea id="sub_5" class="sub_target5" placeholder="目標"></textarea>
                    <td class="td"><textarea id="sub_5_5"></textarea></td>
                </tr>
                <tr>
                    <td class="td"><textarea id="sub_5_6"></textarea></td>
                    <td class="td"><textarea id="sub_5_7"></textarea></td>
                    <td class="td"><textarea id="sub_5_8"></textarea></td>
            </table>
        </div>
        <div class="box">
            <!-- 表の3番目の列-->
            <table>
                <!-- 表の3番目の左-->
                <tr>
                    <td class="td"><textarea id="sub_6_1"></textarea></td>
                    <td class="td"><textarea id="sub_6_2"></textarea></td>
                    <td class="td"><textarea id="sub_6_3"></textarea></td>
                </tr>
                <tr>
                    <td class="td"><textarea id="sub_6_4"></textarea></td>
                    <td class="td"><textarea id="sub_6" class="sub_target6" placeholder="目標"></textarea>
                    <td class="td"><textarea id="sub_6_5"></textarea></td>
                </tr>
                <tr>
                    <td class="td"><textarea id="sub_6_6"></textarea></td>
                    <td class="td"><textarea id="sub_6_7"></textarea></td>
                    <td class="td"><textarea id="sub_6_8"></textarea></td>
                </tr>
            </table>
            <table>
                <!-- 表の3番目の真ん中-->
                <tr>
                    <td class="td"><textarea id="sub_7_1"></textarea></td>
                    <td class="td"><textarea id="sub_7_2"></textarea></td>
                    <td class="td"><textarea id="sub_7_3"></textarea></td>
                </tr>
                <tr>
                    <td class="td"><textarea id="sub_7_4"></textarea></td>
                    <td class="td"><textarea id="sub_7" class="sub_target7" placeholder="目標"></textarea>
                    </td>
                    <td class="td"><textarea id="sub_7_5"></textarea></td>
                </tr>
                <tr>
                    <td class="td"><textarea id="sub_7_6"></textarea></td>
                    <td class="td"><textarea id="sub_7_7"></textarea></td>
                    <td class="td"><textarea id="sub_7_8"></textarea></td>
                </tr>
            </table>
            <table>
                <!-- 表の3番目の右-->
                <tr>
                    <td class="td"><textarea id="sub_8_1"></textarea></td>
                    <td class="td"><textarea id="sub_8_2"></textarea></td>
                    <td class="td"><textarea id="sub_8_3"></textarea></td>
                </tr>
                <tr>
                    <td class="td"><textarea id="sub_8_4"></textarea></td>
                    <td class="td"><textarea id="sub_8" class="sub_target8" placeholder="目標"></textarea>
                    </td>
                    <td class="td"><textarea id="sub_8_5"></textarea></td>
                </tr>
                <tr>
                    <td class="td"><textarea id="sub_8_6"></textarea></td>
                    <td class="td"><textarea id="sub_8_7"></textarea></td>
                    <td class="td"><textarea id="sub_8_8"></textarea></td>
                </tr>
            </table>
        </div>
    </main>

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
    <script type="text/javascript" src="js/groundwork.all.js"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script> -->
    <script>
        /////////////////////////////// main_target//////////////////////////////////
        $(function() {
            //1.Save クリックイベント
            $('textarea').keyup(function() {
                const data = {

                    main: $('#main_target').val(),
                    sub1: $('#sub_target1').val(),
                    sub2: $('#sub_target2').val(),
                    sub3: $('#sub_target3').val(),
                    sub4: $('#sub_target4').val(),
                    sub5: $('#sub_target5').val(),
                    sub6: $('#sub_target6').val(),
                    sub7: $('#sub_target7').val(),
                    sub8: $('#sub_target8').val(),
                    ////////////あってもなくても///////////////////////
                    // sub_1: $('#sub_1').val(),
                    // sub_2: $('#sub_2').val(),
                    // sub_3: $('#sub_3').val(),
                    // sub_4: $('#sub_4').val(),
                    // sub_5: $('#sub_5').val(),
                    // sub_6: $('#sub_6').val(),
                    // sub_7: $('#sub_7').val(),
                    // sub_8: $('#sub_8').val(),
                    sub_1_1: $('#sub_1_1').val(),
                    sub_1_2: $('#sub_1_2').val(),
                    sub_1_3: $('#sub_1_3').val(),
                    sub_1_4: $('#sub_1_4').val(),
                    sub_1_5: $('#sub_1_5').val(),
                    sub_1_6: $('#sub_1_6').val(),
                    sub_1_7: $('#sub_1_7').val(),
                    sub_1_8: $('#sub_1_8').val(),
                    sub_2_1: $('#sub_2_1').val(),
                    sub_2_2: $('#sub_2_2').val(),
                    sub_2_3: $('#sub_2_3').val(),
                    sub_2_4: $('#sub_2_4').val(),
                    sub_2_5: $('#sub_2_5').val(),
                    sub_2_6: $('#sub_2_6').val(),
                    sub_2_7: $('#sub_2_7').val(),
                    sub_2_8: $('#sub_2_8').val(),
                    sub_3_1: $('#sub_3_1').val(),
                    sub_3_2: $('#sub_3_2').val(),
                    sub_3_3: $('#sub_3_3').val(),
                    sub_3_4: $('#sub_3_4').val(),
                    sub_3_5: $('#sub_3_5').val(),
                    sub_3_6: $('#sub_3_6').val(),
                    sub_3_7: $('#sub_3_7').val(),
                    sub_3_8: $('#sub_3_8').val(),
                    sub_4_1: $('#sub_4_1').val(),
                    sub_4_2: $('#sub_4_2').val(),
                    sub_4_3: $('#sub_4_3').val(),
                    sub_4_4: $('#sub_4_4').val(),
                    sub_4_5: $('#sub_4_5').val(),
                    sub_4_6: $('#sub_4_6').val(),
                    sub_4_7: $('#sub_4_7').val(),
                    sub_4_8: $('#sub_4_8').val(),
                    sub_5_1: $('#sub_5_1').val(),
                    sub_5_2: $('#sub_5_2').val(),
                    sub_5_3: $('#sub_5_3').val(),
                    sub_5_4: $('#sub_5_4').val(),
                    sub_5_5: $('#sub_5_5').val(),
                    sub_5_6: $('#sub_5_6').val(),
                    sub_5_7: $('#sub_5_7').val(),
                    sub_5_8: $('#sub_5_8').val(),
                    sub_6_1: $('#sub_6_1').val(),
                    sub_6_2: $('#sub_6_2').val(),
                    sub_6_3: $('#sub_6_3').val(),
                    sub_6_4: $('#sub_6_4').val(),
                    sub_6_5: $('#sub_6_5').val(),
                    sub_6_6: $('#sub_6_6').val(),
                    sub_6_7: $('#sub_6_7').val(),
                    sub_6_8: $('#sub_6_8').val(),
                    sub_7_1: $('#sub_7_1').val(),
                    sub_7_2: $('#sub_7_2').val(),
                    sub_7_3: $('#sub_7_3').val(),
                    sub_7_4: $('#sub_7_4').val(),
                    sub_7_5: $('#sub_7_5').val(),
                    sub_7_6: $('#sub_7_6').val(),
                    sub_7_7: $('#sub_7_7').val(),
                    sub_7_8: $('#sub_7_8').val(),
                    sub_8_1: $('#sub_8_1').val(),
                    sub_8_2: $('#sub_8_2').val(),
                    sub_8_3: $('#sub_8_3').val(),
                    sub_8_4: $('#sub_8_4').val(),
                    sub_8_5: $('#sub_8_5').val(),
                    sub_8_6: $('#sub_8_6').val(),
                    sub_8_7: $('#sub_8_7').val(),
                    sub_8_8: $('#sub_8_8').val(),
                }
                console.log(data);
                const jasonData = JSON.stringify(data);
                console.log(jasonData);
                localStorage.setItem('memo', jasonData);
                // localStorage.setItem('memo', text);



                $('#sub_target1').keyup(function() {
                    let data = document.getElementById("sub_target1").value;
                    document.getElementById("sub_1").value = data;
                })
                $('#sub_target2').keyup(function() {
                    let data = document.getElementById("sub_target2").value;
                    document.getElementById("sub_2").value = data;
                })
                $('#sub_target3').keyup(function() {
                    let data = document.getElementById("sub_target3").value;
                    document.getElementById("sub_3").value = data;
                })
                $('#sub_target4').keyup(function() {
                    let data = document.getElementById("sub_target4").value;
                    document.getElementById("sub_4").value = data;
                })
                $('#sub_target5').keyup(function() {
                    let data = document.getElementById("sub_target5").value;
                    document.getElementById("sub_5").value = data;
                })
                $('#sub_target6').keyup(function() {
                    let data = document.getElementById("sub_target6").value;
                    document.getElementById("sub_6").value = data;
                })
                $('#sub_target7').keyup(function() {
                    let data = document.getElementById("sub_target7").value;
                    document.getElementById("sub_7").value = data;
                })
                $('#sub_target8').keyup(function() {
                    let data = document.getElementById("sub_target8").value;
                    document.getElementById("sub_8").value = data;
                })
            });

            // getValue();
            // const $formObject = document.getElementById("sub_target1");
            // for (const $i = 0; $i < $formObject.length; $i++) {
            //     $formObject.elements[$i].onkeyup = function () {
            //         getValue();
            //     };
            //     $formObject.elements[$i].onchange = function () {
            //         getValue();
            //     };
            // }
            // document.getElementById("sub_1").innerHTML = $formObject.length;

            // function getValue() {
            //     const $formObject = document.getElementById("sub_target1").value;
            //     console.log($formObject);
            //     document.getElementById("sub_1").value = $formObject;

            //2.clear クリックイベント
            $('#clear').on('click', function() {
                localStorage.removeItem('memo');

                $('#main_target').val('')
                $('#sub_target1').val('')
                $('#sub_target2').val('')
                $('#sub_target3').val('')
                $('#sub_target4').val('')
                $('#sub_target5').val('')
                $('#sub_target6').val('')
                $('#sub_target7').val('')
                $('#sub_target8').val('')
                ////////////あってもなくても///////////////////////
                // $('#sub_1').val('')
                // $('#sub_2').val('')
                // $('#sub_3').val('')
                // $('#sub_4').val('')
                // $('#sub_5').val('')
                // $('#sub_6').val('')
                // $('#sub_7').val('')
                // $('#sub_8').val('')
                $('#sub_1_1').val('')
                $('#sub_1_2').val('')
                $('#sub_1_3').val('')
                $('#sub_1_4').val('')
                $('#sub_1_5').val('')
                $('#sub_1_6').val('')
                $('#sub_1_7').val('')
                $('#sub_1_8').val('')
                $('#sub_1_1').val('')
                $('#sub_2_2').val('')
                $('#sub_2_3').val('')
                $('#sub_2_4').val('')
                $('#sub_2_5').val('')
                $('#sub_2_6').val('')
                $('#sub_2_7').val('')
                $('#sub_2_8').val('')
                $('#sub_3_1').val('')
                $('#sub_3_2').val('')
                $('#sub_3_3').val('')
                $('#sub_3_4').val('')
                $('#sub_3_5').val('')
                $('#sub_3_6').val('')
                $('#sub_3_7').val('')
                $('#sub_3_8').val('')
                $('#sub_4_1').val('')
                $('#sub_4_2').val('')
                $('#sub_4_3').val('')
                $('#sub_4_4').val('')
                $('#sub_4_5').val('')
                $('#sub_4_6').val('')
                $('#sub_4_7').val('')
                $('#sub_4_8').val('')
                $('#sub_5_1').val('')
                $('#sub_5_2').val('')
                $('#sub_5_3').val('')
                $('#sub_5_4').val('')
                $('#sub_5_5').val('')
                $('#sub_5_6').val('')
                $('#sub_5_7').val('')
                $('#sub_5_8').val('')
                $('#sub_6_1').val('')
                $('#sub_6_2').val('')
                $('#sub_6_3').val('')
                $('#sub_6_4').val('')
                $('#sub_6_5').val('')
                $('#sub_6_6').val('')
                $('#sub_6_7').val('')
                $('#sub_6_8').val('')
                $('#sub_7_1').val('')
                $('#sub_7_2').val('')
                $('#sub_7_3').val('')
                $('#sub_7_4').val('')
                $('#sub_7_5').val('')
                $('#sub_7_6').val('')
                $('#sub_7_7').val('')
                $('#sub_7_8').val('')
                $('#sub_8_1').val('')
                $('#sub_8_2').val('')
                $('#sub_8_3').val('')
                $('#sub_8_4').val('')
                $('#sub_8_5').val('')
                $('#sub_8_6').val('')
                $('#sub_8_7').val('')
                $('#sub_8_8').val('')
            });
            //3.ページ読み込み：保存データ取得表示
            if (localStorage.getItem('memo')) {
                const jasonData = localStorage.getItem('memo');
                console.log(jasonData);
                const data = JSON.parse(jasonData);
                console.log(data);

                $('#main_target').val(data.main);
                $('#sub_target1').val(data.sub1);
                $('#sub_target2').val(data.sub2);
                $('#sub_target3').val(data.sub3);
                $('#sub_target4').val(data.sub4);
                $('#sub_target5').val(data.sub5);
                $('#sub_target6').val(data.sub6);
                $('#sub_target7').val(data.sub7);
                $('#sub_target8').val(data.sub8);
                $('#sub_1').val(data.sub1);
                $('#sub_2').val(data.sub2);
                $('#sub_3').val(data.sub3);
                $('#sub_4').val(data.sub4);
                $('#sub_5').val(data.sub5);
                $('#sub_6').val(data.sub6);
                $('#sub_7').val(data.sub7);
                $('#sub_8').val(data.sub8);
                $('#sub_1_1').val(data.sub_1_1);
                $('#sub_1_2').val(data.sub_1_2);
                $('#sub_1_3').val(data.sub_1_3);
                $('#sub_1_4').val(data.sub_1_4);
                $('#sub_1_5').val(data.sub_1_5);
                $('#sub_1_6').val(data.sub_1_6);
                $('#sub_1_7').val(data.sub_1_7);
                $('#sub_1_8').val(data.sub_1_8);
                $('#sub_2_1').val(data.sub_2_1);
                $('#sub_2_2').val(data.sub_2_2);
                $('#sub_2_3').val(data.sub_2_3);
                $('#sub_2_4').val(data.sub_2_4);
                $('#sub_2_5').val(data.sub_2_5);
                $('#sub_2_6').val(data.sub_2_6);
                $('#sub_2_7').val(data.sub_2_7);
                $('#sub_2_8').val(data.sub_2_8);
                $('#sub_3_1').val(data.sub_3_1);
                $('#sub_3_2').val(data.sub_3_2);
                $('#sub_3_3').val(data.sub_3_3);
                $('#sub_3_4').val(data.sub_3_4);
                $('#sub_3_5').val(data.sub_3_5);
                $('#sub_3_6').val(data.sub_3_6);
                $('#sub_3_7').val(data.sub_3_7);
                $('#sub_3_8').val(data.sub_3_8);
                $('#sub_4_1').val(data.sub_4_1);
                $('#sub_4_2').val(data.sub_4_2);
                $('#sub_4_3').val(data.sub_4_3);
                $('#sub_4_4').val(data.sub_4_4);
                $('#sub_4_5').val(data.sub_4_5);
                $('#sub_4_6').val(data.sub_4_6);
                $('#sub_4_7').val(data.sub_4_7);
                $('#sub_4_8').val(data.sub_4_8);
                $('#sub_5_1').val(data.sub_5_1);
                $('#sub_5_2').val(data.sub_5_2);
                $('#sub_5_3').val(data.sub_5_3);
                $('#sub_5_4').val(data.sub_5_4);
                $('#sub_5_5').val(data.sub_5_5);
                $('#sub_5_6').val(data.sub_5_6);
                $('#sub_5_7').val(data.sub_5_7);
                $('#sub_5_8').val(data.sub_5_8);
                $('#sub_6_1').val(data.sub_6_1);
                $('#sub_6_2').val(data.sub_6_2);
                $('#sub_6_3').val(data.sub_6_3);
                $('#sub_6_4').val(data.sub_6_4);
                $('#sub_6_5').val(data.sub_6_5);
                $('#sub_6_6').val(data.sub_6_6);
                $('#sub_6_7').val(data.sub_6_7);
                $('#sub_6_8').val(data.sub_6_8);
                $('#sub_7_1').val(data.sub_7_1);
                $('#sub_7_2').val(data.sub_7_2);
                $('#sub_7_3').val(data.sub_7_3);
                $('#sub_7_4').val(data.sub_7_4);
                $('#sub_7_5').val(data.sub_7_5);
                $('#sub_7_6').val(data.sub_7_6);
                $('#sub_7_7').val(data.sub_7_7);
                $('#sub_7_8').val(data.sub_7_8);
                $('#sub_8_1').val(data.sub_8_1);
                $('#sub_8_2').val(data.sub_8_2);
                $('#sub_8_3').val(data.sub_8_3);
                $('#sub_8_4').val(data.sub_8_4);
                $('#sub_8_5').val(data.sub_8_5);
                $('#sub_8_6').val(data.sub_8_6);
                $('#sub_8_7').val(data.sub_8_7);
                $('#sub_8_8').val(data.sub_8_8);
            }
        });
    </script>
</body>

</html>