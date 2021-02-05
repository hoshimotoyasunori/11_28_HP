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
                    <h2 class="logo"><a href="./" target="_parent"><img src="img/8pos.jpeg" alt="GroundworkCSS">8PoS-Lab</a>
                    </h2>
                </div>
                <div class="one half">
                    <p class="small double-pad-top no-pad-small-tablet align-right align-left-small-tablet">
                        <a href="https://gsacademy.jp/fukuoka/" target="_parent">G's Fukuoka</a> - DEV.7</br>
                </div>
            </div>

        </div>
    </header>


    <div class="container">
        <hr>
        <div class="padded">
            <div class="row">
                <div class="three fifths bounceInRight animated">
                    <h1 class="zero museo-slab">登録ページ</h1>
                </div>
                <div class="two fifths align-right-ipad align-right-desktop flipInX animated">
                    <p><a href="member.php" rel="prev" class="blue button">HOME</a></p>
                </div>
            </div>
        </div>
        <hr>
        <div class="padded">
            <div class="row">
                <div class="two second bounceInRight animated">

                    <section class="two fourths center-one padded bounceInDown animated">

                        <form action="sign_up_act.php" method="POST">
                            <fieldset>
                                <legend>選手登録画面</legend>
                                <div>
                                    name: <input type="text" name="username">
                                </div>
                                <div>
                                    mail: <input type="text" name="mail">
                                </div>
                                <div>
                                    position:
                                    <select name="position" id="">
                                        <option value="-">-</option>
                                        <option value="PR">PR</option>
                                        <option value="HO">HO</option>
                                        <option value="LO">LO</option>
                                        <option value="FL">FL</option>
                                        <option value="NO8">NO8</option>
                                        <option value="SH">SH</option>
                                        <option value="SO">SO</option>
                                        <option value="CB">CB</option>
                                        <option value="WTB">WTB</option>
                                        <option value="FB">FB</option>
                                        <option value="staff">staff</option>
                                    </select>
                                </div>
                                <div>
                                    password: <input type="password" name="password">
                                </div>
                                <br>
                                <div>
                                    <button>Register</button>
                                </div>
                            </fieldset>
                        </form>

                    </section>

                </div>
                <div class="two second bounceInRight animated">

                    <section class="two fourths center-one padded bounceInDown animated">


                        <form action="sign_up_kanri_act.php" method="POST">
                            <fieldset>
                                <legend>管理者登録画面</legend>
                                <div>
                                    name: <input type="text" name="username">
                                </div>
                                <div>
                                    mail: <input type="text" name="mail">
                                </div>
                                <div>
                                    position:
                                    <select name="position" id="">
                                        <option value="-">-</option>
                                        <option value="PR">PR</option>
                                        <option value="HO">HO</option>
                                        <option value="LO">LO</option>
                                        <option value="FL">FL</option>
                                        <option value="NO8">NO8</option>
                                        <option value="SH">SH</option>
                                        <option value="SO">SO</option>
                                        <option value="CB">CB</option>
                                        <option value="WTB">WTB</option>
                                        <option value="FB">FB</option>
                                        <option value="staff">staff</option>
                                    </select>
                                </div>
                                <div>
                                    password: <input type="password" name="password">
                                </div>
                                <br>
                                <div>
                                    <button>Register</button>
                                </div>
                            </fieldset>
                        </form>

                    </section>

                </div>
            </div>
        </div>






    </div>

    <!-- javascript-->
    <script type="text/javascript" src="js/groundwork.all.js"></script>


</body>

</html>