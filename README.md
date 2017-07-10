Universal comments module
=========================
Universal comments module

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist zlrdn/yii2-comments:dev-master
```

or add

```
"zlrdn/yii2-comments": "dev-master"
```
```
    "repositories": [
      {
        "type": "git",
        "url": "https://github.com/Zloradnij/yii2-zlrdn-comments/"
      },
```

to the require section of your `composer.json` file.

Settings
-----

config.php

```php
    'modules' =>[
        'comments' => [
            'class' => '\zlrdn\comments\Module',
            'userEntity' => 'app\models\User',
            'minimalRole' => 'employee',
            'adminRole' => 'develop',
            'isAnonymouse' => false,
            'profileRelation' => 'profile',
            'userNameField'   => 'shortFio',

            'controllerMap' => [
                'default' => [
                    'class' => 'zlrdn\comments\controllers\CommentController',
                ]
            ]
        ],
        ...
```

Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
    <?= \zlrdn\comments\assets\AppAssetZlrdnComments::register($this); ?>

    <?= \zlrdn\comments\widgets\CommentsWidget::widget([
        'entity' => 'Events',
        'entityID' => $model->id,
    ]);?>
```
