<?php
/**
 * Created by PhpStorm.
 * User: ROG
 * Date: 2019. 02. 05.
 * Time: 20:38
 */

use backend\components\extra;
use insolita\adminlte3\Lte;
use insolita\adminlte3\LteSmallBox;
use kartik\helpers\Html;
use yii\helpers\Url;

?>

<!--suppress ALL -->
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-xs-12 col-md-3">
            <?php
            LteSmallBox::begin([
                'type' => Lte::COLOR_MAROON,
                'title' => $monthlySold . 'EUR',
                'icon' => 'fa fa-list-alt',
                'text' => 'Monthly sold'
            ]) ?>
            <?php LteSmallBox::end() ?>
        </div>
        <div class="col-xs-12 col-md-3">
            <?php
            LteSmallBox::begin([
                'type' => Lte::COLOR_BLUE,
                'title' => $todaySold . ' EUR',
                'text' => 'Today Sold',
                'icon' => 'fa fa-list-alt',
            ]) ?>
            <?php LteSmallBox::end() ?>
        </div>
        <div class="col-xs-12 col-md-3">
            <?php
            LteSmallBox::begin([
                'type' => Lte::COLOR_OLIVE,
                'title' => "Batthyány tér",
                'text' => 'Current assigned location',
                'icon' => 'fa fa-map-marker',
            ]) ?>
            <?php LteSmallBox::end() ?>
        </div>
        <div class="col-xs-12 col-md-3">
            <?php
            LteSmallBox::begin([
                'type' => Lte::COLOR_TEAL,
                'title' => "$startTicketId",
                'icon' => 'fa fa-ticket',
                'text' => 'Next ticked ID',
                'footer' => 'View ticket block',
                'link' => Url::to("/Tickets/tickets/admin")
            ]) ?>
            <?php LteSmallBox::end() ?>
        </div>
    </div>
    <?php
    $gridColumns = [
        'id',
        'updateDate',
        # 'bookingId',

        'bookedChairsCount',
        # 'source',
        # 'sellerName',
        # 'invoiceDate',

        'bookingCost',
        'orderCurrency',
        # 'bookingDate',
        /* [
             'label' => 'Edit Booking',
             'format'=>'html',
             'value' => function ($model) {
                 return '<a href="/Reservations/reservations/bookingedit?id='.$model->returnId().'">Edit'.'</a>';
             }
         ],*/

    ];

    echo \kartik\grid\GridView::widget([

        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'pjax' => true,
        'toolbar' => [
            [

                'options' => ['class' => 'btn-group mr-2']
            ],
            '{export}',
            '{toggleData}',
        ],
        'toggleDataContainer' => ['class' => 'btn-group mr-2'],
        // set export properties
        'export' => [
            'fontAwesome' => true,

        ],
        'bordered' => true,
        'striped' => true,
        'panel' => [
            'heading' => '<i class="fa fa-calendar"></i>',

        ],

    ]);

    ?>
</div>