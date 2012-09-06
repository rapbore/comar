<?php
/**
 * This is the template for generating a controller class file for CRUD feature.
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>

class <?php echo $this->controllerClass; ?> extends <?php echo $this->baseControllerClass; ?> {

<?php 
	$authpath = 'ext.giix-core.giixCrud.templates.default.auth.';
	Yii::app()->controller->renderPartial($authpath . $this->authtype);
?>

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, '<?php echo $this->modelClass; ?>'),
		));
	}

	public function actionCreate() {
		$model = new <?php echo $this->modelClass; ?>;

<?php if ($this->enable_ajax_validation): ?>
		$this->performAjaxValidation($model, '<?php echo $this->class2id($this->modelClass)?>-form');
<?php endif; ?>

		if (isset($_POST['<?php echo $this->modelClass; ?>'])) {
			$model->setAttributes($_POST['<?php echo $this->modelClass; ?>']);
<?php if ($this->hasManyManyRelation($this->modelClass)): ?>
			$relatedData = <?php echo $this->generateGetPostRelatedData($this->modelClass, 4); ?>;
<?php endif; ?>

<?php if ($this->hasManyManyRelation($this->modelClass)): ?>
			if ($model->saveWithRelated($relatedData)) {
<?php else: ?>
			if ($model->save()) {
<?php endif; ?>
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model-><?php echo $this->tableSchema->primaryKey; ?>));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, '<?php echo $this->modelClass; ?>');

<?php if ($this->enable_ajax_validation): ?>
		$this->performAjaxValidation($model, '<?php echo $this->class2id($this->modelClass)?>-form');
<?php endif; ?>

		if (isset($_POST['<?php echo $this->modelClass; ?>'])) {
			$model->setAttributes($_POST['<?php echo $this->modelClass; ?>']);
<?php if ($this->hasManyManyRelation($this->modelClass)): ?>
			$relatedData = <?php echo $this->generateGetPostRelatedData($this->modelClass, 4); ?>;
<?php endif; ?>

<?php if ($this->hasManyManyRelation($this->modelClass)): ?>
			if ($model->saveWithRelated($relatedData)) {
<?php else: ?>
			if ($model->save()) {
<?php endif; ?>
				$this->redirect(array('view', 'id' => $model-><?php echo $this->tableSchema->primaryKey; ?>));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, '<?php echo $this->modelClass; ?>')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('<?php echo $this->modelClass; ?>');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$session=new CHttpSession;
		$session->open();		
		$criteria = new CDbCriteria(); 
            
		$model = new <?php echo $this->modelClass; ?>('search');
		$model->unsetAttributes();
                
                if(isset($_GET['<?php echo $this->modelClass; ?>']))
		{
                        $model->attributes=$_GET['<?php echo $this->modelClass; ?>'];
			
			
                   <?php
                    foreach($this->tableSchema->columns as $column)
                      {
                     ?>
	
                       if (!empty($model-><?php echo  $column->name; ?>)) $criteria->addCondition('<?php echo  $column->name; ?> = "'.$model-><?php echo  $column->name; ?>.'"');
                       <?php if(strtoupper($column->dbType) == 'DATE'){?>
                       if (!empty($model-><?php echo  $column->name; ?>_inicio) && !empty($model-><?php echo  $column->name; ?>_termino) ) $criteria->addBetweenCondition('<?php echo  $column->name; ?>', ''.$model-><?php echo  $column->name; ?>_inicio.'', ''.$model-><?php echo  $column->name; ?>_termino.'');
                       <?php } ?>
                    <?php 
                      } 
                    ?>
			
		}
                 $session['<?php echo $this->modelClass; ?>_records']=<?php echo $this->modelClass; ?>::model()->findAll($criteria); 

		if (isset($_GET['<?php echo $this->modelClass; ?>']))
			$model->setAttributes($_GET['<?php echo $this->modelClass; ?>']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
        
        public function filters() {
                return array( 'rights', );
        }
        
        public function actionGenerateExcel()
	{
            $session=new CHttpSession;
            $session->open();		
            
             if(isset($session['<?php echo $this->modelClass; ?>_records']))
               {
                $model=$session['<?php echo $this->modelClass; ?>_records'];
               }
               else
                 $model = <?php echo $this->modelClass; ?>::model()->findAll();

		
		Yii::app()->request->sendFile(date('YmdHis').'.xls',
			$this->renderPartial('excelReport', array(
				'model'=>$model
			), true)
		);
	}
        
        public function actionGeneratePdf() 
	{
           $session=new CHttpSession;
           $session->open();
		Yii::import('application.extensions.giiplus.bootstrap.*');
		require_once('tcpdf/tcpdf.php');
		require_once('tcpdf/config/lang/eng.php');

             if(isset($session['<?php echo $this->modelClass; ?>_records']))
               {
                $model=$session['<?php echo $this->modelClass; ?>_records'];
               }
               else
                 $model = <?php echo $this->modelClass; ?>::model()->findAll();



		$html = $this->renderPartial('expenseGridtoReport', array(
			'model'=>$model
		), true);
		
		//die($html);
		
		$pdf = new TCPDF();
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(Yii::app()->name);
		$pdf->SetTitle('<?php echo $this->modelClass; ?> Report');
		$pdf->SetSubject('<?php echo $this->modelClass; ?> Report');
		//$pdf->SetKeywords('example, text, report');
		$pdf->SetHeaderData('', 0, "Report", '');
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Example Report by ".Yii::app()->name, "");
		$pdf->setHeaderFont(Array('helvetica', '', 8));
		$pdf->setFooterFont(Array('helvetica', '', 6));
		$pdf->SetMargins(15, 18, 15);
		$pdf->SetHeaderMargin(5);
		$pdf->SetFooterMargin(10);
		$pdf->SetAutoPageBreak(TRUE, 0);
		$pdf->SetFont('dejavusans', '', 7);
		$pdf->AddPage();
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->LastPage();
		$pdf->Output("<?php echo $this->modelClass; ?>_002.pdf", "I");
	}
}