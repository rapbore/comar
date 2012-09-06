<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'plan-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

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
		<div class="row">
		<?php echo $form->labelEx($model,'local'); ?>
		<?php echo $form->textField($model, 'local'); ?>
		<?php echo $form->error($model,'local'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'producto'); ?>
		<?php echo $form->textField($model, 'producto'); ?>
		<?php echo $form->error($model,'producto'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('userPlans')); ?></label>
		<?php echo $form->checkBoxList($model, 'userPlans', GxHtml::encodeEx(GxHtml::listDataEx(UserPlan::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->