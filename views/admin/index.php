<?php

/* @var $this yii\web\View */

$this->title = 'Gorinchemse Zeeverkenners';
use yii\helpers\Url;
use dosamigos\tinymce\TinyMce;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;


?>
<div class="site-index">
    <div class="body-content">

            <div class="col-md-12">
                <h1>Admin Panel</h1>
                <hr>
            </div>

            <div class="col-md-12">
                Je bewerkt nu de pagina <b><?= $model->name ?></b>.
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'text')->widget(TinyMce::className(), [
                    'options' => ['rows' => 18],
                    'language' => 'nl',
                    'clientOptions' => [
                        'plugins' => [
                            "advlist autolink lists link charmap print preview anchor",
                            "searchreplace visualblocks code fullscreen",
                            "insertdatetime media table contextmenu paste"
                        ],
                        'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                    ]
                ]);?>

                <?= Html::submitButton("Opslaan", ["class" => "btn btn-success"]) ?>
                <?php ActiveForm::end(); ?>

                <h3>Voorbeeld</h3>
                <?= $model->text ?>

            </div>

    </div>
</div>
