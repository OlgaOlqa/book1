<?php if(!empty($comments)): ?>
    <?php foreach($comments as $comment): ?>
        <div class="bottom-comment">
            <div class="comment-img">
                <img class="img-circle" src="public/images/comment-img.jpg" alt="">
            </div>
            <div class="comment-text">
                <a href="#" class="replay btn pull-right"> Replay </a>
                <h5> <?= $comment->user->username; ?> </h5>
                <p class="comment-date"> <?= $comment->getDate(); ?> </p>
                <p class="para"> <?= $comment->text; ?> </p>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<?php if(!Yii::$app->user->isGuest): ?>
    <div class="leave-comment">
        <h4>Оставьте свой комментарий</h4>

        <?php $form = \yii\widgets\ActiveForm::begin([
            'action' => ['site/comment', 'id' => $article->id],
            'options' => ['class' => 'form-horizontal contact-form', 'role' => 'form']
        ])?>

        <div class="form-group">
            <div class="col-md-12">
                <?=
                    $form->field($commentForm, 'comment')
                        ->textarea(['class'=>'form-control', 'placeholder'=>'Напишите комментарий'])
                        ->label(false)
                ?>
            </div>
        </div>
        <button type="submit" class="btn send-btn">Отправить</a>

        <?php \yii\widgets\ActiveForm::end(); ?>
    </div>
<?php endif; ?>