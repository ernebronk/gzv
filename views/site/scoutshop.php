<?php

/* @var $this yii\web\View */

$this->title = 'Scoutshop - Gorinchemse Zeeverkenners';

use yii\helpers\Url;
use app\models\Page;

?>
<div class="site-index">
    <div class="body-content">

            <div class="col-md-12">
                <h1>Scoutshop</h1>
                <hr>
            </div>

            <div class="col-md-12">
                <?= Page::render("scoutshop") ?>
            </div>

    </div>
</div>
