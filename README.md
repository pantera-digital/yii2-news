# yii2-news
News content management module for Yii Framework 2.x Модуль предназначен для шаблона advanced

## Установка
Предпочтительно через composer:
```
$ composer require pantera-digital/yii2-news "dev-kid"
```

## Backend
```
'modules' => [
    'news' => [
        'class' => 'pantera\news\backend\Module',
    ],
],
```

## Frontend 
```
'modules' => [
    'news' => [
        'class' => 'pantera\news\frontend\Module',
    ],
],
```

## Миграции
```
$ php yii migrate/up --migrationPath=@pantera/news/console/migrations
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.
