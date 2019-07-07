<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "statuses".
 *
 * @property int $id
 * @property string $status_name
 * @property int $to_send_message
 * @property int $to_publish
 * @property int $to_look
 *
 * @property Users[] $users
 */
class Statuses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'statuses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_name'], 'required'],
            [['to_send_message', 'to_publish', 'to_look'], 'integer'],
            [['status_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_name' => 'Status Name',
            'to_send_message' => 'To Send Message',
            'to_publish' => 'To Publish',
            'to_look' => 'To Look',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['status_id' => 'id']);
    }
}
