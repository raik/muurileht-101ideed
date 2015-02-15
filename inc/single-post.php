<article class="single">
  <div class="wrap">

<?php

$query = $_GET["idee"];
$file_path = $content_dir.$query.'.txt';

if (in_array($file_path, $files)) {

  // parse the content of the file and divide it to two - header and body
  $fcontent = parse_article(file_get_contents($file_path));
  $fcontent_header = $fcontent['headers'];
  $fcontent_body = $fcontent['body'];

  // put yaml frontmatter into variables
  $header_name = $fcontent_header['nimi'];
  $header_title = $fcontent_header['tiitel'];

  // parse the body with markdown and return html
  $body_parsed = $Parsedown->text($fcontent_body);



  $profile_img = $content_dir.$query.'.jpg';
  // echo '<img src="'.$profile_img.'">';
  // echo "<br>";
  // echo "<br>";
  // echo $header_name;
  // echo "<br>";
  // echo $header_title;
  // echo "<br>";

  ?>

  <div class="article__author">
    <?php echo '<img class="article__author__img" src="'.$profile_img.'">'; ?>
    <p class="article__author__name"><?php echo $header_name; ?></p>
    <p class="article__author__title"><?php echo $header_title; ?></p>
  </div>

  <div class="article__content">
    <?php echo $body_parsed; ?>
  </div>


  <?php

  } else {

  echo '<code>Kes?</code>';

  }

?>
  </div>
  <!-- /.wrap -->
</article>
<!-- /.single -->