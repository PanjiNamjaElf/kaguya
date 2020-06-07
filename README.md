# Kaguya Package for Laravel Settings

[![Software License](https://img.shields.io/github/license/PanjiNamjaElf/kaguya?style=flat-square)](LICENSE.md)
[![StyleCI](https://styleci.io/repos/270025326/shield?branch=master)](https://styleci.io/repos/270025326)
![GitHub Workflow Status](https://img.shields.io/github/workflow/status/panjinamjaelf/kaguya/Run%20PHPUnit%20tests?label=tests&style=flat-square)
![Run PHPUnit tests](https://github.com/panjinamjaelf/kaguya/workflows/Run%20PHPUnit%20tests/badge.svg)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/panjinamjaelf/kaguya.svg?style=flat-square)](https://packagist.org/packages/panjinamjaelf/kaguya)

Laravel package used to store your app settings.

## Installation

```shell script
composer require panjinamjaelf/kaguya
```

After install the package you should run the `kaguya:install` artisan command. This command will publish kaguya assets and migrate database.

## Configuration

You can configure the available menu on settings with publishing the package configuration

```shell script
php artisan vendor:publish --tag=kaguya-config
```

### Content of the configuration

| key          | default value                 | Description                                 |
| ------------ | ----------------------------- | -------------------------------------------|
| settings | default settings | Configure section of the settings page. |
| path | env('KAGUYA_PATH', 'settings') | This URI path where settings will be accessible from.|
| middleware | ['web', 'auth'] |

## Usage
To get setting value from storage

```php
setting('setting_name', 'default');
``` 

Set current setting value
```php
setting(['setting_name' => 'value']);
```

If you want to reset your current settings to default value you can run this command

```shell script
php artisan kaguya:reset
```

Add this following script on any view or controller to get settings page url
```php
route('settings');
```

## View

If you want to customize the view you can publish the view with this command
```shell script
php artisan vendor:publish --tag=kaguya-views
```

## Translation

This package contain translation files, you may run this command to customize the translation.

```shell script
php artisan vendor:publish --tag=kaguya-translations
```

## License

This project and the Laravel framework are open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
