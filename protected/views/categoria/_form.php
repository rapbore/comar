<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'categoria-form',
	'enableAjaxValidation' => true,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'categoria_id'); ?>
		<?php echo $form->dropDownList($model, 'categoria_id', GxHtml::listDataEx(Categoria::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'categoria_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model, 'nombre', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'nombre'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model, 'descripcion', array('maxlength' => 200)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('categorias')); ?></label>
		<?php echo $form->checkBoxList($model, 'categorias', GxHtml::encodeEx(GxHtml::listDataEx(Categoria::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('productos')); ?></label>
		<?php echo $form->checkBoxList($model, 'productos', GxHtml::encodeEx(GxHtml::listDataEx(Producto::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->