<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'user-plan-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
		<?php echo $form->error($model,'id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->dropDownList($model, 'user_id', GxHtml::listDataEx(User::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'user_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'plan_id'); ?>
		<?php echo $form->dropDownList($model, 'plan_id', GxHtml::listDataEx(Plan::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'plan_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'local_id'); ?>
		<?php echo $form->dropDownList($model, 'local_id', GxHtml::listDataEx(Local::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'local_id'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->