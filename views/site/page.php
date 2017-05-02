<?php

/* @var $this yii\web\View */

$this->title = 'Gorinchemse Zeeverkenners';
use yii\helpers\Url;
use app\models\Page;

$page = Page::get($page);
$this->params['index'] = $page->index;

?>
<div class="site-index">
    <div class="body-content">

            <div class="col-md-12">
                <h1><?= $page->name ?></h1>
                <hr>
            </div>

            <div class="col-md-12">
                <?= $page->text ?>
            </div>

    </div>
</div>
