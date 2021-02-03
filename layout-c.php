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
          <h2 class="logo"><a href="/" target="_parent"><img src="img/8pos.jpeg" alt="GroundworkCSS">8PoS-Lab</a>
          </h2>
        </div>
        <div class="one half">
          <p class="small double-pad-top no-pad-small-tablet align-right align-left-small-tablet"><a href="https://github.com/groundworkcss/groundwork" target="_parent">Github Project</a> - Version
            2.5.0<br>Created & Maintained by <a href="http://twitter.com/ghepting" target="_blank">Gary Hepting</a></p>
        </div>
      </div>
      <nav role="navigation" class="nav gap-top">
        <ul role="menubar">
          <li><a href="./home.html"><i class="icon-home"></i> Home</a></li>
          <li role="menu">
            <button>Example Layouts</button>
            <ul>
              <li><a href="./layout-a.html">Web Page</a></li>
              <li><a href="./layout-b.html">Image Gallery</a></li>
              <li><a href="./layout-c.html">Ecommerce Page</a></li>
              <li><a href="./layout-d.html">Contact Page</a></li>
            </ul>
          </li>
          <li role="menu">
            <button>Documentation</button>
            <ul>
              <li><a href="./grid.html" title="Responsive grid system, grid adapters and helpers">Grid</a></li>
              <li><a href="./helpers.html" title="Layout helpers, spinners and much more">Helpers</a></li>
              <li><a href="./typography.html" title="Text elements, quotes, code and web fonts">Typography</a></li>
              <li role="menu">
                <button title="Navigation, buttons, boxes, message boxes, tables, tabs, and forms">UI Elements</button>
                <ul>
                  <li><a href="./navigation.html" title="Navigation">Navigation</a></li>
                  <li><a href="./buttons.html" title="Buttons, button groups, button menus">Buttons</a></li>
                  <li><a href="./boxes.html" title="Boxes">Boxes</a></li>
                  <li><a href="./messages.html" title="Message boxes">Message Boxes</a></li>
                  <li><a href="./tables.html" title="Tables">Tables</a></li>
                  <li><a href="./tabs.html" title="Tabs">Tabs</a></li>
                  <li><a href="./forms.html" title="Form elements">Form Elements</a></li>
                </ul>
              </li>
              <li><a href="./icons.html" title="Icons">Icons</a></li>
              <li><a href="./responsive-text.html" title="Responsive text and multi-line text block truncation">Responsive Text</a></li>
              <li><a href="./placeholder-text.html" title="Placeholder text and placeholder fonts for rapid prototyping and wireframes">Placeholder
                  Text</a></li>
              <li><a href="./animations.html" title="Pure CSS3 Animations">Animations</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </header>



  <div class="container">
    <div class="padded">
      <div class="row">
        <form action="file_upload.php" method="POST" enctype="multipart/form-data">

          ファイルアップロード
          <input type="button" value="ファイル選択" />
          <input type="file" name="upfile" accept="image/*" capture="camera">


          <button>submit</button>


        </form>

      </div>
    </div>
    <hr>
    <div class="align-right padded"><a href="#" class="gap-right">My Account <i class="icon-user"></i></a><a href="#" class="gap-right">View Cart <i class="icon-shopping-cart"></i></a><a href="#">Sign Out <i class="icon-signout"></i></a></div>
    <div class="row">


      <aside class="one fifth padded bounceInLeft animated">
        <nav title="Shop by Category" role="menu" class="small-tablet nav vertical menu">
          <ul>
            <li class="one whole"><a>Nav item #1</a></li>
            <li class="one whole"><a>Nav item #2</a></li>
            <li class="one whole"><a>Nav item #3</a></li>
            <li class="one whole"><a>Nav item #4</a></li>
            <li class="one whole"><a>Nav item #5</a></li>
          </ul>
        </nav>
      </aside>


      <article class="four fifths">
        <div class="row">
          <div class="one fourth three-up-small-tablet two-up-mobile padded bounceInDown animated">
            <div class="box">
              <h4 data-compression="7" data-max="20" class="responsive align-center zero">Product 1</h4><img src="http://via.placeholder.com/300x300/2ecc71/ffffff/&amp;text=Product+1">
              <p class="truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.</p>
              <p>$8.00 USD<i class="icon-shopping-cart pull-right large"></i></p>
            </div>
          </div>
          <div class="one fourth three-up-small-tablet two-up-mobile padded bounceInUp animated">
            <div class="box">
              <h4 data-compression="7" data-max="20" class="responsive align-center zero">Product 2</h4><img src="http://via.placeholder.com/300x300/3498db/ffffff/&amp;text=Product+2">
              <p class="truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.</p>
              <p>$8.00 USD<i class="icon-shopping-cart pull-right large"></i></p>
            </div>
          </div>
          <div class="one fourth three-up-small-tablet two-up-mobile padded rotateInDownRight animated">
            <div class="box">
              <h4 data-compression="7" data-max="20" class="responsive align-center zero">Product 3</h4><img src="http://via.placeholder.com/300x300/9b59b6/ffffff/&amp;text=Product+3">
              <p class="truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.</p>
              <p>$8.00 USD<i class="icon-shopping-cart pull-right large"></i></p>
            </div>
          </div>
          <div class="one fourth three-up-small-tablet two-up-mobile padded bounceInRight animated">
            <div class="box">
              <h4 data-compression="7" data-max="20" class="responsive align-center zero">Product 4</h4><img src="http://via.placeholder.com/300x300/f1c40f/ffffff/&amp;text=Product+4">
              <p class="truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.</p>
              <p>$8.00 USD<i class="icon-shopping-cart pull-right large"></i></p>
            </div>
          </div>
          <div class="one fourth three-up-small-tablet two-up-mobile padded bounceInDown animated">
            <div class="box">
              <h4 data-compression="7" data-max="20" class="responsive align-center zero">Product 5</h4><img src="http://via.placeholder.com/300x300/e67e22/ffffff/&amp;text=Product+5">
              <p class="truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.</p>
              <p>$8.00 USD<i class="icon-shopping-cart pull-right large"></i></p>
            </div>
          </div>
          <div class="one fourth three-up-small-tablet two-up-mobile padded bounceInUp animated">
            <div class="box">
              <h4 data-compression="7" data-max="20" class="responsive align-center zero">Product 6</h4><img src="http://via.placeholder.com/300x300/e74c3c/ffffff/&amp;text=Product+6">
              <p class="truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.</p>
              <p>$8.00 USD<i class="icon-shopping-cart pull-right large"></i></p>
            </div>
          </div>
          <div class="one fourth three-up-small-tablet two-up-mobile padded rotateInDownRight animated">
            <div class="box">
              <h4 data-compression="7" data-max="20" class="responsive align-center zero">Product 7</h4><img src="http://via.placeholder.com/300x300/f02475/ffffff/&amp;text=Product+7">
              <p class="truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.</p>
              <p>$8.00 USD<i class="icon-shopping-cart pull-right large"></i></p>
            </div>
          </div>
          <div class="one fourth three-up-small-tablet two-up-mobile padded bounceInRight animated">
            <div class="box">
              <h4 data-compression="7" data-max="20" class="responsive align-center zero">Product 8</h4><img src="http://via.placeholder.com/300x300/1abc9c/ffffff/&amp;text=Product+8">
              <p class="truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.</p>
              <p>$8.00 USD<i class="icon-shopping-cart pull-right large"></i></p>
            </div>
          </div>
          <div class="one fourth three-up-small-tablet two-up-mobile padded bounceInDown animated">
            <div class="box">
              <h4 data-compression="7" data-max="20" class="responsive align-center zero">Product 9</h4><img src="http://via.placeholder.com/300x300/34495e/ffffff/&amp;text=Product+9">
              <p class="truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.</p>
              <p>$8.00 USD<i class="icon-shopping-cart pull-right large"></i></p>
            </div>
          </div>
          <div class="one fourth three-up-small-tablet two-up-mobile padded bounceInUp animated">
            <div class="box">
              <h4 data-compression="7" data-max="20" class="responsive align-center zero">Product 10</h4><img src="http://via.placeholder.com/300x300/2ecc71/ffffff/&amp;text=Product+10">
              <p class="truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.</p>
              <p>$8.00 USD<i class="icon-shopping-cart pull-right large"></i></p>
            </div>
          </div>
          <div class="one fourth three-up-small-tablet two-up-mobile padded rotateInDownRight animated">
            <div class="box">
              <h4 data-compression="7" data-max="20" class="responsive align-center zero">Product 11</h4><img src="http://via.placeholder.com/300x300/3498db/ffffff/&amp;text=Product+11">
              <p class="truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.</p>
              <p>$8.00 USD<i class="icon-shopping-cart pull-right large"></i></p>
            </div>
          </div>
          <div class="one fourth three-up-small-tablet two-up-mobile padded bounceInRight animated">
            <div class="box">
              <h4 data-compression="7" data-max="20" class="responsive align-center zero">Product 12</h4><img src="http://via.placeholder.com/300x300/f1c40f/ffffff/&amp;text=Product+12">
              <p class="truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.</p>
              <p>$8.00 USD<i class="icon-shopping-cart pull-right large"></i></p>
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