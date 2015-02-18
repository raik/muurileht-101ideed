  <meta property="og:image" content="http://muurileht.ee/101ideed/img/og.jpg" />
  <meta property="og:site_name" content="101 ideed / Müürileht"/>
  <meta property="og:type" content="article" />
  <meta property="article:publisher" content="https://www.facebook.com/muurileht" />
  <?php
    if(isset($_GET["_escaped_fragment_"])){

      // remove slash form querystring
      $query = substr($_GET["_escaped_fragment_"], 1);
      $file_path = $content_dir.$query.'.txt';

      if (in_array($file_path, $files)) {

        // parse the content of the file and divide it to two - header and body
        $fcontent = parse_article(file_get_contents($file_path));
        $fcontent_header = $fcontent['headers'];
        $fcontent_body = $fcontent['body'];

        // put yaml frontmatter into variables
        $header_name = $fcontent_header['nimi'];
        $body_title = substr(strtok($fcontent_body, "\n"), 2);
        $body_content = implode("\n", array_slice(explode("\n", $fcontent_body), 2));

        print '<meta property="og:title" content="'.$body_title.' / '.$header_name.'"/>';
        print '<meta property="og:description" content="'.$body_content.'"/>';

      }

    }
  ?>