<?php


Yii::import('application.models._base.BaseCategoria');

class Categoria extends BaseCategoria
{
        

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function rules() {
		return array(
			array('categoria_id', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>45),
			array('descripcion', 'length', 'max'=>200),
			array('categoria_id, nombre, descripcion', 'default', 'setOnEmpty' => true, 'value' => null),
                        array('id, categoria_id, nombre, descripcion', 'safe', 'on'=>'search'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'categoria_id' => null,
			'nombre' => Yii::t('app', 'Nombre'),
			'descripcion' => Yii::t('app', 'Descripcion'),
			'categoria' => null,
			'categorias' => null,
			'productos' => null,
        
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('categoria_id', $this->categoria_id);
		$criteria->compare('nombre', $this->nombre, true);
		$criteria->compare('descripcion', $this->descripcion, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}