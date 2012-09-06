<?php


Yii::import('application.models._base.BasePlan');

class Plan extends BasePlan
{
        

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function rules() {
		return array(
			array('local, producto', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>45),
			array('descripcion', 'length', 'max'=>200),
			array('nombre, descripcion, local, producto', 'default', 'setOnEmpty' => true, 'value' => null),
                        array('id, nombre, descripcion, local, producto', 'safe', 'on'=>'search'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'nombre' => Yii::t('app', 'Nombre'),
			'descripcion' => Yii::t('app', 'Descripcion'),
			'local' => Yii::t('app', 'Local'),
			'producto' => Yii::t('app', 'Producto'),
			'userPlans' => null,
        
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('nombre', $this->nombre, true);
		$criteria->compare('descripcion', $this->descripcion, true);
		$criteria->compare('local', $this->local);
		$criteria->compare('producto', $this->producto);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}