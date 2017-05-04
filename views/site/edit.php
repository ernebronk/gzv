<?php

/* @var $this yii\web\View */

$this->title = 'Gorinchemse Zeeverkenners';
use yii\helpers\Url;
use dosamigos\tinymce\TinyMce;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->params['index'] = $model->index;
$this->params['admin'] = true;



?>
<div class="site-index">
    <div class="body-content">

            <div class="col-md-12">
                <h1>Admin Panel</h1>
                <hr>
            </div>

            <div class="col-md-12">
                <?php $form = ActiveForm::begin(); ?>
                <?= Html::submitButton("Opslaan", ["class" => "btn btn-success"]) ?>
                <?= Html::a("Ga naar " . $model->name, Url::to([$model->url]), ["class" => "btn btn-default"]); ?></br>
                Je bewerkt nu de pagina <b><?= $model->name ?></b>.
                <?= $form->field($model, 'text')->widget(TinyMce::className(), [
                    'options' => ['rows' => 18],
                    'language' => 'nl',
                    'clientOptions' => [
                        'plugins' => [
                            "advlist autolink lists link charmap print preview anchor image",
                            "searchreplace visualblocks code fullscreen",
                            "insertdatetime media table contextmenu paste"
                        ],
                        'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                    ]
                ]);?>

                <?php ActiveForm::end(); ?>

                <h3>Voorbeeld</h3>
                <?= $model->text ?>

            </div>

    </div>
</div>
