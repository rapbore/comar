<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('local_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->local)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('categoria_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->categoria)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('nombre')); ?>:
	<?php echo GxHtml::encode($data->nombre); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('precio')); ?>:
	<?php echo GxHtml::encode($data->precio); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('detalle')); ?>:
	<?php echo GxHtml::encode($data->detalle); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('foto')); ?>:
	<?php echo GxHtml::encode($data->foto); ?>
	<br />

</div>