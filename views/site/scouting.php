<?php

/* @var $this yii\web\View */

$this->title = 'Scouting - Gorinchemse Zeeverkenners';

use yii\helpers\Url;
use app\models\Page;

?>
<div class="site-index">
    <div class="body-content">

            <div class="col-md-12">
                <h1>Scouting</h1>
                <hr>
            </div>

            <div class="col-md-12">
                <?= Page::render("scouting") ?>
            </div>

    </div>
</div>
