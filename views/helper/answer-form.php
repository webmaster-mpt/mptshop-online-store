<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\HelperSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Поддержка';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    #helper-question{
        background-color: inherit;
        color: inherit;
    }
    #helper-answer{
        background-color: inherit;
        color: inherit;
    }
    #helper-user_id{
        background-color: inherit;
        color: inherit;
    }
</style>
<div class="helper-answer-form">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin([
        'options' => [
            'method' => 'post',
        ],
    ]); ?>
    <table class="table table-sm table-bordered">
        <thead>
            <tr>
                <th>Вопрос</th>
                <th>Ответ</th>
                <th>Пользователь</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php /** @var \common\models\Helper $helpers **/
            foreach ($helpers as $helper){ ?>
            <tr>
                <td>
                    <?= $form->field($helper, "[$id]question")->textarea(['disabled' => true,'rows' => 6])->label(false) ?>
                </td>
                <td>
                    <?= $form->field($helper, "[$id]answer")->textarea(['disabled' => false,'rows' => 6])->label(false) ?>
                </td>
                <td>
                    <?= $form->field($helper, "[$id]user_id")->input('text',['disabled' => true,'value' => $helper->user->username])->label(false) ?>
                </td>
                <td>
                    <button type="submit" name='delete' value='<?php echo $helper->id?>' class="btn btn-danger btn-block">
                        X
                    </button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <input type="submit" class="btn btn btn-primary" value="Сохранить">
<!--    <button type="submit" name='clear' value='1' class="btn btn-danger" data-confirm="Вы уверены что хотите очистить таблицу?">-->
<!--        Очистить-->
<!--    </button>-->
    <?php \yii\widgets\ActiveForm::end() ?>
</div>
