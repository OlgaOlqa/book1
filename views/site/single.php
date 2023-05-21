<?php

use yii\helpers\Url;

?>

<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post">
                    <div class="post-thumb">
                        <a href="blog.html"><img src="uploads/<?php echo $article['image']?>" alt=""></a>
                    </div>
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">
                            <h6><a href="<?= Url::toRoute(['site/category', 'id' => $article->category->id])?>"> <?= $article->category->title ?> </a></h6>
                            <h1 class="entry-title"><a href="<?= Url::toRoute(['site/view', 'id' => $article->id])?>"> <?= $article->title ?> </a></h1>
                        </header>
                        <div class="entry-content">
                            <?= $article->content ?>
                        </div>
                        <div class="decoration">
                            <a href="#" class="btn btn-default">Decoration</a>
                        </div>
                        <div class="social-share">
							<span class="social-share-title pull-left text-capitalize"> Автор: <?= $article->author->username; ?> 
                            | Дата публикации: <?= $article->getDate();?> </span>
                            <ul class="text-center pull-right">
                                <li><a class="s-facebook" href="#"><i class="fa fa-eye"></i></a></li> <?= (int) $article->viewed ?>
                            </ul>
                        </div>
                    </div>
                </article>

                <?= $this->render('/particals/comment', [
                    'article' => $article,
                    'comments' => $comments,
                    'commentForm' => $commentForm
                ]) ?>

            </div>

            <?= $this->render('/particals/sidebar', [
                'popular' => $popular,
                'recent' => $recent,
                'categories' => $categories
            ]); ?>

        </div>
    </div>
</div>