<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
		array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-plan-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>

<p>
<?php echo Yii::t('app', 'Text Option Search'); ?></p>

<?php echo GxHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
<div class="search-form">
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'user-plan-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
        'type'=>'striped bordered condensed',
        'template'=>"{items}",
        //'htmlOptions' => array(
        //                        'style' => 'overflow-y:auto;'
        //                                   .'table-layout:fixed;'
        //                                   .'white-space:nowrap;'
        //                                   ),       
	'columns' => array(
		array(
                        'name' => 'id',
                        //'header'=>'id',
                        //'value' => '($model->id',
                        //'htmlOptions'=>array('style'=>'min-width: 50px; max-width: 100px; white-space:nowrap;'),
                     ),
		array(
                        'name'=>'user_id',
                        'value'=>'GxHtml::valueEx($data->user)',
                        'filter'=>GxHtml::listDataEx(User::model()->findAllAttributes(null, true)),
                        //'htmlOptions'=>array('style'=>'min-width: 50px; max-width: 100px; white-space:nowrap;'),
                     ),
		array(
                        'name'=>'plan_id',
                        'value'=>'GxHtml::valueEx($data->plan)',
                        'filter'=>GxHtml::listDataEx(Plan::model()->findAllAttributes(null, true)),
                        //'htmlOptions'=>array('style'=>'min-width: 50px; max-width: 100px; white-space:nowrap;'),
                     ),
		array(
                        'name'=>'local_id',
                        'value'=>'GxHtml::valueEx($data->local)',
                        'filter'=>GxHtml::listDataEx(Local::model()->findAllAttributes(null, true)),
                        //'htmlOptions'=>array('style'=>'min-width: 50px; max-width: 100px; white-space:nowrap;'),
                     ),
                array(
                      'class'=>'bootstrap.widgets.TbButtonColumn',
                      'htmlOptions'=>array('style'=>'width: 50px'),
                  ),                
	),
)); ?>