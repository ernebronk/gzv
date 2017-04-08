<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);


$menuItems = [
    ["label" => "Home", "url" => ["/site/index"]],
    ["label" => "Nieuws", "url" => ["/site/news"]],
    ["label" => "Activiteiten", "url" => ["/site/activities"]],
    ["label" => "Scouting", "url" => ["/site/activities"]],
    ["label" => "Speltakken", "url" => ["/site/activities"]],
    ["label" => "De vloot", "url" => ["/site/activities"]],
    ["label" => "Lid worden", "url" => ["/site/activities"]],
    ["label" => "Scoutshop", "url" => ["/site/activities"]],
    ["label" => "Vol ons op..", "url" => ["/site/activities"]],

];


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="container">
        <?php
        NavBar::begin([
            'brandLabel' => "Gorinchemse Zeeverkenners",
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-default navbar-fixed-top',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'MENU', 'url' => ['/site/index'], 'items' => $menuItems],
                ['label' => 'CONTACT', 'url' => ['/site/contact']],
                ['label' => 'ROUTE', 'url' => ['/site/route']],
            ],
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
        <div class="row">

            <div class="hidden-xs hidden-sm col-md-3">
                <h1 style="color:red;">Menu</h1>
                <hr>
                    <div class="list-group menu">
                        <?php foreach($menuItems as $item): ?>
                            <a href="<?= Url::to($item['url']) ?>" class="list-group-item <?= '/'.Yii::$app->urlManager->parseRequest(Yii::$app->request)[0] == $item['url'][0] ? 'active' : '' ?>"><?= $item["label"] ?></a>
                        <?php endforeach; ?>

                    </div>
            </div>

            <div class="col-md-9">
                <?= $content ?>
            </div>


        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
