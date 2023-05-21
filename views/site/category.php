<?php

use yii\widgets\LinkPager;

?>

<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <?php foreach($articles as $article): ?>
                    <article class="post post-list">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="post-thumb">
                                    <a href="blog.html"><img src="uploads/<?php echo $article['image']?>" alt="" class="pull-left"></a>
                                    <a href="blog.html" class="post-thumb-overlay text-center">
                                        <div class="text-uppercase text-center">Открыть пост</div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="post-content">
                                    <header class="entry-header text-uppercase">
                                        <h6><a href="#"> <?= $article->category->title ?> </a></h6>
                                        <h1 class="entry-title"><a href="blog.html"> <?= $article->title ?> </a></h1>
                                    </header>
                                    <div class="entry-content">
                                        <?= $article->content ?>
                                    </div>
                                    <div class="social-share">
                                        <span class="social-share-title pull-left text-capitalize"> Автор: <?= $article->author->username; ?> | Дата публикации: <?= $article->getDate();?> </span>
                                    </div>
                                </div>
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