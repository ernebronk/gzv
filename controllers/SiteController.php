<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Page;
use app\models\Image;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout', 'edit', 'remove-image'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex($page = "home")
    {
        $page = Page::get($page);
        return $this->render('page', ["page" => $page]);
    }


    public function actionEdit($page = 'home')
    {
        $block = Page::find()->where(["index" => $page])->one();
        if(Yii::$app->request->isPost) {
            $block->load(Yii::$app->request->post());
            $block->save();
        }
        return $this->render('edit', ['model' => $block]);
    }

    public function actionImage() {
        $model = new Image();
        if(Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $model->upload($model->imageFile);
        }
        $images = Image::find()->all();
        return $this->render("image", ["images" => $images, "model" => $model]);
    }

    public function actionRemoveImage($id) {
        $image = Image::findOne($id);
        if(!$image) {
            throw new \yii\web\HttpException(400, 'Het plaatje dat je wilt verwijderen is niet gevonden');
        }
        if($image->static) {
            throw new \yii\web\HttpException(401, 'Het plaatje dat je wilt verwijderen is beschermd tegen verwijderen.');
        }
        $image->delete();
        return $this->redirect("image");
    }

    public function actionImg($id) {
         $image = Image::findOne($id);
         if(!$image) {
             throw new \yii\web\HttpException(400, 'Het plaatje dat je zoekt is niet gevonden');
         }
         header("Pragma: no-cache"); // required
         header("Expires: 0");
         header("Cache-Control: no-cache, no-store, must-revalidate");
         header("Content-Type: " . $image->extension);
         header("Content-Transfer-Encoding: binary");
         flush();
         readfile($image->url);
         die();
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->actionIndex();
    }

}
