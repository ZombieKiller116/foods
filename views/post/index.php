<?php

use app\components\AboutAndCategoriesWidget;
use app\components\SubscribeWidget;
use yii\widgets\LinkPager;

$this->title = 'Foods page';


?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('/images/bg_4.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-3 bread">Foods</h1>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <?php foreach ($posts as $post):?>
                        <div class="col-md-4 ftco-animate">
                        <div class="blog-entry">
                            <a href="/posts/<?=$post->slug?>" class="img-2"><img src="/web/uploads/<?=$post->imageFile?>" class="img-fluid" alt="Colorlib Template"></a>
                            <div class="text pt-3">
                                <p class="meta d-flex"><span class="pr-3"></span></p><?=$post->category->title?> </span><span class="ml-auto pl-3"><?= Yii::$app->formatter->asDatetime($post->created_at, 'php: M d, Y') ?></span></p>
                                <h3><a href="/posts/<?=$post->slug?>"><?=$post->title?></a></h3>
                                <p class="mb-0"><a href="/posts/<?=$post->slug?>" class="btn btn-black py-2">Read More <span class="icon-arrow_forward ml-4"></span></a></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="row mt-5">
                    <div class="col text-center">
                        <div class="block-27">
                            <?= LinkPager::widget([
                                'pagination' => $pages,
                            ]); ?>
                        </div>
                    </div>
                </div>
            </div>

            <?=AboutAndCategoriesWidget::widget(['categories' => $categories])?>
        </div>
    </div>
</section>


<?=SubscribeWidget::widget()?>