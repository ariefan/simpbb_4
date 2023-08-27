<?php

namespace app\controllers;

use Yii;
use app\models\Validasi;
use app\models\ValidasiSearch;
use app\models\RefDati2;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * ValidasiController implements the CRUD actions for Validasi model.
 */
class ValidasiController extends Controller
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
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Validasi models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new ValidasiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if(Yii::$app->request->post('hasEditable')){
            $id = json_decode(Yii::$app->request->post('editableKey'));
            $model = $this->findModel($id->KD_PROPINSI,$id->KD_DATI2,$id->KD_KECAMATAN,$id->KD_KELURAHAN,$id->KD_BLOK,$id->NO_URUT,$id->KD_JNS_OP);

            $model->load(['Validasi'=>current(Yii::$app->request->post('Validasi'))]);
            $model->save();

            return true;
            
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Validasi model.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @param string $KD_KECAMATAN
     * @param string $KD_KELURAHAN
     * @param string $KD_BLOK
     * @param string $NO_URUT
     * @param string $KD_JNS_OP
     * @return mixed
     */
    public function actionView($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Validasi #".$KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP'=>$KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP),
            ]);
        }
    }

    /**
     * Creates a new Validasi model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Validasi();  

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Tambah NOP Validasi",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Tambah NOP Validasi",
                    'content'=>'<span class="text-success">Validasi Sukses</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> "Tambah NOP Validasi",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN, 'KD_KELURAHAN' => $model->KD_KELURAHAN, 'KD_BLOK' => $model->KD_BLOK, 'NO_URUT' => $model->NO_URUT, 'KD_JNS_OP' => $model->KD_JNS_OP]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
    }

    public function actionAssign(){
        if (!empty(Yii::$app->request->post())) {
            $p = Yii::$app->request->post();

            foreach ($p['nop'] as $key => $value) {
                $model = Validasi::findOne(['KD_PROPINSI'=>substr($value,0,2),'KD_DATI2'=>substr($value,2,2),'KD_KECAMATAN'=>substr($value,4,3),'KD_KELURAHAN'=>substr($value,7,3),'KD_BLOK'=>substr($value,10,3),'NO_URUT'=>substr($value,13,4),'KD_JNS_OP'=>substr($value,17,1)]);
                if($model===null){
                    $model = new Validasi();
                }
                $model->KD_PROPINSI = substr($value,0,2);
                $model->KD_DATI2 = substr($value,2,2);
                $model->KD_KECAMATAN = substr($value,4,3);
                $model->KD_KELURAHAN = substr($value,7,3);
                $model->KD_BLOK = substr($value,10,3);
                $model->NO_URUT = substr($value,13,4);
                $model->KD_JNS_OP = substr($value,17,1);

                if(!empty($p['Validasi']['IS_CETAK'])) $model->IS_CETAK = $p['Validasi']['IS_CETAK'];
                if(!empty($p['Validasi']['IS_VALIDATED'])) $model->IS_VALIDATED = $p['Validasi']['IS_VALIDATED'];
                if(!empty($p['Validasi']['KELOMPOK'])) $model->KELOMPOK = $p['Validasi']['KELOMPOK'];
                if(!empty($p['Validasi']['KATEGORI'])) $model->KATEGORI = $p['Validasi']['KATEGORI'];
                if(!empty($p['Validasi']['VALIDASI_KE'])) $model->VALIDASI_KE = trim($p['Validasi']['VALIDASI_KE']);
                if(!empty($p['Validasi']['KETERANGAN'])) $model->KETERANGAN = $p['Validasi']['KETERANGAN'];
                $model->MODIFIED = date('Y-m-d H:i:s');
                $model->save();
            }
            return $this->redirect(['index']);
        } else {
            $model = new Validasi();
            return $this->render('assign', compact('model'));
        }
    }

    public function actionLaporan(){
        $model = new Validasi();

        if (!empty(Yii::$app->request->post())) {
            $p = Yii::$app->request->post();
            if($p['export'] == 'per_nop'){
                $data = $model->getLaporanPerNop($p);
                $titles = [
                            'NOP',
                            'NAMA',
                            'ALAMAT WP',
                            'ALAMAT OP',
                            'KATEGORI',
                            'PBB',
                            'TINDAK LANJUT',
                            'POKOK_BAYAR'
                        ];
            }else{
                $data = $model->getLaporan($p);
                $titles = [
                            'NOP',
                            'NAMA',
                            'TAHUN',
                            'ALAMAT WP',
                            'ALAMAT OP',
                            'KATEGORI',
                            'PBB',
							//'STATUS BAYAR',
							'PIUTANG',
							'KURANG BAYAR',
							'LEBIH BAYAR',
                            'TINDAK LANJUT',
                            'POKOK_BAYAR',
                            'TANGGAL_BAYAR'
                        ];
            }
            $file = \Yii::createObject([
                'class' => 'codemix\excelexport\ExcelFile',
                'sheets' => [

                    'Daftar NOP Validasi' => [   // Name of the excel sheet
                        'data' => $data,

                        // Set to `false` to suppress the title row
                        'titles' => $titles,

                        'formats' => [
                            // Either column name or 0-based column index can be used
                            //'C' => '#,##0.00',
                            //3 => 'dd/mm/yyyy hh:mm:ss',
                        ],

                        'formatters' => [
                            // Dates and datetimes must be converted to Excel format
                            // 3 => function ($value, $row, $data) {
                            //     return \PHPExcel_Shared_Date::PHPToExcel(strtotime($value));
                            // },
                        ],
                    ],

                ]
            ]);

            $file->send("Daftar Validasi.xlsx"); 
        } else {
            return $this->render('laporan', compact('model'));
        }
    }

    /**
     * Updates an existing Validasi model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @param string $KD_KECAMATAN
     * @param string $KD_KELURAHAN
     * @param string $KD_BLOK
     * @param string $NO_URUT
     * @param string $KD_JNS_OP
     * @return mixed
     */
    public function actionUpdate($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP);       

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update Validasi #".$KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Validasi #".$KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP'=>$KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update Validasi #".$KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];        
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN, 'KD_KELURAHAN' => $model->KD_KELURAHAN, 'KD_BLOK' => $model->KD_BLOK, 'NO_URUT' => $model->NO_URUT, 'KD_JNS_OP' => $model->KD_JNS_OP]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing Validasi model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @param string $KD_KECAMATAN
     * @param string $KD_KELURAHAN
     * @param string $KD_BLOK
     * @param string $NO_URUT
     * @param string $KD_JNS_OP
     * @return mixed
     */
    public function actionDelete($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP)
    {
        $request = Yii::$app->request;
        $this->findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP)->delete();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }


    }

     /**
     * Delete multiple existing Validasi model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @param string $KD_KECAMATAN
     * @param string $KD_KELURAHAN
     * @param string $KD_BLOK
     * @param string $NO_URUT
     * @param string $KD_JNS_OP
     * @return mixed
     */
    public function actionBulkDelete()
    {        
        $request = Yii::$app->request;
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
       
    }

    public function actionNop(){
        $thn = date('Y');
        $g = Yii::$app->request->get();
        if(empty($g['KD_KECAMATAN']) || empty($g['KD_KELURAHAN'])) return "KECAMATAN DAN KELURAHAN HARUS ADA";
        $dati2 = RefDati2::find()->asArray()->all();

        $q = Validasi::find()->where(['KD_PROPINSI'=>$dati2[0]['KD_PROPINSI'],'KD_DATI2'=>$dati2[0]['KD_DATI2'],'KD_KECAMATAN'=>$g['KD_KECAMATAN'],'KD_KELURAHAN'=>$g['KD_KELURAHAN']]);

        if(!empty($g['KD_BLOK'])) $q->andWhere(['KD_BLOK'=>$g['KD_BLOK']]);
        $q->andWhere('PBB BETWEEN '.$g['PBB_MIN'].' AND '.$g['PBB_MAX']);
        $data = $q->asArray()->all();

        return $this->renderAjax('daf_nop',compact('data'));
    }

    /**
     * Finds the Validasi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @param string $KD_KECAMATAN
     * @param string $KD_KELURAHAN
     * @param string $KD_BLOK
     * @param string $NO_URUT
     * @param string $KD_JNS_OP
     * @return Validasi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP)
    {
        if (($model = Validasi::findOne(['KD_PROPINSI' => $KD_PROPINSI, 'KD_DATI2' => $KD_DATI2, 'KD_KECAMATAN' => $KD_KECAMATAN, 'KD_KELURAHAN' => $KD_KELURAHAN, 'KD_BLOK' => $KD_BLOK, 'NO_URUT' => $NO_URUT, 'KD_JNS_OP' => $KD_JNS_OP])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
