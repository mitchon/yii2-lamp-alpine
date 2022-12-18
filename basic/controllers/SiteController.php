<?php

namespace app\controllers;

use Yii;
use app\models\Post;
use yii\web\Controller;
use yii\web\UploadedFile;

class SiteController extends Controller
{

    public function actionIndex()
    {
        $posts = Post::find()->orderBy(['date' => SORT_DESC])->all();
        return $this->render('index', compact('posts'));
    }

    public function actionPost($id)
    {
        $post = Post::find()->where(['id' => $id])->all();
        if (!empty($post))
        {
            return $this->render('post', compact('post'));
        }
        else
            return $this->render('error');
    }

    public function actionNew()
    {
        $post = new Post();
        if (Yii::$app->request->isPost) {
            $post->submit();
            return $this->redirect(['post', 'id' => $post->id]);
        }
        $_SESSION['KCFINDER']['disabled'] = false;
        $_SESSION['KCFINDER']['uploadURL'] = Yii::getAlias('@web/upload/');
//        $_SESSION['KCFINDER']['uploadDir'] = Yii::getAlias('@web/upload/');
        return $this->render('new', [
            'model' => $post,
        ]);
    }

    public function actionEdit($id)
    {
        $post = Post::find()->where(['id' => $id])->one();
        if (Yii::$app->request->isPost) {
            $post->submit();
            return $this->redirect(['post', 'id' => $post->id]);
        }

        return $this->render('edit', [
            'post' => $post,
        ]);
    }
}