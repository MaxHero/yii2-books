<?php

namespace app\models;

use Yii;

/**
 * @property integer $id
 * @property string  $name
 * @property string  $date_create
 * @property string  $date_update
 * @property string  $preview
 * @property string  $date
 * @property integer $author_id
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%book}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'date_create', 'date_update', 'preview', 'date', 'author_id'], 'required'],
            [['date_create', 'date_update', 'date'], 'safe'],
            [['author_id'], 'integer'],
            [['name', 'preview'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'          => 'ID',
            'name'        => 'Название',
            'date_create' => 'Дата добавления',
            'date_update' => 'Дата редактирования',
            'preview'     => 'Превью',
            'date'        => 'Дата выхода книги',
            'author_id'   => 'Автор',
        ];
    }
}
