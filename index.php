<?php

    if(isset($_GET["_escaped_fragment_"])){

      // remove slash form querystring
      $query = substr($_GET["_escaped_fragment_"], 1);

      if(strpos($_SERVER['HTTP_USER_AGENT'], 'facebookexternalhit') !== false) {

      } else {
        header('Location: http://muurileht.ee/101ideed/#!/'.$query.'', true, 301);
        exit;
      }

    }



 ?>


<?php
// import libs
include 'lib/yaml-parser.php';
include 'lib/parsedown.php';

$Parsedown = new Parsedown();

// settings
$content_dir = '_content/';
$files = glob($content_dir."*.txt");

?>

<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="UTF-8">
  <title>101 ideed / Müürileht</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,900,400italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="styles/magnific-popup.css">
  <link rel="stylesheet" href="styles/global.css">

  <?php include 'inc/fb-og.php'; ?>

</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=1620593521489479&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<header class="global-header" role="banner">
  <div class="wrap wrap--header">
    <a href="http://www.muurileht.ee/101ideed/" class="logo">
      <img src="img/logo.svg" alt="Müürilehe variparlament ehk 101 ideed">
    </a>

    <div class="header__social">

      <div class="fb-like" data-href="http://muurileht.ee/101ideed/" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>

      <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://muurileht.ee/101ideed/" data-via="muurileht" data-hashtags="101ideed">Tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

    </div>

  </div>
</header>
<!-- /.global-header -->

<?php

  include 'inc/home.php';


?>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
<script src="js/vendor/jquery.magnific-popup.min.js"></script>
<script src="js/vendor/jquery.lazyload.min.js"></script>
<script src="js/global.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-59876000-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>