<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="body-content">
    <h1><?= Html::encode($this->title) ?></h1>
    <hr>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        Oeps, er is iets mis gegaan bij het laden van de pagina. De foutmelding staat hierboven beschreven.
    </p>
</div>
