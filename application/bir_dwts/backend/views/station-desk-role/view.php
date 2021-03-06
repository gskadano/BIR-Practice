<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StationDeskRole */

$this->title = $model->station_desk_role_name;
$this->params['breadcrumbs'][] = ['label' => 'Station Desk Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="station-desk-role-view">

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
 //           'id',
            'station_desk_role_code',
            'station_desk_role_name',
            'station_desk_role_description:ntext',
            'create_time',
            'update_time',
        ],
    ]) ?>

</div>
