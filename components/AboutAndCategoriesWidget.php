<?php


namespace app\components;


use yii\base\Widget;

class AboutAndCategoriesWidget extends Widget
{

    public $categories;

    public function init()
    {
        parent::init();

    }

    public function run()
    {
        return $this->render('aboutAndCategories', ['categories' => $this->categories]);
    }
}