<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Products;
use app\models\Repositories\ProductsRepository;

use kartik\daterange\DateRangePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            [
                'attribute'=>'title',              
                'content'=>function($data){
                    return Html::a($data->title, ['view', 'id' => $data->id]);
                }
            ],
            [
                'attribute'=>'country_id', 
                'label' => 'Country',               
                'content'=>function($data){
                    return $data->getCountryName();
                },
                'filter' => ProductsRepository::getCountryList()
            ],
            [
                'attribute'=>'category_id',
                'label' => 'Category',                
                'content'=>function($data){
                    return $data->getCategoryyName();
                },
                'filter' => ProductsRepository::getCategoryList()
            ],            
            'price',            
            [
                'attribute'=>'color',                
                'filter' => ProductsRepository::getСolorList()
            ], 
            [
                'attribute'=>'created_at', 
                'label' => 'Date',               
                'filterOptions' => ['style' => 'width: 230px'],
                'filter' => DateRangePicker::widget([
                    'model'=> $searchModel,
                    'attribute'=>'created_at',
                    'convertFormat'=>true,
                    'pluginOptions'=>[                        
                        'timePickerIncrement'=>30,
                        'locale'=>[
                            'format'=>'Y-m-d'
                        ],
                        'opens'=>'left'
                    ]
                ])
            ]
            
        ],
    ]); ?>


</div>
