<?php

namespace app\modules\comments;


use Yii;

class Module extends \yii\base\Module
{
    const VERSION = '0.1.0';

    private $showForm = false;

    public $minimalRole;
    public $adminRole;
    public $userEntity;
    public $isAnonymouse;

    public function init()
    {
        if (!empty($this->userEntity) && ($this->isAnonymouse || (Yii::$app->user->identity && !$this->isAnonymouse && Yii::$app->user->can($this->minimalRole)))) {
            $this->showForm = true;
        }

        parent::init();
    }

    public function getShowForm()
    {
        return $this->showForm;
    }
}
