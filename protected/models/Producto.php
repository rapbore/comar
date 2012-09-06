<?php


Yii::import('application.models._base.BaseProducto');

class Producto extends BaseProducto
{
        

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function rules() {
		return array(
			array('local_id, categoria_id', 'numerical', 'integerOnly'=>true),
			array('nombre, precio, foto', 'length', 'max'=>45),
			array('detalle', 'length', 'max'=>100),
			array('local_id, categoria_id, nombre, precio, detalle, foto', 'default', 'setOnEmpty' => true, 'value' => null),
                        array('id, local_id, categoria_id, nombre, precio, detalle, foto', 'safe', 'on'=>'search'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'local_id' => null,
			'categoria_id' => null,
			'nombre' => Yii::t('app', 'Nombre'),
			'precio' => Yii::t('app', 'Precio'),
			'detalle' => Yii::t('app', 'Detalle'),
			'foto' => Yii::t('app', 'Foto'),
			'local' => null,
			'categoria' => null,
        
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('local_id', $this->local_id);
		$criteria->compare('categoria_id', $this->categoria_id);
		$criteria->compare('nombre', $this->nombre, true);
		$criteria->compare('precio', $this->precio, true);
		$criteria->compare('detalle', $this->detalle, true);
		$criteria->compare('foto', $this->foto, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}