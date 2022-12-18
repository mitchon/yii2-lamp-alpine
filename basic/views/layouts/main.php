<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use yii\helpers\Html;
use function CommonMark\Render\HTML;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, intitial-scale=1">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom align-items-center">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <div class="bi ms-4 me-2" style="max-width: 80px; max-height: 80px;">
                <?= HTML::img("@web/img/mpei.png", ['style' => 'max-height: 100%; max-width: 100%;']) ?>
            </div>
            <span class="ms-4 fs-4">Курсовая работа по Web-технологиям</span>
        </a>

        <ul class="nav nav-pills me-4">
            <li class="nav-item"><a href="/phpinfo" target="_blank" class="nav-link">phpinfo</a></li>
            <li class="nav-item"><a href="/phpMyAdmin" target="_blank" class="nav-link">phpMyAdmin</a></li>
            <li class="nav-item"><a href="http://vmss.mpei.ru" target="_blank" class="nav-link active">Сайт кафедры</a></li>
        </ul>
    </header>

    <main>
        <?= $content ?>
    </main>

    <footer class="align-items-center py-3 my-4 border-top" style="padding: 2px !important;">
        <div class="align-items-center">
            <p class="ms-4 text-muted">Создал: Комаров Д.А. А-07м-21</p>
            <p class="ms-4 text-muted">Создан с помощью фреймворка yii2 на базе LAMP-сервера.</p>
        </div>
    </footer>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>