Twig Inky Extension
===================

This package provides support for the [inky email templating
engine](https://github.com/zurb/inky) in Twig via a tag (`inky`) for Twig and a
Symfony bundle.

If you are not using Symfony, you need to register the extension on Twig's
`Environment` manually:

```php
use Twig\CssInliner\InkyExtension;
use Twig\Environment;

$twig = new Environment(...);
$twig->addExtension(new InkyExtension());
```

Use the `inky` tag to process an inky email template:

```twig
{% inky %}
    <row>
        <columns large="6"></columns>
        <columns large="6"></columns>
    </row>
{% endinky %}
```
