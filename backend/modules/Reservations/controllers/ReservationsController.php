<?php
namespace backend\modules\Reservations\controllers;

use backend\controllers\Controller;
use backend\modules\MadActiveRecord\models\MadActiveRecord;
use backend\modules\Reservations\models\Reservations;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Yii;
use backend\modules\Reservations\models\ReservationsAdminSearchModel;
use backend\modules\Reservations\models\DateImport;

use yii\db\Exception;
use yii\filters\AccessControl;
use yii\helpers\Json;

/**
 * ReservationsController implements the CRUD actions for ReservationsModel.
 */
class ReservationsController extends Controller {


    public function actionAlius() {
        $searchModel = new ReservationsAdminSearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $connection=YII::$app->db;
        $dateImportModel= new DateImport();


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'connection'=>$connection,
            'dateImportModel'=>$dateImportModel

        ]);
    }

    /**
     * Lists all Products models.
     * @return mixed
     */

    public function importDateRange($source,$dateFrom, $dateTo){

        $dateFrom=date('Y-m-d',strtotime($dateFrom));
        $dateTo=date('Y-m-d',strtotime($dateTo));
        $url=$source.'/wp-json/bookings/v1/start/'.$dateFrom.'/end/'.$dateTo;
        $curl=curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_VERBOSE, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response=curl_exec($curl);
        curl_close($curl);

        $jsonResponse=json_decode(utf8_decode($response));



        return $jsonResponse;



    }

    public function actionAdmin() {
        $searchModel = new ReservationsAdminSearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $connection=YII::$app->db;
        $dateImportModel= new DateImport();
        $request=Yii::$app->request;
        $dateImport = $request->post('DateImport');
        $response= $this->importDateRange($dateImport['source'],$dateImport['dateFrom'],$dateImport['dateTo']);
        $importResponse='No Import initiated';

        if($response) {
            $updateCounter=0;
            $newRecordCounter=0;

            foreach ($response as $booking) {
                if(!isset($booking->personInfo)) $booking->personInfo='';

                $data=['boookingDetails'=> $booking->bookingDetails,'orderDetails'=>$booking->orderDetails,'personInfo'=>$booking->personInfo,'updateDate'=>date("Y-m-d H:i:s")];

                $data=json_encode($data);

                $values = [
                    'bookingId' => $booking->bookingId,
                    'productId' => $booking->bookingDetails->booking_product_id,
                    'source' => $dateImport['source'],
                    'invoiceDate' => $booking->orderDetails->paid_date,
                    'bookingDate' => $booking->bookingDetails->booking_start,
                    'data' => $data
                ];

                /**
                 * $bookingVerifyComd verifies if booing alreadz exists if so it will be updated, else new record creted
                 * TODO Needs Speed Improvement @palius
                 */
                $query = Reservations::aSelect(Reservations::class, '*', Reservations::tableName(), 'bookingId=' . $booking->bookingId);

                try {
                    $rows = $query->one();
                } catch (Exception $e) {
                }

                if (isset($rows)) {
                    $updateCounter+=1;
                    $model = $rows;

                } else {
                    $model = new Reservations();
                    $newRecordCounter+=1;


                }

                if (Reservations::insertOne($model, $values)) {
                    $importResponse = 'Import Completed <br/><strong>'.$updateCounter.' </strong>updated <br/><strong>'.$newRecordCounter.'</strong> imported ';

                } else {
                    $importResponse = 'Import failed';
                    //show an error message
                }

                #$importResponse=$rows;



            }


        }

        return $this->render('admin', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'connection'=>$connection,
            'dateImportModel'=>$dateImportModel,
            'response'=>$response,
            'importResponse'=>$importResponse

        ]);
    }

    public function actionIndex() {
        $searchModel = new ReservationsAdminSearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('admin', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionBookingedit(){

        $model = new DateImport();
        $request=Yii::$app->request;
        $bookingId=$request->get('bookingId');
        $query = Reservations::aSelect(Reservations::class, '*', Reservations::tableName(), 'bookingId=' . $bookingId);

        try {
            $bookingInfo = $query->one();
        } catch (Exception $e) {
        }

        $backendData=$bookingInfo;
        return $this->render('bookingedit',['model'=>$model,'backenddata'=>$backendData]);


    }
}