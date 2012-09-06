<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'producto-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'local_id'); ?>
		<?php echo $form->dropDownList($model, 'local_id', GxHtml::listDataEx(Local::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'local_id'); ?>
		</div><!-- row -->
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
		<?php echo $form->labelEx($model,'precio'); ?>
		<?php echo $form->textField($model, 'precio', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'precio'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'detalle'); ?>
		<?php echo $form->textField($model, 'detalle', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'detalle'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'foto'); ?>
		<?php echo $form->textField($model, 'foto', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'foto'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->