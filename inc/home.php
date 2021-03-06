<div class="hero cf">

  <div class="wrap cf">

    <h1 class="hero__title">Müürilehe variparlament ehk 101 ideed</h1>

    <p>Mida sa teeksid, kui sul oleks võimalik parlamendi kõnepuldist välja käia üks idee, mis muudaks Eesti paremaks? Mida sa ütleksid? Müürileht pani sellesse olukorda 101 avaliku elu tegelast, kelle seas oli nii kirjanikke, ettevõtjaid, kodanikuaktiviste, näitlejaid, suhtekorraldajaid kui ka õppejõude. Neist inimestest moodustus Müürilehe variparlament. Variparlamendi kõnepuldis pole ükski idee liiga utoopiline, et seda välja hõigata, ega ükski mõte liiga kriitiline, et seda mõtlemata jätta. Lõpptulemuseks oli siiski konstruktiivne kriitika – kogum ideesid, mille üle võiks edasi arutada. Kõige parem on seda teha valimiseelsel perioodil, kui Eesti ühiskond võiks ideedest pulbitseda.</p>

  </div>
  <!-- /.wrap -->

</div>
<!-- /.hero -->

<div class="ideas">
  <div class="wrap wrap--large">

    <ul class="ideas-list">
      <?php

      foreach ($files as $file) {
        // get profile image from the filename... so please jpg :)
        $file_without_ext = basename($file,'.txt');
        $profile_img = $file_without_ext.'.jpg';

        // parse the content of the file and divide it to two - header and body
        $fcontent = parse_article(file_get_contents($file));
        $fcontent_header = $fcontent['headers'];
        $fcontent_body = $fcontent['body'];

        // put yaml frontmatter into variables
        $header_name = $fcontent_header['nimi'];
        $header_title = $fcontent_header['tiitel'];

        // take the first line from the content body and strip first two char '# '
        $body_title = substr(strtok($fcontent_body, "\n"), 2);

        // parse the body with markdown and return html
        $body_parsed = $Parsedown->text($fcontent_body);


        ?>

      <li class="ideas-list__item">
        <a href="#!/<?php echo $file_without_ext; ?>" data-mfp-src="#<?php echo $file_without_ext; ?>" class="ideas-list__item__inner">

          <img data-original="<?php echo $content_dir.$profile_img; ?>" alt="<?php echo $header_name; ?>" class="lazy ideas-list__item__img">

          <div class="ideas-list__item__content">
            <div class="ideas-list__item__meta">
              <p class="ideas-list__item__name"><?php echo $header_name; ?></p>
              <p class="ideas-list__item__title"><?php echo $header_title; ?></p>
            </div>

            <h2 class="ideas-list__item__heading"><?php echo $body_title; ?></h2>
          </div>

        </a>

        <div id="<?php echo $file_without_ext; ?>" class="article__content white-popup mfp-hide">


          <div class="article__author">

            <img data-original="<?php echo $content_dir.$profile_img; ?>" alt="<?php echo $header_name; ?>" class="lazy-article article__author__img">

            <p class="article__author__name"><?php echo $header_name; ?></p>
            <p class="article__author__title"><?php echo $header_title; ?></p>


          </div> <!-- .article__author -->






          <?php echo $body_parsed; ?>






          <div class="article__social">
          <?php
              $twitter_sharer = 'http://muurileht.ee/101ideed/#!/'.$file_without_ext.'';
              $fb_sharer = 'http://muurileht.ee/101ideed/#!/'.$file_without_ext.'';
          ?>
            <p class="article__social__cta">Jaga ideed:</p>
            <ul>
              <li><a href="http://twitter.com/intent/tweet?url=<?php echo urlencode($twitter_sharer); ?>">Twitter</a></li>
              <li><a href="http://www.facebook.com/sharer.php?u=<?php echo urlencode($fb_sharer); ?>">Facebook</a></li>
            </ul>

          </div>

        </div>









      </li>

      <?php } ?>
    </ul>

  </div> <!-- /.wrap -->
</div>
<!-- /.ideas -->