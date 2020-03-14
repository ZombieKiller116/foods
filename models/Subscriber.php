<?php


namespace app\models;


use yii\db\ActiveRecord;

class Subscriber extends ActiveRecord
{

    public $email;

    public function rules()
    {
        return [
            ['email', 'unique'],
            ['email', 'required'],
            ['email', 'email']
        ];
    }
}