<?php


Yii::import('application.models._base.BaseUser');

class User extends BaseUser
{
        

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function rules() {
		return array(
			array('nombre, fono, mail', 'length', 'max'=>45),
			array('nombre, fono, mail', 'default', 'setOnEmpty' => true, 'value' => null),
                        array('id, nombre, fono, mail', 'safe', 'on'=>'search'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'nombre' => Yii::t('app', 'Nombre'),
			'fono' => Yii::t('app', 'Fono'),
			'mail' => Yii::t('app', 'Mail'),
			'locals' => null,
			'userPlans' => null,
        
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('nombre', $this->nombre, true);
		$criteria->compare('fono', $this->fono, true);
		$criteria->compare('mail', $this->mail, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}