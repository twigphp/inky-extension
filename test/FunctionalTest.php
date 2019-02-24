<?php

namespace Twig\Inky\Tests;

use PHPUnit\Framework\TestCase;
use Twig\Environment;
use Twig\Inky\InkyExtension;
use Twig\Loader\ArrayLoader;

class FunctionalTest extends TestCase
{
    /**
     * @dataProvider getTests
     */
    public function test($template)
    {
        $twig = new Environment(new ArrayLoader([
            'index' => $template,
            'inky' => '<container class="extra">{{ var }}</container>',
        ], ['autoescape' => 'html']));
        $twig->addExtension(new InkyExtension());
        $this->assertContains('<table align="center" class="extra container"><tbody><tr><td>value&lt;br /&gt;</td></tr></tbody></table>', $twig->render('index', ['var' => 'value<br />']));
    }

    public function getTests()
    {
        return [
            ['{% filter inky %}<container class="extra">{{ var }}</container>{% endfilter %}', '<p style="color: red;">Great!</p>'],
            ['{{ include("inky")|inky }}'],
        ];
    }
}
