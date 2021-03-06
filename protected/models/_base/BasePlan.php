<?php

/**
 * This is the model base class for the table "plan".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Plan".
 *
 * Columns in table "plan" available as properties of the model,
 * followed by relations of table "plan" available as properties of the model.
 *
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property integer $local
 * @property integer $producto
 *
 * @property UserPlan[] $userPlans
 */
abstract class BasePlan extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'plan';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Plan|Plans', $n);
	}

	public static function representingColumn() {
		return 'nombre';
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

	public function relations() {
		return array(
			'userPlans' => array(self::HAS_MANY, 'UserPlan', 'plan_id'),
		);
	}

	public function pivotModels() {
		return array(
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