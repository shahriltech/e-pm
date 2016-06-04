<?php

namespace app\controllers;

use Yii;
use app\models\Userpwas;
use app\models\Userpass;
use app\models\Paperwork;
use app\models\LookupPosition;

use app\models\UserpwasSearch;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use yii\db\Query;
/**
 * UserpwasController implements the CRUD actions for Userpwas model.
 */
class UserpwasController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
        'access' => [
                'class' => AccessControl::className(),
                //'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        //'roles' => ['?'],
                    ],
                    [
                        'actions' => ['view','index','update','delete','profile','profileupdate'],
                        'allow' => true, // can be false
                        'roles' => ['@'],

                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Userpwas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserpwasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Userpwas model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   //$model = $this->findModel($id);
        $connection = \Yii::$app->db;
        $sql = $connection->createCommand('SELECT u.id, u.ic_no, u.fullname, u.username, u.email, p.pass, l.position, r.role AS jenis FROM user u LEFT JOIN userpass p ON p.user_id = u.id LEFT JOIN lookup_position l ON l.position_id = u.position_id LEFT JOIN lookup_role r ON r.id = u.role  WHERE u.id = "'.$id.'"');
        $model = $sql->queryAll();

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Userpwas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Userpwas();
        $model_pass = new Userpass();

        if ($model->load(Yii::$app->request->post())) {
             
            $model->password_hash = Yii::$app->security->generatePasswordHash($_POST['Userpwas']['password_hash']);
            $model->auth_key = Yii::$app->security->generateRandomString();

            if($model->save()){
                $last_id = $model->id; // bring last id
                $model_pass->pass = $_POST['Userpwas']['password_hash'];
                $model_pass->user_id = $last_id;
                $model_pass->save();

                Yii::$app->getSession()->setFlash('addUser', 'Maklumat Berjaya Di Simpan');
                return $this->redirect(['userpwas/index']);
            }else{
                $model->password_hash = "";

                return $this->render('create', [
                        'model' => $model,
                ]);
            }
            
            return $this->redirect(['userpwas/index']);
        } else {
            
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Userpwas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {   
        $model = $this->findModel($id);
        /*$model_pass = Userpass::find()
               ->where(['user_id'=>$id])
               ->one();*/
        if ($model->load(Yii::$app->request->post())) {

            //$model->password_hash = Yii::$app->security->generatePasswordHash($_POST['Userpwas']['password_hash']);
            //$model->auth_key = Yii::$app->security->generateRandomString();

            if($model->save()){
               // $userpasswrd = $_POST['Userpwas']['password_hash'];
                //$model_pass->pass = $userpasswrd;
                
                //$model_pass->user_id = $id;

                //$model_pass->save();
                 Yii::$app->getSession()->setFlash('addUser', 'Maklumat Berjaya Di Kemaskini');
                 return $this->redirect(['userpwas/index']);
            }
            else{
                return $this->render('update', [
                        'model' => $model,
                ]);
            }
            
            
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Userpwas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Userpass::deleteAll(['user_id'=>$id]);

        Yii::$app->getSession()->setFlash('addUser', 'Maklumat Berjaya Di Buang!');
        return $this->redirect(['index']);
    }

    /**
     * Finds the Userpwas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Userpwas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Userpwas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionProfile()
    {
        $id = Yii::$app->user->identity->id;
       // $model = Userpwas::find()->where(['id'=>$id])->one();
        $connection = \Yii::$app->db;
        $sql = $connection->createCommand('SELECT u.id, u.ic_no, u.fullname, u.username, u.email, p.pass, l.position, r.role AS jenis FROM user u LEFT JOIN userpass p ON p.user_id = u.id LEFT JOIN lookup_position l ON l.position_id = u.position_id LEFT JOIN lookup_role r ON r.id = u.role  WHERE u.id = "'.$id.'"');
        $model = $sql->queryAll();
        
        //total paperwork
        $count_paperwork = Paperwork::find()
        ->where(['user_id' => $id])
        ->count();
        //total paperwork di luluskan
        $paperwork_approved = Paperwork::find()
        ->where(['user_id' => $id])
        ->andWhere(['status_by_nazir'=>"1"])
        ->count();
        //total paperwork tidak di luluskan
        $paperwork_pending = Paperwork::find()
        ->where(['user_id' => $id])
        ->andWhere(['status_by_nazir'=>"0"])
        ->count();
        return $this->render('profile', [
            'model' => $model,
            'count_paperwork' =>$count_paperwork,
            'paperwork_approved'=>$paperwork_approved,
            'paperwork_pending'=>$paperwork_pending,
        ]);
    }
    public function actionProfileupdate($id){
        $userid = Yii::$app->user->identity->id;
        $model_update = Userpwas::find() //find user info in user table
                    ->where(['id'=>$userid])
                    ->one();

        $model_pass = Userpass::find()
                ->where(['user_id'=>$userid])
                ->one();

        //$model_update = $this->findModel($id);
        $jawatan = $model_update->position_id;

        //lookup_position
        $modelposition = LookupPosition::find()
        ->where(['position_id' => $jawatan])
        ->one();

        if ($model_update->load(Yii::$app->request->post())) {
            if(isset($_POST['Userpwas']['ic_no'])) {
                if($model_update->save()){
                    Yii::$app->getSession()->setFlash('profileupdate', 'Maklumat Berjaya Di Kemaskini');
                    return $this->redirect(['userpwas/profileupdate','id'=>$id]);
                }
                else{
                    $model_update->password_hash = "";
                    return $this->render('profileupdate', [
                        'model_update' => $model_update,
                        'modelposition'=>$modelposition,
                        'model_pass' =>$model_pass,
                    ]);
                }
                
            }
            else if(isset($_POST['Userpwas']['password_hash'])){
                $model_update->password_hash = Yii::$app->security->generatePasswordHash($_POST['Userpwas']['password_hash']);
                $model_update->auth_key = Yii::$app->security->generateRandomString(); 

                if($model_update->save()){
                    $last_id = $userid;
                    $model_pass->pass = $_POST['Userpwas']['password_hash'];
                    $model_pass->user_id = $last_id;
                    $model_pass->save();
                    Yii::$app->getSession()->setFlash('profileupdate', 'Kata Laluan Berjaya Di Kemaskini');
                    return $this->redirect(['userpwas/profileupdate','id'=>$id]);
                }
                else{
                    $model_update->password_hash = "";
                    return $this->render('profileupdate', [
                        'model_update' => $model_update,
                        'modelposition'=>$modelposition,
                        'model_pass' =>$model_pass,
                    ]);
                }
            }
            else {
                    $model_update->password_hash = "";
                    return $this->render('profileupdate', [
                        'model_update' => $model_update,
                        'modelposition'=>$modelposition,
                        'model_pass' =>$model_pass,
                    ]);
            }
            
        } else {
            $model_update->password_hash = "";
                    return $this->render('profileupdate', [
                        'model_update' => $model_update,
                        'modelposition'=>$modelposition,
                        'model_pass' =>$model_pass,
                    ]);
        }
    }
}
