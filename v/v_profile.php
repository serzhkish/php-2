<p>Здравствуйте, <?= $usr ?>
<p>Последние 5 просмотренных страниц:</p>
<div>
  <?php
    foreach($lastPages as $index => $lastPage) :
  ?>
    <a href="<?= $lastPage[page] ?>"><?= $lastPage[page] ?></a><br>
  <?php
    endforeach;
  ?>
</div>