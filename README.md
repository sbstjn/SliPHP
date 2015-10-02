# SliPHP

Atomic view and layout engine for PHP 5.4 and above.

## Usage

To use **SliPHP** please configure the global constant `SLIPHP_VIEWS` and set it to the directory where your *views*, *layouts* and *blocks* are located. 

### Basics

As mentioned above, just configure a constant and you are good to go …

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

It's that simple to render a view inside your `SLIPHP_VIEWS` folder:

```
$view = new SliPHP\View('index');
die($view->render());
```

Your `index.php` could look like this:

```php
<strong>Hi!</strong>
```

### Layouts

Of course you want to have separate file for your layout, which will be wrapped around your `index` view: 

```php
// Configure View
$view = new SliPHP\View('index');

// Configure Layout
$layout = new SliPHP\Layout('default');
$layout->set('body', $view->render());

die($layout->render());
```

Your `layouts/default.ph` file could look like this:

```php
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>SliPHP</title>
    <meta charset="utf-8" />
  </head>
  <body><?=$view->get('body')?></body>
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
  <body><?=$view->get('body')?></body>
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