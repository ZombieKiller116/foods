<?php

namespace app\models\forms;

use yii\base\Model;


class CategoryForm extends Model
{
    public $title;
    public $imageFile;

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg'],
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