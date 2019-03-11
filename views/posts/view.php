<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Userdb;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Posts */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
        ],
    ]) ?>
</p>
<?php
//    foreach ($model as $item):
?>
<div class="news-one">
    <div class="col-md-6">
        ID <?= $model->id; ?>

        <p>
            User Name: <?php echo $model->user->username; ?>
        </p>

    </div>


</div>
<?php
//$user = $model->user->username;
//$users = Userdb::findOne(['username'=>$user]);
//echo Yii::$app->user->id;
//print_r($users);
//echo $users;


// echo $this->Po
//endforeach;?>


</div>

<?=
DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',

        'user_id',
        'date_create',
        'date_update',
        'title',
        'body:ntext',
    ],

])

?>



