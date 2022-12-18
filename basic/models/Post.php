<?php

namespace app\models;
use yii\db\ActiveRecord;
use Yii;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class Post extends ActiveRecord
{
    public static function tableName()
    {
        return 'post';
    }

    public function rules()
    {
        return [
            [['name', 'description', 'content'], 'required'],
            ['name', 'string', 'max'=>100],
            ['description', 'string', 'max'=>100],
            ['content', 'string'],
            ['image', 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg']
        ];
    }

    public function submit()
    {
        $post = $this;
        $post->name = Yii::$app->request->post()["Post"]["name"];
        $post->content = Yii::$app->request->post()["Post"]["content"];
        $post->description = Yii::$app->request->post()["Post"]["description"];
        $post->image = UploadedFile::getInstance($post, 'image');
        $post->save();
        FileHelper::createDirectory('/var/www/localhost/htdocs/basic/web/upload/thumbs/' . $post->id);
        $post->image->saveAs('/var/www/localhost/htdocs/basic/web/upload/thumbs/' . $post->id . '/' . $post->image->baseName . '.' . $post->image->extension);
    }
}