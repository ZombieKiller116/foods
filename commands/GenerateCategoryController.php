<?php


namespace app\commands;

use app\models\Category;
use yii\console\Controller;
use Faker\Factory;

class GenerateCategoryController extends Controller
{

    public $count;

    public function actionIndex()
    {
        $faker = Factory::create();
        for ($i = 0; $i < $this->count; $i++) {
            $category = new Category();
            $category->title = $faker->realText('17');
            $category->title = substr($category->title, 0, -1);
            $category->imageFile = (boolean)rand(0,1) ? 'pizza.jpg' : 'sushi.jpeg';
            $category->save();
        }
    }

    public function options($actionID)
    {
        return ['count'];
    }

    public function optionAliases()
    {
        return ['c' => 'count'];
    }
}