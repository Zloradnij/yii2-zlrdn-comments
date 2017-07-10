<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAssetZlrdnComments extends AssetBundle
{
    public $sourcePath = '@vendor/zlrdn';
    public $css = [
        'css/zlrdn-comments.css',
    ];
    public $js = [
        'js/zlrdn-comments.js',
    ];

    public $depends = ['yii\web\JqueryAsset'];
}
