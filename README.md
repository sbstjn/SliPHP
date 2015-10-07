<p align="center">
    <img src="https://cdn.rawgit.com/sbstjn/SliPHP/master/logo.svg"
         height="320">
</p>
<p align="center">
    <a href="https://circleci.com/gh/sbstjn/SliPHP/"><img src="https://img.shields.io/circleci/project/sbstjn/SliPHP/master.svg" alt="Circle CI"></a> 
    <a href="https://travis-ci.org/sbstjn/SliPHP"><img src="https://img.shields.io/travis/sbstjn/SliPHP.svg" alt="Travis CI"></a> 
    <a href="https://scrutinizer-ci.com/g/sbstjn/SliPHP/"><img src="https://img.shields.io/scrutinizer/build/g/sbstjn/SliPHP.svg" alt="Scrutinizer"></a><br />
    <a href="https://scrutinizer-ci.com/g/sbstjn/SliPHP"><img src="https://img.shields.io/scrutinizer/g/sbstjn/SliPHP.svg" alt="Scrutinizer Code Quality"></a> 
    <a href="https://scrutinizer-ci.com/g/sbstjn/SliPHP/"><img src="https://img.shields.io/scrutinizer/coverage/g/sbstjn/SliPHP.svg" alt="Scrutinizer Code Coverage"></a><br />
    <a href="https://packagist.org/packages/sbstjn/sliphp"><img src="https://img.shields.io/packagist/v/sbstjn/SliPHP.svg" alt="Packagist"></a>
    <a href="https://github.com/sbstjn/SliPHP/blob/master/LICENSE.md"><img src="https://img.shields.io/packagist/l/sbstjn/SliPHP.svg" alt="MIT License"></a>
</p>
<p align="center"><sup><strong>Atomic view and layout engine for PHP 5.4 and above.</strong></sup></p>

## Usage

To use **SliPHP** please configure the global constant `SLIPHP_VIEWS` and set it to the directory where your *views*, *layouts* and *blocks* are located. 

### Installation

```bash
composer require sbstjn/sliphp
```

### Basics

As mentioned above, just configure the needed constant and you are good to go …

```php
define ('SLIPHP_VIEWS', '/var/www/views/');
```

The folder structure inside your `SLIPHP_VIEWS` path should look something like this:

```
/var/www/views/index.php (View)
/var/www/views/layouts/default.php (Layout)
/var/www/views/blocks/header.php (Block)
```

### Views

It's that simple to render a view from your `SLIPHP_VIEWS` folder:

```php
$view = new SliPHP\View('index');
die($view);
```

Your `index.php` could look like this:

```html
<strong>Hi!</strong>
```

### Layouts

Of course you want to have a separate file for your layout, which will be wrapped around your `index` view: 

```php
$layout = new SliPHP\Layout('default');
$layout->body(new SliPHP\View('index'));

die($layout);
```

Your `layouts/default.ph` file could look like this:

```php
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>SliPHP</title>
    <meta charset="utf-8" />
  </head>
  <body><?=$view->body()?></body>
</html>
```

As you might guess, the content of your view gehts inserted inside the `body` tag. Woho, Magic …

### Blocks

For sure **SliPHP** supports loading single files and have them rendered into your views and layouts. We call them *blocks*, just use the `->block()` method for loading them:

```php
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>SliPHP Example</title>
    <?=$view->block('header')?>
  </head>
  <body><?=$view->body()?></body>
</html>
```

Your `blocks/header.php` could look like this:

```php
<meta charset="utf-8" />
```

Blocks can load other blocks as well, so feel free to move your styles and script to separate files for example:

```php
<meta charset="utf-8" />

<?=$view->block('styles')?>
<?=$view->block('script')?>
```

### Apply

If you want to apply a function or a list of functions to a data object, you can use the `$view->apply` function to modify your data:

```php
<strong><?=$view->apply('KATZE', 'ucfirst|strtolower')?><?=$view->apply('KATZE', 'strtolower|ucfirst')?></strong>
```

Will be rendered into:

```html
<strong>katzeKatze</strong>
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email mail@sbstjn.com instead of using the issue tracker.

## Credits

- [Sebastian Müller](http://sbstjn.com)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.