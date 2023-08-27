<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\RefPropinsi;
use app\models\RefDati2;
use app\models\RefKecamatan;
use app\models\RefKelurahan;
use app\models\Sppt;
use app\models\PembayaranSppt;
use app\models\Konfigurasi;
use app\models\TempNeracaBpk;
use app\models\TempLaporanPenetapanSearch;
use app\models\TempNeracaKppSearch;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','index','dashboard'],
                'rules' => [
                    [
                        'actions' => ['logout','index','dashboard'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $role = Yii::$app->user->identity->role;
        if($role==21){
            return $this->redirect(['pencatatan-email/index']);
        } else if($role==35){
            return $this->redirect(['sppt-e/verifikasi']);
        }
        return $this->render('index_dashboard');
    }

    public function actionDashboard()
    {
        return "";
        $tahun = $_GET['tahun'];
        $this->layout = 'report';
        $model_kecamatan = new RefKecamatan();
        $model_sppt = new Sppt();
        $model_pembayaran = new PembayaranSppt();
        $konfigurasi = new Konfigurasi();

        $kecamatan_temp = $model_kecamatan->find()->asArray()->all();
        $potensi_temp = $model_sppt->hitungPotensiKecamatan($tahun);
        $lembar_temp = $model_sppt->hitungLembarKecamatan($tahun);
        $lembar_lunas_temp = $model_sppt->hitungLembarLunasKecamatan($tahun);
        $realisasi_temp = $model_pembayaran->hitungRealisasiKecamatan($tahun);
        $realisasi_tunggakan = $model_pembayaran->hitungTotalRealisasiTunggakan($tahun);
        #khusus gunung mas
        $bphtb = 0;
        if($kecamatan_temp[0]['KD_PROPINSI']=='62' && $kecamatan_temp[0]['KD_DATI2']=='07')
            $bphtb = $model_pembayaran->getBPHTB($tahun);


        $kecamatan = [];
        $potensi = [];
        $realisasi = [];
        $lembar = [];
        $lembar_lunas = [];

        foreach ($kecamatan_temp as $key => $value) {
            $kecamatan[] = $value['NM_KECAMATAN'];
            $potensi[] = isset($potensi_temp[$value['KD_KECAMATAN']]) ? $potensi_temp[$value['KD_KECAMATAN']]/1000000 : 0;
            $realisasi[] = isset($realisasi_temp[$value['KD_KECAMATAN']]) ? $realisasi_temp[$value['KD_KECAMATAN']]/1000000 : 0;
            $lembar[] = isset($lembar_temp[$value['KD_KECAMATAN']]) ? $lembar_temp[$value['KD_KECAMATAN']]/1000 : 0;
            $lembar_lunas[] = isset($lembar_lunas_temp[$value['KD_KECAMATAN']]) ? $lembar_lunas_temp[$value['KD_KECAMATAN']]/1000 : 0;
        
        }

        return $this->renderAjax('dashboard',[
            'kecamatan' => $kecamatan,
            'potensi' => $potensi,
            'realisasi' => $realisasi,
            'lembar' => $lembar,
            'lembar_lunas' => $lembar_lunas,
            'realisasi_tunggakan'=>$realisasi_tunggakan,
            'tahun' => $tahun,
            'bphtb' => $bphtb,
            'target' => isset($konfigurasi->target_pbb[$tahun]) ? $konfigurasi->target_pbb[$tahun] : 0
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionAddAdmin() {
        $model = \app\models\User::find()->where(['username' => 'admin'])->one();
        if (empty($model)) {
            $user = new \app\models\User();
            $user->username = 'admin';
            $user->email = 'admin@denpasar.com';
            $user->setPassword('admin');
            $user->generateAuthKey();
            if ($user->save()) {
                echo 'good';
            }
        }
    }

    public function actionPeta() {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("SELECT CONCAT(KD_PROPINSI, KD_DATI2) KD_DATI2 FROM ref_dati2 LIMIT 1");
        $result = $command->queryAll()[0]['KD_DATI2'];
        return $this->render('peta', [
            'kd_dati2' => $result,
        ]);
    }

}
