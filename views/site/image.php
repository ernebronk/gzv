<?php

/* @var $this yii\web\View */

$this->title = 'Gorinchemse Zeeverkenners';
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->params['index'] = 'images';
$this->params['admin'] = true;



?>
<div class="site-index">
    <div class="body-content">

            <div class="col-md-12">
                <h1>Plaatjes</h1>
                <hr>
            </div>

            <div class="col-md-12">
                <p>Via deze pagina kun je plaatjes op de website zetten. De lijst hieronder geeft aan welke plaatjes er allemaal op de website staan die je kunt gebruiken. Je kunt plaatjes toevoegen op een pagina door gebruik te maken van het `url`. Succes!</p>
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'imageFile')->fileInput(); ?>
                <?= $form->field($model, 'name'); ?>
                <?= Html::submitButton("Foto toevoegen!", ["class" => "btn btn-success"]); ?>

                <?php ActiveForm::end(); ?>

                <h3>Plaatjes</h3>
                <table class="table">
                    <thead>
                        <tr><th>Plaatje</th><th>Naam</th><th>Datum</th><th>Url</th><th>Opties</th></tr>
                    </thead>
                    <tbody>
                        <?php foreach($images as $image): ?>
                            <tr>
                                <td><?= Html::img(Url::to(["site/img", 'id' => $image->id]), ["class" => "img img-table"]) ?></td>
                                <td><?= $image->name ?></td>
                                <td><?= Yii::$app->formatter->asDate($image->uploaded_at) ?>
                                <td><?= $image->absUrl ?></td>
                                <td><?= $image->tools ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>

    </div>
</div>
