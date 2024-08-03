<?php

require_once (__DIR__ . "/../../controllers/mdb/mdbWebNav.php");

$navs = array();
if ($is_logged) {
    $navs = nav_search_by_rol($_SESSION["ID_ROL_LOGIN"]);
}

$show_button = isset($nav_button) and $nav_button['href'] and $nav_button['icon'];
$nav_button['id'] = !isset($nav_button['id']) ? '' : $nav_button['id'];

$checked_id = !isset($checked_id) ? 0 : $checked_id;

?>

<?php if (count($navs) > 0): ?>
    <nav class="md3-nav">
        <?php if ($show_button): ?>

            <a href=<?= $nav_button['href']; ?>>
                <button class="md3-btn md3-nav__btn md3-btn--fab md3-btn--fab--tertiary" id=<?= $nav_button['id']; ?>>
                    <span class="md3-btn--fab__icon material-symbols-rounded">
                        <?= $nav_button['icon']; ?>
                    </span>
                </button>
            </a>

        <?php endif; ?>

        <?php foreach ($navs as $nav): ?>
            <?php $item = nav_array($nav, $checked_id); ?>

            <input class="md3-nav__item-radio" type="radio" name="activity" id="to<?= $item['nombre'] ?>"
                onclick="window.location='<?= $item['ubicacion'] ?>'" <?= $item['checked'] ?> />
            <a class="md3-nav__item" href=<?= $item['ruta'] ?> tabindex="-1">
                <label class="md3-nav__item__label ripple" for="to<?= $item['nombre'] ?>">
                    <i class="material-symbols-rounded md3-nav__item__icon">
                        <?= $item['icono'] ?>
                    </i>
                    <span class="md3-nav__item__text">
                        <?= $item['nombre'] ?>
                    </span>
                </label>
            </a>

        <?php endforeach; ?>
    </nav>
<?php endif; ?>