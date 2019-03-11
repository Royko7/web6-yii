<?php

use  yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Posts */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="posts-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= Html::encode($model->body); ?>
    <?= Html::encode($model->title); ?>


</div>
<!---->
<!--// DetailView::widget([-->
<!--//        'model' => $model,-->
<!--//        'attributes' => [-->
<!--//            'id',-->
<!--//            'user_id',-->
<!--//            'date_create',-->
<!--//            'date_update',-->
<!--//            'title',-->
<!--//            'body:ntext',-->
<!--//        ],-->
<!--//    ])-->
