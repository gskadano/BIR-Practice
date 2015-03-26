<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Employee;
use backend\models\Customer;
use backend\models\CompanyAgency;
use backend\models\DocumentCategory;
use dosamigos\datepicker\DatePicker;
use common\models\User;


//$model->roles = Yii::$app->user->identity->username;
//<?= $form->field($model, 'encoded_by')->textInput(['value' => Yii::$app->user->identity->id,'readonly' => true]
/* @var $this yii\web\View */
/* @var $model backend\models\Document */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="document-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="encoded">
    <?= $form->field($model, 'encoded_by')->textInput(['value' => Yii::$app->user->identity->id,'readonly' => true]
   
    ) ?>
    </div>
    <?= $form->field($model, 'customer_id')->dropDownList(
        ArrayHelper::map(Customer::find()->all(),'id','customer_lastname'),
        ['prompt'=>'Select Customer']
    ) ?>

    <?= $form->field($model, 'company_agency_id')->dropDownList(
        ArrayHelper::map(CompanyAgency::find()->all(),'id','company_agency_full_name'),
        ['prompt'=>'Select CompanyAgency']
    ) ?>

    <?= $form->field($model, 'document_tracking_number')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'document_description')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'document_category')->dropDownList(
        ArrayHelper::map(DocumentCategory::find()->all(),'id','document_category_name'),
        ['prompt'=>'Select DocumentCategory']
    ) ?>

    <?= $form->field($model, 'document_priority')->textInput(['maxlength' => 45]) ?>

        <?= $form->field($model, 'document_target_date')->widget(
         DatePicker::className(), [
        // inline too, not bad
        'inline' => false, 
         // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);?>

    <?= $form->field($model, 'document_type')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'document_notes')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'document_image_front_page')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>