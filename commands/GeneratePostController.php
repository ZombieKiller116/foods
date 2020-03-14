<?php


namespace app\commands;


use app\models\Post;
use Faker\Factory;
use yii\console\Controller;

class GeneratePostController extends Controller
{
    public $count;

    public function actionIndex()
    {
        $faker = Factory::create();

        for ($i = 0; $i < $this->count; $i++) {
            $category = new Post();
            $category->title = $faker->realText('17');
            $category->title = substr($category->title, 0, -1);
            $category->imageFile = (boolean)rand(0,1) ? 'pizza.jpg' : 'sushi.jpeg';
            $category->is_feature = rand(0,1);
            $category->description = $faker->realText('50');
            $category->is_season = rand(0,1);
            $category->category_id = rand(1,3);
            $category->content = $faker->realText('500');
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