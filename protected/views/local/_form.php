<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'local-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->dropDownList($model, 'user_id', GxHtml::listDataEx(User::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'user_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model, 'nombre', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'nombre'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'direccion'); ?>
		<?php echo $form->textField($model, 'direccion', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'direccion'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'fono'); ?>
		<?php echo $form->textField($model, 'fono', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'fono'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'resumen'); ?>
		<?php echo $form->textField($model, 'resumen', array('maxlength' => 200)); ?>
		<?php echo $form->error($model,'resumen'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'latitud'); ?>
		<?php echo $form->textField($model, 'latitud', array('maxlength' => 18)); ?>
		<?php echo $form->error($model,'latitud'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'longitud'); ?>
		<?php echo $form->textField($model, 'longitud', array('maxlength' => 18)); ?>
		<?php echo $form->error($model,'longitud'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'foto'); ?>
		<?php echo $form->textField($model, 'foto', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'foto'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('productos')); ?></label>
		<?php echo $form->checkBoxList($model, 'productos', GxHtml::encodeEx(GxHtml::listDataEx(Producto::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('userPlans')); ?></label>
		<?php echo $form->checkBoxList($model, 'userPlans', GxHtml::encodeEx(GxHtml::listDataEx(UserPlan::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->