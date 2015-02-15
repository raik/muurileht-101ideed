<div class="hero cf">

  <div class="wrap cf">

    <h1 class="hero__title">Müürilehe variparlament ehk 101 ideed</h1>

    <p>Mida sa teeksid, kui sul oleks võimalik parlamendi kõnepuldist välja käia üks idee, mis muudaks Eesti paremaks? Mida sa ütleksid? Müürileht pani sellesse olukorda 101 avaliku elu tegelast, kelle seas oli nii kirjanikke, ettevõtjaid, kodanikuaktiviste, näitlejaid, suhtekorraldajaid kui ka õppejõude. Neist inimestest moodustus Müürilehe variparlament. Variparlamendi kõnepuldis pole ükski idee liiga utoopiline, et seda välja hõigata, ega ükski mõte liiga kriitiline, et seda mõtlemata jätta. Lõpptulemuseks oli siiski konstruktiivne kriitika – kogum ideesid, mille üle võiks edasi arutada. Kõige parem on seda teha valimiseelsel perioodil, kui Eesti ühiskond võiks ideedest pulbitseda.</p>

  </div>
  <!-- /.wrap -->

</div>
<!-- /.hero -->

<div class="ideas">

  <ul class="ideas-grid">
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

      // parse the body with markdown and return html
      $body_parsed = $Parsedown->text($fcontent_body);

      ?>

    <li class="ideas-grid__item">
      <a href="?idee=<?php echo $file_without_ext ?>" class="ideas-grid__item__inner">

        <div class="ideas-grid__item__content">
          <p class="ideas-grid__item__name"><?php echo $header_name; ?></p>
          <p class="ideas-grid__item__title"><?php echo $header_title; ?></p>
        </div>

      </a>
    </li>

    <?php } ?>
  </ul>

</div>
<!-- /.ideas -->