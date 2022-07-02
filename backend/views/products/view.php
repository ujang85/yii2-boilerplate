<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Products */
?>
<div class="products-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'product_name',
            'category_id',
            'created_at',
            'updated_at',
            'deleted_at',
            'created_by',
            'updated_by',
            'deleted_by',
        ],
    ]) ?>

</div>
