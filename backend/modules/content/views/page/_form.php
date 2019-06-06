<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 *
 * @var $this yii\web\View
 * @var $model common\models\Page
 */

$form = ActiveForm::begin([
    'enableClientValidation' => false,
    'enableAjaxValidation' => true,
]);

echo $form->field($model, 'title')->textInput(['maxlength' => true]);

echo $form->field($model, 'slug')->textInput(['maxlength' => true]);

echo $form->field($model, 'body')->widget(\yii\imperavi\Widget::class,
        [
            'plugins' => [
                'fullscreen',
                'fontcolor',
                'video'
            ],
            'options' => [
                'minHeight' => 400,
                'maxHeight' => 400,
                'buttonSource' => true,
                'imageUpload' => Yii::$app->urlManager->createUrl([
                    '/file/storage/upload-imperavi'
                ]),
            ],
        ]);

echo $form->field($model, 'status')->checkbox();
?>

<div class="form-group">
    <?php
        foreach ($model->fields() as $field)
            if(strpos($field, "meta") === 0)
                echo $form->field($model, $field)->textInput();
    ?>
</div>

<div class="form-group">
    <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end() ?>
