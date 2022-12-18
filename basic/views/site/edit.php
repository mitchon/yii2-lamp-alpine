<?php

/** @var yii\web\View $this */

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = "Редактировать пост";
?>
<script src="<?php echo Yii::getAlias('@web').'/plugin/ckeditor/ckeditor.js'; ?>"></script>
<div class="m-4">
    <div class="border-bottom">
        <div>
            <h4 class="display-4 text-center">Редактировать пост</h4>
        </div>
    </div>
    <div>
        <div>
            <?php $form = ActiveForm::begin([
                'id' => 'new-form',
                'options' => ['class' => 'form-horizontal'],
            ]); ?>
            <div class="mt-1 mb-1">
                <?= $form->field($post, 'name')->textInput(['value' => $post->name, 'autofocus' => true])->label('Заголовок') ?>
            </div>
            <div class="mt-1 mb-1">
                <?= $form->field($post, 'description')->textInput(['value' => $post->description])->label('Описание') ?>
            </div>
            <div class="mt-1 mb-1">
                <?= $form->field($post, 'image')->fileInput(['value' => $post->image])->label('Обложка') ?>
            </div>
            <div class="mt-1 mb-1">
                <?= $form->field($post, 'content')->textarea(['id' => 'editor1', 'value' => $post->content])->label('Содержимое'); ?>
            </div>

            <div class="form-group mt-1 mb-1">
                <?= Html::submitButton('Редактировать', ['class' => 'btn btn-outline-primary']) ?>
            </div>

        <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    CKEDITOR.replace( 'editor1', {
        filebrowserBrowseUrl:       '<?= Yii::getAlias('@web/plugin/kcfinder'); ?>/browse.php?type=files',
        filebrowserImageBrowseUrl:  '<?= Yii::getAlias('@web/plugin/kcfinder'); ?>/browse.php?type=images',
        filebrowserFlashBrowseUrl:  '<?= Yii::getAlias('@web/plugin/kcfinder'); ?>/browse.php?type=flash',
        filebrowserUploadUrl:       '<?= Yii::getAlias('@web/plugin/kcfinder'); ?>/upload.php?type=files',
        filebrowserImageUploadUrl:  '<?= Yii::getAlias('@web/plugin/kcfinder'); ?>/upload.php?type=images',
        filebrowserFlashUploadUrl:  '<?= Yii::getAlias('@web/plugin/kcfinder'); ?>/upload.php?type=flash',
        filebrowserUploadMethod: 'form'
    });
</script>