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

    public static function get($name) {
        if(parent::find()->where(["index" => $name])->count() == 0) {
            throw new \yii\web\HttpException(404, 'De pagina die je zoekt bestaat niet.');
        }
        return parent::find()->where(["index" => $name])->one();
    }

    public static function topMenu($currentPage) {
        $topMenu = [
            ['label' => 'Menu', 'url' => '', 'items' => self::sideMenu()]
        ];

        $items = parent::find()
            ->select("name as label, `index` as url")
            ->where("top_index is not null")
            ->orderBy("top_index ASC")
            ->asArray()
            ->all();

        foreach($items as $item) {
            array_push($topMenu, $item);
        }

        if(!Yii::$app->user->isGuest) {
            array_push($topMenu, [
                "label" => "Admin", 'items' => [
                    ['label' => "Bewerken" , 'url' => ['edit', 'page' => $currentPage]],
                    ['label' => "Plaatjes" , 'url' => ['image']],
                    ['label' => "Logout (" . Yii::$app->user->identity->username . ")" , 'url' => ['/site/logout']]
                ]
            ]);
        }

        return $topMenu;
    }

    public static function sideMenu() {
        return parent::find()
            ->select("name as label,`index` as url")
            ->where("side_index is not null")
            ->orderBy("side_index ASC")
            ->asArray()
            ->all();
    }

}
