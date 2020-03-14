<?php


namespace app\models\forms;


use yii\base\Model;

class PostForm extends Model
{
    public $title;
    public $imageFile;
    public $description;
    public $category_id;
    public $content;
    public $is_feature;
    public $is_season;

    public function rules()
    {
        return [
            [['title', 'imageFile', 'description', 'category_id', 'content'], 'required'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg'],
            [['is_feature', 'is_season'], 'safe']
        ];
    }

    public function upload($slug){
        if($this->validate()){
            $this->imageFile->saveAs("uploads/{$slug}.{$this->imageFile->extension}");
            return true;
        }else{
            return false;
        }
    }
}