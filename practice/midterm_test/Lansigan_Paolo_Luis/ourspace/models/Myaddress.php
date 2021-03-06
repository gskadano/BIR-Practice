<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "myaddress".
 *
 * @property integer $id
 * @property string $home_address
 * @property string $landline
 * @property string $cellphone
 * @property string $firstname
 * @property string $middlename
 * @property string $lastname
 * @property string $gender
 * @property string $created_at
 *
 * @property Mycomment[] $mycomments
 */
class Myaddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'myaddress';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'firstname', 'middlename', 'lastname', 'gender'], 'required'],
            [['id'], 'integer'],
            [['created_at'], 'safe'],
            [['home_address'], 'string', 'max' => 50],
            [['landline', 'cellphone'], 'string', 'max' => 20],
            [['firstname', 'middlename', 'lastname'], 'string', 'max' => 30],
            [['gender'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'home_address' => 'Home Address',
            'landline' => 'Landline',
            'cellphone' => 'Cellphone',
            'firstname' => 'First Name',
            'middlename' => 'Middle Name',
            'lastname' => 'Last Name',
            'gender' => 'Male/Female',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMycomments()
    {
        return $this->hasMany(Mycomment::className(), ['myaddress_id' => 'id']);
    }
}
