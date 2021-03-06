<?php

/**
 * This is the model base class for the table "categoria".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Categoria".
 *
 * Columns in table "categoria" available as properties of the model,
 * followed by relations of table "categoria" available as properties of the model.
 *
 * @property integer $id
 * @property integer $categoria_id
 * @property string $nombre
 * @property string $descripcion
 *
 * @property Categoria $categoria
 * @property Categoria[] $categorias
 * @property Producto[] $productos
 */
abstract class BaseCategoria extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'categoria';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Categoria|Categorias', $n);
	}

	public static function representingColumn() {
		return 'nombre';
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

	public function relations() {
		return array(
			'categoria' => array(self::BELONGS_TO, 'Categoria', 'categoria_id'),
			'categorias' => array(self::HAS_MANY, 'Categoria', 'categoria_id'),
			'productos' => array(self::HAS_MANY, 'Producto', 'categoria_id'),
		);
	}

	public function pivotModels() {
		return array(
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