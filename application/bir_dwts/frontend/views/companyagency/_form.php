<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CompanyAgency */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-agency-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company_agency_code')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'company_agencyl_name')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'company_agency_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <?= $form->field($model, 'update_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>