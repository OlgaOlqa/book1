<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CommentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Комментарии';
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php if(!empty($comments)): ?>

        <table class="table">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Автор</td>
                    <td>Текст</td>
                </tr>
            </thead>

            <tbody>
                <?php foreach($comments as $comment): ?>

                    <td><?= $comment->id ?></td>
                    <td><?= $comment->user->username ?></td>
                    <td><?= $comment->text ?></td>
                    <td>
                        <a class="btn btn-danger" href="<?= Url::toRoute(['comment/delete', 'id' => $comment->id]) ?>"> Удалить </a>
                    </td>

                <?php endforeach; ?>
            </tbody>
        </table>

    <?php endif; ?>

</div>
