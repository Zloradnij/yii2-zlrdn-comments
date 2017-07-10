<?php

namespace app\modules\comments\widgets;

/**
 * @var $entity string
 * @var $entityID int
 * */

class CommentsListWidget extends \yii\base\Widget
{
    public $currentComments;

    public $entity = null;
    public $entityID = null;

    public function run()
    {?>
        <h3><?= !empty($this->currentComments) ? 'Коментарии:' : 'Коментариев нет. Будь первым.'?></h3>

        <div class="zlrdn-comments-list col-md-10 col-lg-8">

            <div class="zlrdn-comment-item-zero">
                <div class="zlrdn-comment-item">
                    <div class="zlrdn-comment-item-params">
                        <div class="zlrdn-comment-item-param-author"></div>
                        <div class="zlrdn-comment-item-param-date"></div>
                    </div>
                    <div class="zlrdn-comment-item-content"></div>
                </div>
            </div><?php

            foreach ($this->currentComments as $comment) {?>
                <div class="zlrdn-comment-item">
                    <div class="zlrdn-comment-item-params">
                        <div class="zlrdn-comment-item-param-author col-md-6"><?= $comment->author?></div>
                        <div class="zlrdn-comment-item-param-date col-md-5 text-right"><?= $comment->date?></div><?php
                            if (\Yii::$app->user->identity->getId() == $comment->created_by) {?>
                                <div class="zlrdn-comment-item-param-delete col-md-1 text-right">
                                    <span
                                        class="glyphicon glyphicon-trash zlrdn-comment-item-param-delete"
                                        data-id="<?= $comment->id?>"
                                    ></span>
                                </div><?php
                            }?>
                    </div>
                    <div class="zlrdn-comment-item-content"><?= $comment->content?></div>
                </div><?php
            }?>

        </div><?php
    }
}