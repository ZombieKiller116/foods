<?php

use app\components\AboutAndCategoriesWidget;
use app\components\SubscribeWidget;
use yii\widgets\LinkPager;

?>
    <section class="hero-wrap hero-wrap-2" style="background-image: url('/images/bg_4.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-3 bread">Search "<?=$search?>"</h1>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <?php if(count($posts) == 0):?>
                        <div class="alert alert-danger">Nothing was found for your search</div>
                    <?php endif;?>
                    <?php foreach ($posts as $post): ?>
                        <div class="col-md-6 col-lg-12 ftco-animate">
                            <div class="blog-entry d-lg-flex">
                                <div class="half">
                                    <a href="/posts/<?=$post->slug?>" class="img d-flex align-items-end"
                                       style="background-image: url(/web/uploads/<?= $post->imageFile ?>);">
                                        <div class="overlay"></div>
                                    </a>
                                </div>
                                <div class="text px-md-4 px-lg-5 half pt-3">
                                    <p class="meta d-flex"><span class="pr-3"><?= $post->category->title ?></span><span
                                            class="ml-auto pl-3"><?= Yii::$app->formatter->asDatetime($post->created_at, 'php: M d, Y') ?></span>
                                    </p>
                                    <h3><a href="/posts/<?=$post->slug?>"></a><?= $post->title ?></a></h3>
                                    <p><?= $post->description ?></p>
                                    <p class="mb-0"><a href="/posts/<?= $post->slug ?>" class="btn btn-primary">Read
                                            More <span
                                                class="icon-arrow_forward ml-4"></span></a></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="col text-center">
                        <?= LinkPager::widget([
                            'pagination' => $pages
                        ]); ?>
                </div>

            </div>

            <?=AboutAndCategoriesWidget::widget(['categories' => $categories])?>
        </div>
    </div>
</section>


<?=SubscribeWidget::widget()?>