<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model common\models\document */

$this->title = $model->document_tracking_number;
$this->params['breadcrumbs'][] = ['label' => 'Documents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-view">

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
            'document_tracking_number',
            'document_name',
            'document_description',
            'document_target_date',
            [
                'label' => 'Document Category',
                'value' => $model->documentCategory->document_category_name,
            ],
            [
                'label' => 'Document Priority',
                'value' => $model->documentPriority->document_priority_name,
            ],
            [
                'label' => 'Document Type',
                'value' => $model->documentType->document_type_name,
            ],
            'document_comment',
            [
                'label' => 'Employee',
                'value' => $model->employee->employee_last_name,
            ],
            [
                'label' => 'Customer',
                'value' => $model->customer->customer_lastname,
            ],
            'company_agency_id',
            [
                'label' => 'Company Agency',
                'value' => $model->companyAgency->company_agency_code,
            ],
            [
                'label' => 'Section',
                'value' => $model->section->section_name,
            ],
            'logo',
            'create_time',
            'update_time',
        ],
    ]) ?>

</div>
