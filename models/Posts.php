<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%posts}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string $date_create
 * @property string $date_update
 * @property string $title
 * @property string $body
 *
 * @property Comments[] $comments
 * @property Users $user
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%posts}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'title', 'body'], 'required'],
            [['user_id'], 'integer'],
            [['date_create', 'date_update'], 'safe'],
            [['body'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Userdb::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Username',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
            'title' => 'Title',
            'body' => 'Body',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {

//        $query = Posts::findOne('users');
//        $query->id;
//        $query->user->id;
        return $this->hasOne(Userdb::className(), ['id' => 'user_id']);
    }

    public function beforeSave($insert)
    {

        $date = date('Y-m-d H:i:s');
//        $date = $data = date('Y-m-d ') . (date('H') + 2) . date(':i:s');

        if ($insert) {
            $this->date_create = $this->date_update = $date;
        } else {
            $this->date_create = $date;
        }

        return parent::beforeSave($insert);
    }
}
