<?php


Yii::import('application.models._base.BaseLocal');

class Local extends BaseLocal
{
        

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function rules() {
		return array(
			array('user_id', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('nombre, fono, foto', 'length', 'max'=>45),
			array('direccion', 'length', 'max'=>100),
			array('resumen', 'length', 'max'=>200),
			array('latitud, longitud', 'length', 'max'=>18),
			array('nombre, direccion, fono, resumen, latitud, longitud, foto', 'default', 'setOnEmpty' => true, 'value' => null),
                        array('id, user_id, nombre, direccion, fono, resumen, latitud, longitud, foto', 'safe', 'on'=>'search'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'user_id' => null,
			'nombre' => Yii::t('app', 'Nombre'),
			'direccion' => Yii::t('app', 'Direccion'),
			'fono' => Yii::t('app', 'Fono'),
			'resumen' => Yii::t('app', 'Resumen'),
			'latitud' => Yii::t('app', 'Latitud'),
			'longitud' => Yii::t('app', 'Longitud'),
			'foto' => Yii::t('app', 'Foto'),
			'user' => null,
			'productos' => null,
			'userPlans' => null,
        
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('nombre', $this->nombre, true);
		$criteria->compare('direccion', $this->direccion, true);
		$criteria->compare('fono', $this->fono, true);
		$criteria->compare('resumen', $this->resumen, true);
		$criteria->compare('latitud', $this->latitud, true);
		$criteria->compare('longitud', $this->longitud, true);
		$criteria->compare('foto', $this->foto, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}