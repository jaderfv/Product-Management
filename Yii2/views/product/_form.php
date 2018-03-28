<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Supplier;
use yii\helpers\ArrayHelper

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'productName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category')->textInput(['maxlength' => true]) ?>
	
	<?php 
		$supplier=Supplier::find()->all();
		$listSupplier=ArrayHelper::map($supplier,'supplierID','name');
		echo $form->field($model, 'supplierID')->dropDownList(
			$listSupplier,
			['prompt'=>'Select Supplier']
        );
	?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
