<?php

namespace common\models;

use phpDocumentor\Reflection\Types\This;
use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property int $phone
 * @property int $status_id
 * @property int $rating
 * @property string $registration_date
 * @property string $last_action_date
 *
 * @property Actions[] $actions
 * @property Statuses $status
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['phone', 'status_id', 'rating'], 'integer'],
            [['registration_date', 'last_action_date'], 'safe'],
            [['name', 'surname'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 255],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Statuses::className(), 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'email' => 'Email',
            'phone' => 'Phone',
            'status_id' => 'Status ID',
            'rating' => 'Rating',
            'registration_date' => 'Registration Date',
            'last_action_date' => 'Last Action Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActions()
    {
        return $this->hasMany(Actions::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Statuses::className(), ['id' => 'status_id']);
    }

    public function getS()
    {
        return $this->hasOne(Statuses::className(), ['id' => 'status_id']);
    }

}
