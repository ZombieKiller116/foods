<div class="col-lg-3">
    <div class="sidebar-wrap">
        <div class="sidebar-box p-4 about text-center ftco-animate">
            <h2 class="heading mb-4">About Me</h2>
            <img src="/images/author.jpg" class="img-fluid" alt="Colorlib Template">
            <div class="text pt-4">
                <p>Hi! My name is <strong>Cathy Deon</strong>, behind the word mountains, far from the
                    countries Vokalia and Consonantia, there live the blind texts. Separated they live in
                    Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            </div>
        </div>
        <div class="sidebar-box p-4 ftco-animate">
            <form action="/search" class="search-form" method="POST">
                <div class="form-group">
                    <span class="icon icon-search"></span>
                    <input type="hidden" name="<?=Yii::$app->request->csrfParam; ?>" value="<?=Yii::$app->request->getCsrfToken(); ?>" />
                    <input type="text" min="1" class="form-control" name="search" placeholder="Search">
                </div>
            </form>
        </div>
    </div>
</div>