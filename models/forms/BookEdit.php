<?php

namespace app\models\forms;

use app\models\Book;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use Yii;

class BookEdit extends Book
{
    /**
     * @var UploadedFile
     */
    public $image;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $result = ArrayHelper::merge(
            parent::rules(),
            [
                [
                    ['image'],
                    'image',
                    'extensions' => Yii::$app->preview->supportedExtensions,
                    'minWidth'   => 100,
                    'maxWidth'   => 2000,
                    'maxSize'    => 1048576, //1M
                ],
            ]
        );

        if ($this->getIsNewRecord()) {
            $result[] = [['image'], 'required'];
        }

        return $result;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        $result = parent::attributeLabels();

        return ArrayHelper::merge(
            $result,
            [
                'image' => $result['preview'],
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function beforeValidate()
    {
        if (!parent::beforeValidate()) {
            return false;
        }

        if ($this->image) {
            $content = file_get_contents($this->image->tempName);
            $extension = $this->image->getExtension();

            if (!($preview = Yii::$app->preview->save($content, $extension))) {
                return false;
            }

            $this->preview = $preview;
        }

        return true;
    }
}
