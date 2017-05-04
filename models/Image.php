<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\Html;
use yii\helpers\Url;


class Image extends ActiveRecord
{

    public $imageFile;

    static function tableName() {
        return 'images';
    }

    public function rules()
    {
        return [
            [['name', 'imageFile'], 'required'],
            [['id'], 'integer'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['name', 'url'], 'string'],
            [['name'], 'unique'],
            [['uploaded_at'], 'datetime']
        ];
    }

    public function attributeLabels() {
        return [
            "name" => "Naam",
            "imageFile" => "Plaatje"
        ];
    }



    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'uploaded_at',
                'updatedAtAttribute' => false,
                'value' => new Expression('NOW()'),
            ]
        ];
    }

    public function upload($image)
    {
        if ($this->validate()) {
            $this->url = 'afbeeldingen/' . $this->name . '.' . $image->extension;
            $this->save();
            $image->saveAs($this->url);
            return true;
        } else {
            print_r($this->getErrors());
            die();
            return false;
        }
    }
    public function getTools() {
        return Html::a("Remove", Url::to(["site/remove-image", 'id' => $this->id]), ["class" => "btn btn-danger"]);
    }

    public function delete() {
        if(parent::delete()) {
            // remove the file here
            return true;
        }
        else {
            return false;
        }
    }

    public function getAbsUrl() {
        $url = Url::to(["site/img", "id" => $this->id], true);
        return Html::a($url,$url);
    }

}
