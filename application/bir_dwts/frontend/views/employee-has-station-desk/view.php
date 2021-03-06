<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\EmployeeHasStationDesk */

$this->title = $model->employee_id;
$this->params['breadcrumbs'][] = ['label' => 'Employee Has Station Desks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-has-station-desk-view">

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
//            'id',
            [
                'attribute' => 'employee_id',
                'value' => $model->employee->employee_last_name,
            ],
            [
                'attribute' => 'station_desk_id',
                'value' => $model->stationDesk->station_desk_name,
            ],
            [
                'attribute' => 'station_desk_role_id',
                'value' => $model->stationDeskRole->station_desk_role_name,
            ],
            'create_time',
            'update_time',
        ],
    ]) ?>

</div>
