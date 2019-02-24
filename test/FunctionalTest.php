<?php

namespace Twig\Inky\Tests;

use PHPUnit\Framework\TestCase;
use Twig\Inky\InkyExtension;
use Twig\Environment;
use Twig\Loader\ArrayLoader;
use Twig\RuntimeLoader\RuntimeLoaderInterface;

class FunctionalTest extends TestCase
{
    public function test()
    {
        $twig = new Environment(new ArrayLoader([
            'index' => '{% inky %}<container class="extra"></container>{% endinky %}',
        ]));
        $twig->addExtension(new InkyExtension());
        $this->assertContains('<table align="center" class="extra container"><tbody><tr><td></td></tr></tbody></table>', $twig->render('index'));
    }
}
