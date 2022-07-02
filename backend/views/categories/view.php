<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Categories */
?>
<div class="categories-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'category_name',
            'created_at',
            'updated_at',
            'deleted_at',
            'createdBy.username',
            'updatedBy.username',
            'deletedBy.username',
        ],
    ]) ?>

</div>
