<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StationDeskRole */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="station-desk-role-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'station_desk_role_code')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'station_desk_role_name')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'station_desk_role_description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
