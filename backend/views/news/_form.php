<?php

use trntv\filekit\widget\Upload;
use trntv\yii\datetime\DateTimeWidget;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

	<div class="row">
		<div class="col-md-6">
			<div class="box box-solid box-primary">
				<div class="box-header with-border">
					<h5><?= Yii::t('backend', 'Main information');?></h5>
				</div>
				<div class="box-body">
				    <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

				    <?php echo $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

				    <?php echo $form->field($model, 'body')->widget(
					    \yii\imperavi\Widget::className(),
				        [
				            'plugins' => ['fullscreen', 'fontcolor'],
				            'options'=>[
				                'minHeight'=>200,
				                'maxHeight'=>400,
				                'buttonSource'=>true,
				                'imageUpload'=>Yii::$app->urlManager->createUrl(['/file-storage/upload-imperavi'])
				            ]
				        ]
				    ) ?>

				    <?php echo $form->field($model, 'anons_img')->widget(
				        Upload::className(),
				        [
				            'url' => ['/file-storage/upload'],
				            'maxFileSize' => 5000000, // 5 MiB
				        ]);
				    ?>

				    <?php echo $form->field($model, 'anons')->widget(
				        \yii\imperavi\Widget::className(),
				        [
				            'plugins' => ['fullscreen', 'fontcolor', 'video'],
				            'options'=>[
				                'minHeight'=>200,
				                'maxHeight'=>400,
				                'buttonSource'=>true,
				                'imageUpload'=>Yii::$app->urlManager->createUrl(['/file-storage/upload-imperavi'])
				            ]
				        ]
				    ) ?>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="box box-solid box-info">
				<div  class="box-header with-border">
					<h5><?= Yii::t('backend', 'Additional information');?></h5>
				</div>
				<div class="box-body">
				    <?php echo $form->field($model, 'clinic_id')->textInput(['maxlength' => true]) ?>

				    <?php echo $form->field($model, 'view_info_clinic')->checkbox(['checkboxClass' => 'icheckbox_minimal-blue']) ?>

				    <?php echo $form->field($model, 'status')->checkbox() ?>

				    <?php echo $form->field($model, 'published_at')->widget(
				        DateTimeWidget::className(),
				        [
				            'phpDatetimeFormat' => 'dd/MM/yyyy HH:mm',
					        'clientOptions' => [
						        'allowInputToggle' => true,
						        'widgetPositioning' => ['horizontal' => 'left']
					        ]
				        ]
				    ) ?>

				    <?php echo $form->field($model, 'expiries')->widget(
				        DateTimeWidget::className(),
				        [
				            'phpDatetimeFormat' => 'dd/MM/yyyy HH:mm',
					        'clientOptions' => [
						        'allowInputToggle' => true,
						        'widgetPositioning' => ['horizontal' => 'left']
					        ]
				        ]
				    ) ?>
				</div>
			</div>
			<div class="box box-solid box-info">
				<div  class="box-header with-border">
					<h5>SEO</h5>
				</div>
				<div class="box-body">
					<?php echo $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>
					<?php echo $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
	    <div class="box">
		    <div class="box-body">
			    <p class="pull-left">
		        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			    </p>
		    </div>
	    </div>
	</div>

    <?php ActiveForm::end(); ?>

</div>
