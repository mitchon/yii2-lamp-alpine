<?php
/** @var yii\web\View $this */
use yii\helpers\Url;

$this->title = $post[0]->name;
foreach($post as $this_post):
?>
<div class="m-3">
    <div class="border-bottom">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="display-4"><?= $this_post->name ?></h4>
            <a role="button" class="btn btn-outline-primary btn-sm" href="<?= Url::to(['site/edit', 'id' => $this_post->id]) ?>">Редактировать</a>
        </div>
    </div>
    <div>
        <div>
            <p class="lead text-end"><?= $this_post->date ?></p>
        </div>
        <div>
            <?= $this_post->content ?>
        </div>
    </div>
</div>
<?php endforeach;?>
