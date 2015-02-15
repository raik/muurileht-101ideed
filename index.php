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

  <link href='http://fonts.googleapis.com/css?family=Lato:400,900,400italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="styles/global.css">
</head>
<body>

<header class="global-header" role="banner">
  <div class="wrap wrap--header">
    <a href="index.php" class="logo">
      <img src="img/logo.svg" alt="Müürilehe variparlament ehk 101 ideed">
    </a>
  </div>
</header>
<!-- /.global-header -->

<?php

if (isset($_GET['idee'])) {

  include 'inc/single-post.php';

} else {

  include 'inc/home.php';

}

?>



</body>
</html>