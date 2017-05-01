<?php

/* @var $this yii\web\View */

$this->title = 'Volg ons..! - Gorinchemse Zeeverkenners';

use yii\helpers\Url;
use app\models\TextBlock;

?>
<div class="site-index">
    <div class="body-content">

            <div class="col-md-12">
                <h1>Volg ons op!</h1>
                <hr>
            </div>

            <div class="col-md-12">
                <?= TextBlock::render("follow-us") ?>
            </div>

    </div>
</div>
