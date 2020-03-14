<?php

if(Yii::$app->session->hasFlash('subscribe')) {
    echo "<div class=\"modal\" tabindex=\"-1\" role=\"dialog\" id='myModal'>
  <div class=\"modal-dialog\" role=\"document\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\">Message about the subscription</h5>
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span>
        </button>
      </div>
      <div class=\"modal-body\">
        <p>" . Yii::$app->session->getFlash('subscribe'). "</p>
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
      </div>
    </div>
  </div>
</div>";
    $js = <<< JS
    $('#myModal').modal();
JS;
    $this->registerJs($js, $this::POS_END);

}
?>
<section class="ftco-subscribe ftco-section bg-light">
    <div class="overlay">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 text-wrap text-center heading-section ftco-animate">
                    <h2 class="mb-4"><span>Subcribe to our Newsletter</span></h2>
                    <p>A small river named Duden flows by their place and supplies it with the necessary
                        regelialia. It is a paradisematic country, in which roasted parts of sentences fly into
                        your mouth.</p>
                    <div class="row d-flex justify-content-center mt-4 mb-4">
                        <div class="col-md-8">
                            <form action="/subscribe" class="subscribe-form" method="POST">
                                <div class="form-group d-flex">
                                    <input type="email" class="form-control" max="60" name="email" required placeholder="Enter email address">
                                    <input type="hidden" name="<?=Yii::$app->request->csrfParam; ?>" value="<?=Yii::$app->request->getCsrfToken(); ?>" />
                                    <input type="submit" value="Subscribe" class="submit px-3">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>