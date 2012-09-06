<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('user_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->user)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('plan_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->plan)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('local_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->local)); ?>
	<br />

</div>