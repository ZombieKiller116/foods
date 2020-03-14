<?php


namespace app\models\forms;


use yii\base\Model;

class PostFormUpdate extends Model
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
            [['title', 'description', 'category_id', 'content'], 'required'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
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