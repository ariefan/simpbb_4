<?php
namespace app\controllers;
use Yii;
use yii\helpers\Json;

class SpptElController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;

    public function actionGet()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    	$post_data = Yii::$app->request->post();
        $data = \app\models\SpptE::getButuhTtd($post_data);
        // print_r($data);
        echo Json::encode($data);
        exit;
    }

    public function actionGetCount()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    	$post_data = Yii::$app->request->post();
        $data = \app\models\SpptE::getButuhTtdCount($post_data);
        echo Json::encode($data);
        exit;
    }


    public function actionSudahTtd()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $post_data = Yii::$app->request->post();
        $data = \app\models\SpptE::getSudahTtd($post_data);
        echo Json::encode($data);
        exit;
    }

    public function actionTulis()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $post_data = Yii::$app->request->post();

        $kunci = $post_data['KUNCI'];
        $KD_PROPINSI = substr($kunci, 0, 2);
        $KD_DATI2 = substr($kunci, 2, 2);
        $KD_KECAMATAN = substr($kunci, 4, 3);
        $KD_KELURAHAN = substr($kunci, 7, 3);
        $KD_BLOK = substr($kunci, 10, 3);
        $NO_URUT = substr($kunci, 13, 4);
        $KD_JNS_OP = substr($kunci, 17, 1);
        $THN_PAJAK_SPPT = substr($kunci, 18, 4);
        $CETAK_KE = substr($kunci, 22, 2);
        // print_r($post_data);exit;

        $model = $this->findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $THN_PAJAK_SPPT, $CETAK_KE);

        $filename = str_replace('/', '_', $model->FILE_SPPT);

        $model->TGL_TERIMA_TTD = date('Y-m-d H:i:s');
        $model->save();

        $filepath = Yii::getAlias('@webroot/esppt_signed/'.$filename);

        $pdf_content = $post_data['FILE_SPPT'];
        //Decode pdf content
        $pdf_decoded = base64_decode(preg_replace("#^data:image/\w+;base64,#i", "", $pdf_content));
        
        // file_put_contents($location_file, $data);
        // $pdf_decoded = base64_decode($pdf_content);

        //Write data back to pdf file
        $pdf = fopen ($filepath,'w');
        fwrite ($pdf,$pdf_decoded);
        //close output file
        fclose ($pdf);
        echo 'Done';
    }

    protected function findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $THN_PAJAK_SPPT, $CETAK_KE)
    {
        if (($model = \app\models\SpptE::findOne(['KD_PROPINSI' => $KD_PROPINSI, 'KD_DATI2' => $KD_DATI2, 'KD_KECAMATAN' => $KD_KECAMATAN, 'KD_KELURAHAN' => $KD_KELURAHAN, 'KD_BLOK' => $KD_BLOK, 'NO_URUT' => $NO_URUT, 'KD_JNS_OP' => $KD_JNS_OP, 'THN_PAJAK_SPPT' => $THN_PAJAK_SPPT, 'CETAK_KE' => $CETAK_KE])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
