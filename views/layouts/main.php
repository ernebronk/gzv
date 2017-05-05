<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use app\models\Page;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="keywords" content="GZV, scouting, Gorinchemse Zeeverkenners, Gorinchem">
    <meta name="author" content="<?= Html::encode($this->title) ?>">
    <meta name="description" content="Website van Scouting Gorinchemse Zeeverkenners">

    <meta property="og:title" content="<?= Html::encode($this->title) ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= Url::to(["site/index"], true) ?>" />
    <meta property="og:image" content="<?= Url::to(["site/img", "id" => 1], true) ?>" />


    <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?php
    //Page::menu();
 ?>

<div class="wrap">
    <div class="container">
        <?php
        NavBar::begin([
            'brandLabel' => "Scouting GZV",
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-default navbar-fixed-top',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => Page::topMenu($this->params['index']),
        ]);
        NavBar::end();
        ?>

        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="<?= Url::to("@web/img/header/", true) ?>header_01.jpg" alt="...">
            </div>
            <div class="item">
              <img src="<?= Url::to("@web/img/header/", true) ?>header_02.jpg" alt="...">
            </div>
            <div class="item">
              <img src="<?= Url::to("@web/img/header/", true) ?>header_03.jpg" alt="...">
            </div>
            <div class="item">
              <img src="<?= Url::to("@web/img/header/", true) ?>header_04.jpg" alt="...">
            </div>
            <div class="item">
              <img src="<?= Url::to("@web/img/header/", true) ?>header_05.jpg" alt="...">
            </div>
          </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>


    <?php if(isset($this->params['admin'])): ?>
        <div class="row">
            <div class="col-md-12">
                <?= $content ?>
            </div>
        </div>
    <?php else: ?>
        <div class="row">
            <div class="hidden-xs hidden-sm col-md-3">
                <h1 style="color:red;">Menu</h1>
                <hr>
                    <div class="list-group menu">
                        <?php foreach(Page::sideMenu() as $item): ?>
                            <a href="<?= Url::to($item['url']) ?>" class="list-group-item <?= $this->params['index'] == $item['url'] ? 'active' : '' ?>"><?= $item["label"] ?></a>
                        <?php endforeach; ?>

                    </div>
            </div>
            <div class="col-md-9">
                <?= $content ?>
            </div>
        </div>
    <?php endif; ?>
    </div>
</div>

<?php $this->endBody() ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-35938580-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
<?php $this->endPage() ?>
