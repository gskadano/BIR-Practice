<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DocumentPriority */

$this->title = 'Update Document Priority: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Document Priorities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="document-priority-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>