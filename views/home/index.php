<?php
Yii::$app->formatter->locale = 'en-US';
$this->title = 'Main page';

use app\components\AboutWidget;
use app\components\SubscribeWidget;
use yii\helpers\Url;
?>
<section class="home-slider owl-carousel">
    <?php foreach ($featuredPosts as $post): ?>
        <div class="slider-item">
            <div class="container">
                <div class="row d-flex slider-text justify-content-center align-items-center"
                     data-scrollax-parent="true">

                    <div class="img" style="background-image: url(/web/uploads/<?= $post->imageFile ?>);"></div>

                    <div class="text d-flex align-items-center ftco-animate">
                        <div class="text-2 pb-lg-5 mb-lg-4 px-4 px-md-5">
                            <h3 class="subheading mb-3">Featured Posts</h3>
                            <h1 class="mb-5"><?= $post->title ?></h1>
                            <p class="mb-md-5"><?= $post->description ?></p>
                            <p>
                                <a href="<?=Url::to('/posts/' . $post->slug)?>" class="btn btn-black px-3 px-md-4 py-3">
                                    Read More <span class="icon-arrow_forward ml-lg-4"></span>
                                </a>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <?php endforeach; ?>
</section>
<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7 heading-section ftco-animate">
                <h2 class="mb-4"><span>Recent Stories</span></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 order-md-last col-lg-6 ftco-animate">
                <div class="blog-entry">
                    <div class="img img-big d-flex align-items-end" style="background-image: url(/web/uploads/<?=$recentPosts[0]->imageFile?>);">
                        <div class="overlay"></div>
                        <div class="text">
                            <span class="subheading"><?=$recentPosts[0]->category->title?></span>
                            <h3><a href="<?=Url::to('/posts/' . $post->slug)?>""><?=$recentPosts[0]->title?></a></h3>
                            <p class="mb-0"><a href="<?=Url::to('/posts/' . $recentPosts[0]->slug)?>" class="btn-custom">Read More <span
                                            class="icon-arrow_forward ml-4"></span></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <?php foreach ([$recentPosts[1],$recentPosts[2],$recentPosts[3],$recentPosts[4]] as $post):?>
                        <div class="col-md-6 ftco-animate">
                            <div class="blog-entry">
                                <a href="<?=Url::to('/posts/' . $post->slug)?>" class="img d-flex align-items-end"
                                   style="background-image: url(/web/uploads/<?=$post->imageFile?>);">
                                    <div class="overlay"></div>
                                </a>
                                <div class="text pt-3">
                                    <p class="meta d-flex"><span class="pr-3"><?=$post->category->title?></span><span class="ml-auto pl-3"><?=Yii::$app->formatter->asDatetime($post->created_at, 'php: M d, Y')?></span>
                                    </p>
                                    <h3><a href="<?=Url::to('/posts/' . $post->slug)?>"><?=$post->title?></a></h3>
                                    <p class="mb-0"><a href="<?=Url::to('/posts/' . $post->slug)?>" class="btn-custom">Read More <span
                                                    class="icon-arrow_forward ml-4"></span></a></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-12 heading-section ftco-animate">
                        <h2 class="mb-4"><span>Featured Posts</span></h2>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($featuredPosts as $post):?>
                        <div class="col-md-4 ftco-animate">
                        <div class="blog-entry">
                            <a href="#" class="img-2"><img src="/web/uploads/<?=$post->imageFile?>" class="img-fluid"
                                                           alt="Colorlib Template"></a>
                            <div class="text pt-3">
                                <p class="meta d-flex"><span class="pr-3"><?=$post->category->title?></span><span class="ml-auto pl-3"><?=Yii::$app->formatter->asDatetime($post->created_at, 'php: M d, Y')?></span>
                                </p>
                                <h3><a href="<?=Url::to('/posts/' . $post->slug)?>"><?=$post->title?></a></h3>
                                <p class="mb-0"><a href="<?=Url::to('/posts/' . $post->slug)?>" class="btn btn-black py-2">Read More <span
                                                class="icon-arrow_forward ml-4"></span></a></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>

            <?=AboutWidget::widget()?>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt ftco-section-about ftco-no-pb bg-darken">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-9 order-md-last img py-5"
                 style="background-image: url(/images/bg_3.jpg);"></div>

            <div class="col-sm-6 col-md-6 col-lg-3 py-4 text d-flex align-items-center ftco-animate">
                <div class="text-2 py-5 px-4">
                    <p class="mb-5"><a href="https://vimeo.com/45830194" class="btn-custom popup-vimeo">Watch Video
                            <span class="ion-ios-play ml-4"></span></a></p>
                    <h1 class="mb-5">Roger <br> Bosch</h1>
                    <p class="mb-md-5">A small river named Duden flows by their place and supplies it with the necessary
                        regelialia. Far far away, behind the word mountains, far from the countries Vokalia and
                        Consonantia, there live the blind texts.</p>
                    <span class="signature">Roger.Bosch</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12 heading-section ftco-animate">
                        <h2 class="mb-4"><span>Holiday Seasons Recipes</span></h2>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($seasonPosts as $post):?>
                        <div class="col-md-6 col-lg-6 ftco-animate">
                            <div class="blog-entry">
                                <div class="img img-big img-big-2 d-flex align-items-end"
                                     style="background-image: url(/web/uploads/<?=$post->imageFile?>);">
                                    <div class="overlay"></div>
                                    <div class="text">
                                        <span class="subheading"><?=$post->category->title?></span>
                                        <h3><a href="<?=Url::to('/posts/' . $post->slug)?>"><?=$post->title?></a></h3>
                                        <p class="mb-0"><a href="<?=Url::to('/posts/' . $post->slug)?>" class="btn-custom">Read More <span
                                                        class="icon-arrow_forward ml-4"></span></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="sidebar-wrap pt-4">
                    <div class="sidebar-box categories text-center ftco-animate">
                        <h2 class="heading mb-4">Categories</h2>
                        <ul class="category-image">
                            <?php foreach ($categories as $category):?>
                                <li>
                                    <a href="/categories/<?=$category->slug?>" class="img d-flex align-items-center justify-content-center text-center"
                                       style="background-image: url(/web/uploads/<?=$category->imageFile?>);">
                                        <div class="text">
                                            <h3><?=$category->title?></h3>
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-counter ftco-section ftco-no-pt ftco-no-pb img" id="section-counter">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-6 d-flex">
                <div class="img d-flex align-self-stretch" style="background-image:url(/images/about.jpg);"></div>
            </div>
            <div class="col-md-6 pl-md-5 py-5">
                <div class="row justify-content-start pb-3">
                    <div class="col-md-12 heading-section ftco-animate">
                        <h2 class="mb-4">About Stories</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center py-5 bg-light mb-4">
                            <div class="text">
                                <strong class="number" data-number="10">0</strong>
                                <span>Years of Experienced</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center py-5 bg-light mb-4">
                            <div class="text">
                                <strong class="number" data-number="200">0</strong>
                                <span>Foods</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center py-5 bg-light mb-4">
                            <div class="text">
                                <strong class="number" data-number="300">0</strong>
                                <span>Lifestyle</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center py-5 bg-light mb-4">
                            <div class="text">
                                <strong class="number" data-number="40">0</strong>
                                <span>Happy Customers</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?=SubscribeWidget::widget()?>
