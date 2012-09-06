<?php
/**
 * This is the template for generating the model class of a specified table.
 * In addition to the default model Code, this adds the CSaveRelationsBehavior
 * to the model class definition.
 * - $this: the ModelCode object
 * - $tableName: the table name for this class (prefix is already removed if necessary)
 * - $modelClass: the model class name
 * - $columns: list of table columns (name=>CDbColumnSchema)
 * - $labels: list of attribute labels (name=>label)
 * - $rules: list of validation rules
 * - $relations: list of relations (name=>relation declaration)
 * - $representingColumn: the name of the representing column for the table (string) or
 *   the names of the representing columns (array)
 */
?>
<?php echo "<?php\n"; ?>

<?php
    $array_fechas = array();
    //$columns_con_fechas = $columns;
    
    foreach($columns as $name=>$column):
        
    if(strtoupper($column->dbType) == 'DATE'){
        array_push($array_fechas, $name .'_inicio');
        
        array_push($array_fechas, $name .'_termino');    
    }            
    endforeach;
    
    $array_fechas = array_flip($array_fechas);
//    echo var_dump($array_fechas);
    //echo var_dump($columns_con_fechas);
    //array_push($columns_con_fechas, $array_fechas);
    //echo var_dump($columns_con_fechas);
//    foreach($array_fechas as $a):
//        array_push($columns_con_fechas, $a);
//    endforeach;
//    echo var_dump($columns_con_fechas);
?>

Yii::import('<?php echo "{$this->baseModelPath}.{$this->baseModelClass}"; ?>');

class <?php echo $modelClass; ?> extends <?php echo $this->baseModelClass."\n"; ?>
{
    <?php foreach($array_fechas as $name=>$column): ?>
    <?php echo "public \${$name};\n"; ?>
    <?php endforeach; ?>    

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function rules() {
		return array(
<?php foreach($rules as $rule): ?>
			<?php echo $rule.",\n"; ?>
<?php endforeach; ?>
                        array('<?php echo implode(', ', array_keys($columns)); foreach($array_fechas as $name=>$column) echo ', '. $name?>', 'safe', 'on'=>'search'),
		);
	}

	public function attributeLabels() {
		return array(
<?php foreach($labels as $name=>$label): ?>
<?php if($label === null): ?>
			<?php echo "'{$name}' => null,\n"; ?>
<?php else: ?>
			<?php echo "'{$name}' => {$label},\n"; ?>
<?php endif; ?>
<?php endforeach; ?>
    <?php foreach($array_fechas as $name=>$column): ?>
			<?php echo "'{$name}' => Yii::t('app', '{$name}'),\n"; ?>
    <?php endforeach; ?>    
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

<?php foreach($columns as $name=>$column): ?>
<?php $partial = ($column->type==='string' and !$column->isForeignKey); ?>
		$criteria->compare('<?php echo $name; ?>', $this-><?php echo $name; ?><?php echo $partial ? ', true' : ''; ?>);
<?php if(strtoupper($column->dbType) == 'DATE'){
                echo '		if((isset($this->'.$name.'_inicio) && trim($this->'.$name.'_inicio) != "") && (isset($this->'.$name.'_termino) && trim($this->'.$name.'_termino) != ""))';
                echo '		$criteria->addBetweenCondition(\''.$name.'\', $this->'.$name.'_inicio, $this->'.$name.'_termino);
                    ';
            }
      ?>
<?php endforeach; ?>

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}