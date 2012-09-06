<?php

class ProductoController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Producto'),
		));
	}

	public function actionCreate() {
		$model = new Producto;


		if (isset($_POST['Producto'])) {
			$model->setAttributes($_POST['Producto']);

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
		$model = $this->loadModel($id, 'Producto');


		if (isset($_POST['Producto'])) {
			$model->setAttributes($_POST['Producto']);

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
			$this->loadModel($id, 'Producto')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Producto');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Producto('search');
		$model->unsetAttributes();

		if (isset($_GET['Producto']))
			$model->setAttributes($_GET['Producto']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
        
        public function filters() {
                return array( 'rights', );
        }

}