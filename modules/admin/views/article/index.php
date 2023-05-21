<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\User;
use app\models\Category;

/** @var yii\web\View $this */
/** @var app\models\ArticleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Посты';
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить пост', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'description:ntext',
            'content:ntext',
            'date',
            [
                'format' => 'html',
                'label' => 'Изображение',
                'value' => function($data){
                    return Html::img(Yii::getAlias('@web') . '/uploads/' . $data['image'], ['width'=>200]);
                }
            ],
            'viewed',
            [
                'label'=>'Пользователь',
                'value' => function ($data) {
                return User::findOne(['id'=>$data->user_id])->username;
            }],
            //'status',
            [
                'label'=>'Категории',
                'value' => function ($data) {
                return Category::findOne(['id'=>$data->category_id])->title;
            }],

            [
                'class' => 'yii\grid\ActionColumn',
            ],
        ],
    ]); ?>


</div>
