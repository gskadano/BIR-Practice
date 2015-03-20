<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DocumentCategory */

$this->title = 'Create Document Category';
$this->params['breadcrumbs'][] = ['label' => 'Document Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
