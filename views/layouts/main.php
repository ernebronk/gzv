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
            'brandLabel' => "GZV",
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-default navbar-fixed-top',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'MENU', 'url' => ['/site/index'], 'items' => Yii::$app->params['menuItems']],
                ['label' => 'CONTACT', 'url' => ['/site/contact']],
                ['label' => 'ROUTE', 'url' => ['/site/route']],
                Yii::$app->user->isGuest ? ("") :
                [
                    "label" => "ADMIN", 'items' => [
                        ['label' => "Bewerken" , 'url' => ['/admin/index', 'page' => Yii::$app->controller->action->id]],
                        ['label' => "Logout (" . Yii::$app->user->identity->username . ")" , 'url' => ['/site/logout']]
                    ]
                ]
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
                        <?php foreach(Yii::$app->params['menuItems'] as $item): ?>
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
