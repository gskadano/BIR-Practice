<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Position;
use backend\models\User;


/* @var $this yii\web\View */
/* @var $model backend\models\Employee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'current_position')->dropDownList(
        ArrayHelper::map(Position::find()->all(),'id','position_description'),
        ['prompt'=>'Select Position']
    ) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <?= $form->field($model, 'update_time')->textInput() ?>

    <?= $form->field($model, 'user_id')->dropDownList(
        ArrayHelper::map(User::find()->all(),'id','username'),
        ['prompt'=>'Select user']

    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
