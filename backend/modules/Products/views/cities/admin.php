<?php





use yii\helpers\Html;backend\


use yii\grid\GridView;





/* @var $this yii\web\View */


/* @var $searchModel app\modules\Products\models\CitiesSearch */


/* @var $dataProvider yii\data\ActiveDataProvider */





$this->title = Yii::t('app', 'Városok');


$this->params['breadcrumbs'][] = $this->title;


?>


<div class="cities-index">





    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>





    <p>


        <?= Html::a(Yii::t('app', 'Új város'), ['create'], ['class' => 'btn btn-success']) ?>


    </p>





    <?= GridView::widget([


        'dataProvider' => $dataProvider,


        'filterModel' => $searchModel,


        'columns' => [


            ['class' => 'yii\grid\SerialColumn'],





            'id',


            'name',





            [


                'class' => 'yii\grid\ActionColumn',


                'template' => '{update} {delete}'


            ],


        ],


    ]); ?>





</div>


