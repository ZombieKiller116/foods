<?php


namespace app\models\forms;


use yii\base\Model;

class CommentForm extends Model
{
    public $name;
    public $post_id;
    public $text;

    public function rules()
    {
        return [
            [['name', 'post_id', 'text'], 'required'],
        ];
    }
}