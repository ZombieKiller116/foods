<?php

use app\components\SubscribeWidget;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

Yii::$app->formatter->locale = 'en-US';

$this->title = $post->title;
?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('/web/uploads/<?= $post->imageFile ?>');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-3 bread"><?= $post->title ?></h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 order-lg-last ftco-animate">

                <?= $post->content ?>

                <div class="pt-5 mt-5">
                    <h3 class="mb-5">Comments (<?=count($comments)?>)</h3>
                    <ul class="comment-list">
                        <?php foreach($comments as $comment):?>
                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="/images/person_1.jpg" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3><?=$comment->name?></h3>
                                    <div class="meta"><?=Yii::$app->formatter->asDatetime($comment->created_at, 'php: M d, Y  H:i:s')?></div>
                                    <p><?=$comment->text?></p>
                                </div>
                            </li>
                        <?php endforeach;?>
                    </ul>
                    <!-- END comment-list -->

                    <div class="comment-form-wrap pt-5">
                        <h3 class="mb-5">Leave a comment</h3>
                        <?php $form = ActiveForm::begin(); ?>

                        <?= $form->field($model, 'name')->textInput()->label('Name *') ?>

                        <?= $form->field($model, 'post_id')->hiddenInput(['value' => $post->id])->label(false) ?>

                        <?= $form->field($model, 'text')->textArea(['rows' => 15])->label('Message *') ?>

                        <?= Html::submitButton('Post Comment', ['class' => 'btn py-3 px-4 btn-primary','value' => 'Post Comment', 'name' => 'login-button']) ?>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>

            </div> <!-- .col-md-8 -->
            <div class="col-lg-4 sidebar pr-lg-5 ftco-animate">
                <div class="sidebar-box">
                    <form action="/search" class="search-form" method="POST">
                        <div class="form-group">
                            <span class="icon icon-search"></span>
                            <input type="hidden" name="<?=Yii::$app->request->csrfParam; ?>" value="<?=Yii::$app->request->getCsrfToken(); ?>" />

                            <input type="text" name="search" min="1" class="form-control" placeholder="Type a keyword and hit enter">
                        </div>
                    </form>
                </div>
                <div class="sidebar-box ftco-animate">
                    <ul class="categories">
                        <h3 class="heading mb-4">Categories</h3>
                        <?php foreach ($categories as $category): ?>
                            <li>
                                <a href="/categories/<?=$category->slug?>">
                                    <?= $category->title ?> <span>(<?= count($category->posts) ?>)</span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="sidebar-box ftco-animate">
                    <h3 class="heading mb-4">Recent Blog</h3>
                    <?php foreach ($recentPosts as $post): ?>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4"
                               style="background-image: url(/web/uploads/<?= $post->imageFile ?>);"></a>
                            <div class="text">
                                <h3><a href="<?= Url::to('/posts/' . $post->slug) ?>"><?= $post->title ?></a></h3>
                                <div class="meta">
                                    <div>
                                        <a href="<?= Url::to('/posts/' . $post->slug) ?>"> <?= Yii::$app->formatter->asDatetime($post->created_at, 'php: M d, Y') ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</section> <!-- .section -->

<?=SubscribeWidget::widget()?>
