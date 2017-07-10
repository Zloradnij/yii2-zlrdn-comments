<?php

namespace app\modules\comments\models;

use app\models\User;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "sales_comments".
 *
 * @property integer $id
 * @property string  $entity
 * @property integer $entity_id
 * @property integer $parent_id
 * @property integer $level
 * @property string  $content
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 */

class Comments extends \yii\db\ActiveRecord
{
    public $deleted = false;
    public $date;
    public $author;

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%comments}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entity', 'entity_id', 'content'], 'required'],
            [['entity', 'content'], 'string'],
            [['level', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'           => 'ID',
            'entity'       => 'Сущность',
            'entity_id'    => 'Элемент',
            'comment'      => 'Коментарий',

            'created_at'   => 'Дата создания',
            'updated_at'   => 'Дата изменения',
            'created_by'   => 'Создал',
            'updated_by'   => 'Изменил',

            'createdUser'  => 'Создал',
            'updatedUser'  => 'Изменил',
        ];
    }

    public function getCreatedUser(){
        return $this->hasOne(\Yii::$app->getModule('comments')->userEntity, ['id' => 'created_by']);
    }

    public function getUpdatedUser(){
        return $this->hasOne(\Yii::$app->getModule('comments')->userEntityr, ['id' => 'updated_by']);
    }

    public function afterFind()
    {
        $this->date = date('Y.m.d H:i', $this->created_at);
        $this->author = $this->createdUser ? $this->createdUser->profile->shortFio : 'Unknown Author';

        parent::afterFind(); // TODO: Change the autogenerated stub
    }
}
