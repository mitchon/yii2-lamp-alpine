<?php
/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;
$this->title = Yii::$app->name
?>
<div>
    <h4 class="display-4 text-center">Изучение стека LAMP.</h4>
</div>
<div class="ms-4 me-4 album py-5 bg-light">
    <div class="d-flex justify-content-between align-items-center">
        <p class="display-6">Посты</p>
        <a role="button" class="btn btn-outline-primary btn-sm" href="<?= Url::to(['site/new']) ?>">Новый пост</a>
    </div>
    <div class="container">
        <div class="row">
            <?php foreach ($posts as $post): ?>
                <div class="col-md-3">
                    <div class="card mb-4" style="width: 18rem;">
                        <figure class="figure" style="width: 100%; height: 200px;">
                            <?= Html::img("@web/upload/thumbs/{$post->id}/{$post->image}", ['class' => 'card-img-top', 'alt' => "{$post->name}", 'style' => 'max-height:100%; object-fit: cover;']) ?>
                        </figure>
                        <div class="card-body">
                            <div class="border-bottom">
                                <h3 class="card-title">
                                    <a 
                                        class="stretched-link"
                                        style="text-decoration: inherit; color: inherit;",
                                        href="<?= Url::to(['site/post', 'id' => $post->id]) ?>"
                                    >
                                        <?= $post->name ?>
                                    </a>
                                </h3>
                                <p class="card-text mb-2"><?= $post->description ?></p>
                            </div>
                            <p class="card-text mt-1">
                                <?php echo Yii::$app->formatter->asDate($post->date); ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>