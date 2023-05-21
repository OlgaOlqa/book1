<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;

?>

<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                
                <?php foreach($recent as $article): ?>
                    <article class="post">
                        <div class="post-thumb">
                            <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>"><img src="uploads/<?php echo $article['image']?>" alt=""></a>
                            <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>" class="post-thumb-overlay text-center">
                                <div class="text-uppercase text-center"> Открыть пост </div>
                            </a>
                        </div>
                        <div class="post-content">
                                <header class="entry-header text-center text-uppercase">
                                    <h6><a href="<?= Url::toRoute(['site/category', 'id' => $article->category->id])?>"> <?= $article->category->title ?></a></h6>
                                    <h1 class="entry-title"><a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>"><?= $article->title ?></a></h1>
                                </header>
                                <div class="decoration">
                                    <a href="#" class="btn btn-default">Decoration</a>
                                </div>
                            <div class="entry-content">
                                <p> <?= $article->description ?> </p>
                                <div class="btn-continue-reading text-center text-uppercase">
                                    <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>" class="more-link"> Читать далее </a>
                                </div>
                            </div>
                            <div class="social-share">
                                <span class="social-share-title pull-left text-capitalize"> <a href="#"> </a> Автор: <?= $article->author->username; ?> | Дата публикации: <?= $article->getDate() ?> </span>
                                <ul class="text-center pull-right">
                                    <li><a class="s-facebook" href="#"><i class="fa fa-eye"></i></a></li> <?= (int) $article->viewed ?>
                                </ul>
                            </div>
                        </div>
                    </article>
                <? endforeach; ?>

                <?php
                    echo LinkPager::widget([
                        'pagination' => $pagination,
                    ]);
                ?>

            </div>
            
            <?= $this->render('/particals/sidebar', [
                'popular' => $popular,
                'recent' => $recent,
                'categories' => $categories
            ]); ?>
            
        </div>
    </div>
</div>
 