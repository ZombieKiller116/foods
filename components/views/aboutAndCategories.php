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
        <div class="sidebar-box categories text-center ftco-animate">
            <h2 class="heading mb-4">Categories</h2>
            <ul class="category-image">
                <?php foreach ($categories as $category): ?>
                    <li>
                        <a href="/categories/<?= $category->slug ?>"
                           class="img d-flex align-items-center justify-content-center text-center"
                           style="background-image: url(/web/uploads/<?= $category->imageFile ?>);">
                            <div class="text">
                                <h3><?= $category->title ?></h3>
                            </div>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="sidebar-box p-4 ftco-animate">
            <form action="/search" class="search-form">
                <div class="form-group">
                    <span class="icon icon-search"></span>
                    <input type="text" min="1" name="search" class="form-control" placeholder="Search">
                </div>
            </form>
        </div>
    </div>
</div>