<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class TextBlock extends ActiveRecord
{
    static function tableName() {
        return 'pages';
    }

    public function rules()
    {
        return [
            [['id'], 'required'],
            [['text', 'name'], 'string']
        ];
    }

    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    public static function render($name) {
        if(parent::find()->where(["name" => $name])->count() == 0) {
            return "Oeps, er is iets mis gegaan.";
        }

        return parent::find()->where(["name" => $name])->one()->text;
    }

}
