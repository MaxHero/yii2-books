<?php

namespace app\components;

use yii\base\Component;
use yii\base\Exception;
use yii\helpers\FileHelper;
use yii\helpers\Url;
use Yii;

class PreviewService extends Component
{
    public $previewsPath = '@app/web/previews';
    public $previewsWebPath = '@web/previews';

    public $supportedExtensions = [
        'jpg',
        'jpeg',
        'png',
    ];

    /**
     * @param string $content
     * @param string $extension
     * @return bool|string filename of saved preview or FALSE on error
     */
    public function save($content, $extension)
    {
        if (!in_array($extension, $this->supportedExtensions)) {
            return false;
        }

        $md5 = md5($content);
        $dir = Yii::getAlias($this->previewsPath) . DIRECTORY_SEPARATOR . substr($md5, 0, 2);

        try{
            if (FileHelper::createDirectory($dir)) {
                $filePath = $dir . DIRECTORY_SEPARATOR . substr($md5, 2) . '.' . $extension;
                if (file_exists($filePath) || file_put_contents($filePath, $content)) {
                    return $md5 . '.' . $extension;
                }
            }
        } catch (Exception $e){
        }

        return false;
    }

    /**
     * @param string $preview
     * @return string
     */
    public function getUrl($preview)
    {
        return Url::to($this->previewsWebPath . '/' . substr($preview, 0, 2) . '/' . substr($preview, 2));
    }
}
