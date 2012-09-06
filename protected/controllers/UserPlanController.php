<?php

class UserPlanController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'UserPlan'),
		));
	}

	public function actionCreate() {
		$model = new UserPlan;


		if (isset($_POST['UserPlan'])) {
			$model->setAttributes($_POST['UserPlan']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'UserPlan');


		if (isset($_POST['UserPlan'])) {
			$model->setAttributes($_POST['UserPlan']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'UserPlan')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('UserPlan');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new UserPlan('search');
		$model->unsetAttributes();

		if (isset($_GET['UserPlan']))
			$model->setAttributes($_GET['UserPlan']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
        
        public function filters() {
                return array( 'rights', );
        }

}