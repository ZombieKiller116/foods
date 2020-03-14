<?php
namespace app\models\forms;

use yii\base\Model;

class CategoryFormUpdate extends Model
{
    public $title;
    public $id;
    public $imageFile;

    public function rules()
    {
        return [
            [['title', 'id'], 'required'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
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