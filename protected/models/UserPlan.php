<?php


Yii::import('application.models._base.BaseUserPlan');

class UserPlan extends BaseUserPlan
{
        

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function rules() {
		return array(
			array('id', 'required'),
			array('id, user_id, plan_id, local_id', 'numerical', 'integerOnly'=>true),
			array('user_id, plan_id, local_id', 'default', 'setOnEmpty' => true, 'value' => null),
                        array('id, user_id, plan_id, local_id', 'safe', 'on'=>'search'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'user_id' => null,
			'plan_id' => null,
			'local_id' => null,
			'user' => null,
			'plan' => null,
			'local' => null,
        
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('plan_id', $this->plan_id);
		$criteria->compare('local_id', $this->local_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}