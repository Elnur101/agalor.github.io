<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'category_id')->textInput() ?>
                <?= $form->field($model, 'user_id')->textInput() ?>
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
                <?= $form->field($model, 'price')->textInput() ?>
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Добавить') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'visible')->checkbox(['0','1'],['prompt'=>'0'])?>
                <?= $form->field($model, 'hit')->checkbox(['0','1'],['prompt'=>'0']) ?>
                <?= $form->field($model, 'new')->checkbox(['0','1'],['prompt'=>'0'])?>
                <?= $form->field($model, 'sale')->checkbox(['0','1'],['prompt'=>'0']) ?>
                <?= $form->field($model, 'image')->fileInput() ?>


            </div>

    </div>




    <?php ActiveForm::end(); ?>

</div>
