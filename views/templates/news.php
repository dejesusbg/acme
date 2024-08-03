<?php

require_once (__DIR__ . "/../../controllers/mdb/mdbWebNoticia.php");

$noticias = noticia_get();

?>

<?php foreach ($noticias as $noticia): ?>
    <?php $item = noticia_array($noticia); ?>

    <div class="md3-card md3-card--filled acme-news">
        <img src=<?= $item['imagen'] ?> alt="ACME facade" class="md3-card__media" />
        <div>
            <span class="md3-card__headline"><?= $item['titulo'] ?></span>
            <span class="md3-card__subhead"><?= $item['subtitulo'] ?></span>
            <span class="md3-card__text"><?= $item['descripcion'] ?></span>
        </div>
    </div>

<?php endforeach; ?>