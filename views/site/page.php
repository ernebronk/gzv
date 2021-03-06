<?php

/* @var $this yii\web\View */

$this->title = (isset($page->title) ? $page->title . " - " : "" ) . 'Gorinchemse Zeeverkenners';

use yii\helpers\Url;
use app\models\Page;

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
