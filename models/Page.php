<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Page extends ActiveRecord
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

    public static function render($name) {
        if(parent::find()->where(["name" => $name])->count() == 0) {
            return "Oeps, er is iets mis gegaan.";
        }

        return parent::find()->where(["name" => $name])->one()->text;
    }

}
