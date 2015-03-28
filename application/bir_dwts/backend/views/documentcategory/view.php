<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\DocumentCategory */

$this->title = $model->document_category_name;
$this->params['breadcrumbs'][] = ['label' => 'Document Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->document_category_name], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->document_category_name], [
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
            'document_category_name',
            'document_category_description:ntext',
            'create_time',
            'update_time',
        ],
    ]) ?>

</div>
