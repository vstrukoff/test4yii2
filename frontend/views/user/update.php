<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Update User: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<?php
if (!Yii::$app->user->can('UserCUD')) {
    var_dump(Yii::$app->user);
    echo ('Access denied'); die;
}
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Return', ['user/index'], ['class' => 'btn btn-warning']) ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </p>

</div>
