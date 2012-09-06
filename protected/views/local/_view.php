<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('user_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->user)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('nombre')); ?>:
	<?php echo GxHtml::encode($data->nombre); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('direccion')); ?>:
	<?php echo GxHtml::encode($data->direccion); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('fono')); ?>:
	<?php echo GxHtml::encode($data->fono); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('resumen')); ?>:
	<?php echo GxHtml::encode($data->resumen); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('latitud')); ?>:
	<?php echo GxHtml::encode($data->latitud); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('longitud')); ?>:
	<?php echo GxHtml::encode($data->longitud); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('foto')); ?>:
	<?php echo GxHtml::encode($data->foto); ?>
	<br />
	*/ ?>

</div>