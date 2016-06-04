<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Userpwas;
use app\models\Userpass;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['login','error','contact'],
                        'allow' => true,
                        //'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout','index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],

           /* 'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],*/
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

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            //return $this->redirect(['userpwas/index']);
            return $this->goBack();
        }else{
            return $this->render('login', [
            'model' => $model,
        ]);
        }
        
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) ) {
            $model2 = Userpwas::find()
                    ->where(['email'=>$_POST['ContactForm']['email']])
                    ->one();
            $model3 = Userpass::find()
                    ->where(['user_id'=>$model2->id])
                    ->one();
            if ($model->validate()){
                Yii::$app->mailer->compose()
                ->setTo($model2->email)
                ->setFrom('sistemepm2016@gmail.com')
                ->setSubject("AJK Masjid As-Syariff - Penukaran kata laluan")
                ->setTextBody('Plain text content')
                ->setHtmlBody('<p>Assalamualaikum' .$model2->fullname.',<br>Nama samaran anda ialah <strong>'.$model2->username.'</strong> dan kata laluan anda ialah <strong>'.$model3->pass.'</strong>. Klik pautan untuk log masuk ke sistem e-PM 
                        <a href="http://localhost/e-pm/web/">http://localhost/e-pm/web/</a> <br><strong>Perhatian</strong>, email ini adalah automatik dari sistem e-PM. Sebarang masalah, sila hubungi pihak administrator sistem e-PM.</p>')
                ->send();
                Yii::$app->session->setFlash('contactFormSubmitted','Sila periksa email anda untuk mengetahui kata laluan anda.');

                return $this->redirect(['login']);
            }
            else{
                return $this->render('contact', [
                    'model' => $model,
                ]);
            }

        }
        else{
            return $this->render('contact', [
            'model' => $model,
        ]);
        }
        
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionTukarpassword()
    {
        return $this->render('tukarpassword');
    }
}
