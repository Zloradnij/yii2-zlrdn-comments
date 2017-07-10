<?php

namespace zlrdn\comments;


use Yii;

class Module extends \yii\base\Module
{
    const VERSION = '1.0.1';

    private $showForm = false;

    public $minimalRole;
    public $adminRole;
    public $userEntity;
    public $isAnonymouse;
    public $profileRelation;
    public $userNameField = 'username';

    public function init()
    {
        if (!empty($this->userEntity) && ($this->isAnonymouse || (Yii::$app->user->identity && !$this->isAnonymouse && Yii::$app->user->can($this->minimalRole)))) {
            $this->showForm = true;
        }

        parent::init();
    }

    /**
     * @return bool
     */
    public function getShowForm()
    {
        return $this->showForm;
    }
}
