Twig Inky Extension
===================

**WARNINIG**: This package is deprecate; migrate to `twig/inky-extra` instead.

This package provides support for the [inky email templating
engine](https://github.com/zurb/inky) in Twig via a filter (`inky`) for Twig and
a Symfony bundle.

If you are not using Symfony, register the extension on Twig's `Environment`
manually:

```php
use Twig\Inky\InkyExtension;
use Twig\Environment;

$twig = new Environment(...);
$twig->addExtension(new InkyExtension());
```

Use the `inky` filter to process an inky email template:

```twig
{% filter inky %}
    <row>
        <columns large="6"></columns>
        <columns large="6"></columns>
    </row>
{% endfilter %}
```

You can also use the filter on an included file:

```twig
{{ include('some_template.inky.twig')|inky }}
```
