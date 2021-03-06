<?php

namespace zlrdn\comments\widgets;

use zlrdn\comments\models\Comments;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var $entity string
 * @var $entityID int
 * @var $model Comments
 * */

class CommentFormWidget extends \yii\base\Widget
{
    public $entity = null;
    public $entityID = null;
    public $model;

    public function init()
    {
        $this->model = new Comments();
        $this->model->entity = $this->entity;
        $this->model->entity_id = $this->entityID;

        parent::init(); // TODO: Change the autogenerated stub
    }

    public function run()
    {?>

        <div class="comments-form col-md-10 col-lg-8">

            <?php $form = ActiveForm::begin([
                'action' => '/comments/comment/add-comment',
            ]); ?>

                <?= $form->field($this->model, 'content')
                    ->textarea()
                    ->label('Оставьте коментарий'); ?>

                <div class="form-group">
                    <?= Html::submitButton('Добавить коментарий', ['class' => 'btn btn-success', 'id' => 'zlrdn-add-comment-button']) ?>
                </div>

                <?= $form->field($this->model, 'entity')
                    ->hiddenInput()
                    ->label(false); ?>

                <?= $form->field($this->model, 'entity_id')
                    ->hiddenInput()
                    ->label(false); ?>

            <?php ActiveForm::end(); ?>

        </div><?php
    }
}