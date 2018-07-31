<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Create';
$this->params['breadcrumbs'][] = $this->title;

//
?>


}

<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to create:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?php //$form->field($model, 'is_admin')->radioList( [0=>'Manager', 1 => 'Admin'] ); ?>

                <div class="form-group">
                    <?= Html::submitButton('Create', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    <?= Html::a('Return', ['user/index'], ['class' => 'btn btn-warning']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
