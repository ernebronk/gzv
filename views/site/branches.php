<?php

/* @var $this yii\web\View */

$this->title = 'Speltakken - Gorinchemse Zeeverkenners';

use yii\helpers\Url;
use app\models\TextBlock;

?>
<div class="site-index">
    <div class="body-content">

            <div class="col-md-12">
                <h1>Speltakken</h1>
                <hr>
            </div>

            <div class="col-md-12">
                <?= TextBlock::render("branches") ?>
            </div>

    </div>
</div>
