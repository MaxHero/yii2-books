<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

/**
 * @property integer $id
 * @property string  $firstname
 * @property string  $lastname
 */
class Author extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%author}}';
    }

    /**
     * @inheritdoc
     */
    public function fields()
    {
        return [
            'id',
            'text' => 'fullname',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname'], 'required'],
            [['firstname', 'lastname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @return string
     */
    public function getFullname()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getFullname();
    }
}
