<?php

namespace app\controllers;

use Yii;
use app\models\Paperwork;
use app\models\PaperworkSearch;
use app\models\StatusSearch;
use app\models\ListSearch;
use app\models\SubmissionSearch;
use app\models\ReportSearch;
use app\models\ReasonPaperworkNotapproved;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use app\models\WeeklySearch;
use app\models\MonthlySearch;
use app\models\YearlySearch;
use app\models\Userpwas;
/**
 * PaperworkController implements the CRUD actions for Paperwork model.
 */
class PaperworkController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Paperwork models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PaperworkSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionStatus()
    {
        $searchModel = new StatusSearch();
        $userid = Yii::$app->user->identity->id;
        $model_paper = Paperwork::find()
                    ->where(['user_id'=>$userid])
                    ->andWhere(['pw_submit_status'=>'Telah Di Hantar'])
                    ->all();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('status', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model_paper' =>$model_paper,
        ]);
    }
    public function actionSubmission()
    {
        $searchModel = new SubmissionSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('submission', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionReport()
    {
       $searchModel = new ReportSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single Paperwork model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    { 
        $model2 = ReasonPaperworkNotapproved::find()
                ->where(['paperwork_id'=>$id])
                ->one();

        $connection = \Yii::$app->db;
        $sql = $connection->createCommand('select p.status_by_nazir,p.id,p.jangka_masa,p.pw_justifikasi,p.nama_program,p.pw_advantage,p.pw_background,p.pw_budget,p.pw_startdate,p.pw_endDate,p.pw_obj,p.pw_submit_status,s.status AS status_bendahari,sn.status AS status_by_nazir,ss.status AS status_by_su,st.status AS status_by_timbalan,u.fullname,j.position,p.pw_norujukan
from paperwork p
left join status_paperwork s on s.id = p.status_by_bendahari
left join status_paperwork sn on sn.id = p.status_by_nazir
left join status_paperwork ss on ss.id = p.status_by_su
left join status_paperwork st on st.id = p.status_by_timbalan
left join user u on u.id = p.user_id
left join lookup_position j on j.position_id = u.position_id
where p.id = "'.$id.'"');
        $model = $sql->queryAll();
        return $this->render('view', [
            'model' => $model,
            'model2'=>$model2,
        ]);
    }
    public function actionApproval($id)
    { 
        $connection = \Yii::$app->db;
        $sql = $connection->createCommand('select p.id,p.jangka_masa,p.pw_justifikasi,p.nama_program,p.pw_advantage,p.pw_background,p.pw_budget,p.pw_startdate,p.pw_endDate,p.pw_obj,p.pw_submit_status,s.status AS status_bendahari,sn.status AS status_by_nazir,ss.status AS status_by_su,st.status AS status_by_timbalan,p.status_by_su AS setiausaha,p.status_by_bendahari AS bendahari,p.status_by_timbalan AS timbalan,p.status_by_nazir AS nazir,u.fullname,j.position,p.pw_norujukan
from paperwork p
left join status_paperwork s on s.id = p.status_by_bendahari
left join status_paperwork sn on sn.id = p.status_by_nazir
left join status_paperwork ss on ss.id = p.status_by_su
left join status_paperwork st on st.id = p.status_by_timbalan
left join user u on u.id = p.user_id
left join lookup_position j on j.position_id = u.position_id
where p.id = "'.$id.'"');
        $model = $sql->queryAll();
        return $this->render('approval', [
            'model' => $model,
        ]);
    }
    /**
     * Creates a new Paperwork model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionViewreport($id)
    { 
        $connection = \Yii::$app->db;
        $sql = $connection->createCommand('select p.id,p.jangka_masa,p.pw_justifikasi,p.nama_program,p.pw_advantage,p.pw_background,p.pw_budget,p.pw_startdate,p.pw_endDate,p.pw_obj,p.pw_submit_status,s.status AS status_bendahari,sn.status AS status_by_nazir,ss.status AS status_by_su,st.status AS status_by_timbalan,u.fullname,j.position,p.pw_norujukan
from paperwork p
left join status_paperwork s on s.id = p.status_by_bendahari
left join status_paperwork sn on sn.id = p.status_by_nazir
left join status_paperwork ss on ss.id = p.status_by_su
left join status_paperwork st on st.id = p.status_by_timbalan
left join user u on u.id = p.user_id
left join lookup_position j on j.position_id = u.position_id
where p.id = "'.$id.'"');
        $model = $sql->queryAll();
        return $this->render('viewreport', [
            'model' => $model,
        ]);
    }
    public function actionCreate()
    {
        $model = new Paperwork();
        $userid = Yii::$app->user->identity->id;
        $email = Yii::$app->user->identity->email;
        
        $model->user_id = $userid;

        //create no rujukan e-KK
        
        $length = rand(5,5);
        $chars = array_merge(range(0,9));
        shuffle($chars);
        $number = implode(array_slice($chars, 0,$length));
        $model->pw_norujukan = 'e-kk'.$number;
        if ($model->load(Yii::$app->request->post()) ) {
            if (isset($_POST['hantar'])) {
                $model->pw_submit_status = "Telah Di Hantar";
                if($model->save()){
                    $value = Yii::$app->mailer->compose()
                    ->setFrom('sistemepm2016@gmail.com')
                    ->setTo('i.marizkillah@gmail.com')
                    ->setTo(array('silenttech9@gmail.com','i.marizkillah@gmail.com'))
                    ->setSubject('AJK Masjid As-Syariff - Penerimaan Kertas Kerja Baru')
                    ->setTextBody('Plain text content')
                    ->setHtmlBody('<p>Assalamualaikum,<br>Kertas kerja dari pihak AJK Masjid As-Syarif baru sahaja di proses ke dalam sistem. Anda perlu log masuk ke dalam sistem untuk proses kelulusan. Klik pautan untuk log masuk ke sistem e-PM 
                        <a href="http://localhost/e-pm/web/">http://localhost/e-pm/web/</a> <br>Perhatian, email ini adalah automatik dari sistem e-PM. Sebarang masalah, sila hubungi pihak administrator sistem e-PM.</p>')
                    ->send();
                
                    Yii::$app->getSession()->setFlash('addpaper', 'Maklumat Berjaya Di hantar ke pihak pengurusan');
                    return $this->redirect(['paperwork/index']);
                }
                else{
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }

            }
            else{
                $model->pw_submit_status = "Belum Di hantar";
                if($model->save()){
                
                    Yii::$app->getSession()->setFlash('addpaper', 'Maklumat Berjaya Di Simpan');
                    return $this->redirect(['paperwork/index']);
                }
                else{
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
            }
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Paperwork model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $userid = Yii::$app->user->identity->id;
        $model2 = ReasonPaperworkNotapproved::find()
                ->where(['paperwork_id'=>$id])
                ->one();

        if ($model->load(Yii::$app->request->post()) ) {
            if (isset($_POST['hantar'])) {
                
                $model->pw_submit_status = "Telah Di Hantar";
                //$model->user_id = $userid;

                if ($model->save()) {
                    $value = Yii::$app->mailer->compose()
                    ->setFrom('sistemepm2016@gmail.com')
                    ->setTo('i.marizkillah@gmail.com')
                    ->setTo(array('silenttech9@gmail.com','i.marizkillah@gmail.com'))
                    ->setSubject('AJK Masjid As-Syariff - Penerimaan Kertas Kerja Baru')
                    ->setTextBody('Plain text content')
                    ->setHtmlBody('<p>Assalamualaikum,<br>Kertas kerja dari pihak AJK Masjid As-Syarif baru sahaja di proses ke dalam sistem. Anda perlu log masuk ke dalam sistem untuk proses kelulusan. Klik pautan untuk log masuk ke sistem e-PM 
                        <a href="http://localhost/e-pm/web/">http://localhost/e-pm/web/</a> <br>Perhatian, email ini adalah automatik dari sistem e-PM. Sebarang masalah, sila hubungi pihak administrator sistem e-PM.</p>')
                    ->send();

                    if (Yii::$app->user->identity->role == 3) {
                        Yii::$app->getSession()->setFlash('addUser', 'Kertas Kerja Telah Berjaya Di Hantar Ke Pihak Pengurusan.');
                        return $this->redirect(['paperwork/list']);
                    }
                    else{
                        Yii::$app->getSession()->setFlash('addUser', 'Kertas Kerja Anda Telah Berjaya Di Hantar Ke Pihak Pengurusan.');
                        return $this->redirect(['paperwork/index']);
                    }
                    
                }
                else {
                    return $this->render('update', [
                        'model' => $model,
                    ]);
                }
            }
            else{
                //$model->user_id = $userid;
                
                if ($model->save()) {
                    if (Yii::$app->user->identity->role == 3) {
                        Yii::$app->getSession()->setFlash('addUser', 'Kertas Kerja Berjaya Di Kemaskini.');
                        return $this->redirect(['paperwork/list']);
                    }
                    else{
                        Yii::$app->getSession()->setFlash('addUser', 'Kertas Kerja Berjaya Di Kemaskini.');
                        return $this->redirect(['paperwork/index']);
                    }
                    
                }
                else {
                    return $this->render('update', [
                        'model' => $model,
                    ]);
                }
            }

            
        } else {
            return $this->render('update', [
                'model' => $model,
                'model2'=>$model2,
            ]);
        }
    }

    //function lulus paperwork
    public function actionLulus($id){
        $model = $this->findModel($id);
        $model2 = Userpwas::find()
                ->where(['id'=>$model->user_id])
                ->one();
        //print_r($model);
        //exit();
        if(Yii::$app->user->identity->position_id == 28){
            $model->status_by_su = 1;
           // $model->pw_dateUpdated = date('')
            $model->save();
            //exit();
            return $this->redirect(['paperwork/submission']);
        }
        elseif (Yii::$app->user->identity->position_id == 27) {
            $model->status_by_bendahari = 1;
            $model->save();
            return $this->redirect(['paperwork/submission']);
        }
        elseif (Yii::$app->user->identity->position_id == 26) {
            $model->status_by_timbalan = 1;
            $model->save();
            return $this->redirect(['paperwork/submission']);
        }
        elseif (Yii::$app->user->identity->position_id == 25) {
            $model->status_by_nazir = 1;
            $model->pw_dateUpdated =  Yii::$app->formatter->asDate('now', 'php:Y-m-d');
            $model->pw_yearApprove =  Yii::$app->formatter->asDate('now', 'php:Y');
            Yii::$app->formatter->locale = 'ms-MY';
            $model->pw_monthlyApprove =  Yii::$app->formatter->asDate('now', 'php:M, Y');
            
            if ($model->save()) {
                $value = Yii::$app->mailer->compose()
                    ->setFrom('sistemepm2016@gmail.com')
                    ->setTo($model2->email)
                    ->setSubject('AJK Masjid As-Syariff - Keputusan Penghantaran Kertas Kerja')
                    ->setTextBody('Plain text content')
                    ->setHtmlBody('<p>Assalamualaikum '.$model2->fullname.',<br>Tahniah, kerana kertas anda telah diluluskan oleh pihak pengurusan. Anda perlu log masuk ke dalam sistem untuk proses cetakan dan sebagai rujukan anda. Klik pautan untuk log masuk ke sistem e-PM 
                        <a href="http://localhost/e-pm/web/">http://localhost/e-pm/web/</a> <br><br>Perhatian, email ini adalah automatik dari sistem e-PM. Sebarang masalah, sila hubungi pihak administrator sistem e-PM.</p>')
                    ->send();
                Yii::$app->getSession()->setFlash('mesejLulus', 'Kertas Kerja Telah Di Luluskan.');
                return $this->redirect(['paperwork/submission']);
            }
            else{
                throw new NotFoundHttpException('No Internet Connection.');
            }
            
        }
    }
    
    //function untuk tidak meluluskan paperwork
    public function actionTidaklulus($id){
        $model = $this->findModel($id);

        if(Yii::$app->user->identity->position_id == 28){
            $model->status_by_su = 2;
            $model->status_by_bendahari = 2;
            $model->status_by_timbalan = 2;
            $model->status_by_nazir = 2;
            $model->save();
            return $this->redirect(['paperwork/submission']);
        }
        elseif (Yii::$app->user->identity->position_id == 27) {
            $model->status_by_bendahari = 2;
            $model->status_by_timbalan = 2;
            $model->status_by_nazir = 2;
            $model->save();
            return $this->redirect(['paperwork/submission']);
        }
        elseif (Yii::$app->user->identity->position_id == 26) {
            $model->status_by_timbalan = 2;
            $model->status_by_nazir = 2;
            $model->save();
            return $this->redirect(['paperwork/submission']);
        }
        elseif (Yii::$app->user->identity->position_id == 25) {
            $model->status_by_nazir = 2;
            $model->save();
            return $this->redirect(['paperwork/submission']);
        }
    }
    /**
     * Deletes an existing Paperwork model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = Paperwork::find()
               ->where(['id'=>$id])
               ->one();

        if (Yii::$app->user->identity->role == 3) {
            $this->findModel($id)->delete();
            ReasonPaperworkNotapproved::deleteAll(['paperwork_id'=>$id]);

            Yii::$app->getSession()->setFlash('ralat', 'Kertas Kerja Berjaya Di Buang!');
            return $this->redirect(['list']);
           
        }
        elseif (Yii::$app->user->identity->role == 2) {
            

            if ($model->pw_submit_status == 'Telah Di Hantar') {
                $this->findModel($id)->delete();
                ReasonPaperworkNotapproved::deleteAll(['paperwork_id'=>$id]);
                Yii::$app->getSession()->setFlash('ralat', 'Maklumat Berjaya Di Buang!');

                return $this->redirect(['index']);
            }
            else{

                $this->findModel($id)->delete();
                ReasonPaperworkNotapproved::deleteAll(['paperwork_id'=>$id]);
                Yii::$app->getSession()->setFlash('addUser', 'Maklumat Berjaya Di Buang!');
             
            }
        }
        
    }
    
    /**
     * Finds the Paperwork model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Paperwork the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Paperwork::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionReportpdf($id)
    { 
        $connection = \Yii::$app->db;
        $sql = $connection->createCommand('select p.id,p.jangka_masa,p.pw_justifikasi,p.nama_program,p.pw_advantage,p.pw_background,p.pw_budget,p.pw_startdate,p.pw_endDate,p.pw_obj,p.pw_submit_status,s.status AS status_bendahari,sn.status AS status_by_nazir,ss.status AS status_by_su,st.status AS status_by_timbalan,u.fullname,j.position,p.pw_norujukan
from paperwork p
left join status_paperwork s on s.id = p.status_by_bendahari
left join status_paperwork sn on sn.id = p.status_by_nazir
left join status_paperwork ss on ss.id = p.status_by_su
left join status_paperwork st on st.id = p.status_by_timbalan
left join user u on u.id = p.user_id
left join lookup_position j on j.position_id = u.position_id
where p.id = "'.$id.'"');
        $model = $sql->queryAll();
        return $this->render('reportpdf', [
            'model' => $model,
        ]);
    }
    public function actionReportprint($id) 
    {
        
        $connection = \Yii::$app->db;
        $sql = $connection->createCommand('select p.id,p.jangka_masa,p.pw_justifikasi,p.nama_program,p.pw_advantage,p.pw_background,p.pw_budget,p.pw_startdate,p.pw_endDate,p.pw_obj,p.pw_submit_status,s.status AS status_bendahari,sn.status AS status_by_nazir,ss.status AS status_by_su,st.status AS status_by_timbalan,u.fullname,j.position,p.pw_norujukan
from paperwork p
left join status_paperwork s on s.id = p.status_by_bendahari
left join status_paperwork sn on sn.id = p.status_by_nazir
left join status_paperwork ss on ss.id = p.status_by_su
left join status_paperwork st on st.id = p.status_by_timbalan
left join user u on u.id = p.user_id
left join lookup_position j on j.position_id = u.position_id
where p.id = "'.$id.'"');
        $model = $sql->queryAll();
        $content = $this->renderPartial('reportpdf', ['model'=>$model]);

        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            'content' => $content,
            'options' => ['title' => 'Laporan Kertas Kerja'],
            'methods' => [
                'SetHeader'=>['Laporan Kertas Kerja'],
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);
        return $pdf->render();

    }
    public function actionConfirmapprove($id){
        return $this->renderAjax('confirmapprove', [
            'model' => $this->findModel($id),
        ]);
    }
    public function actionList(){

        $searchModel = new ListSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
