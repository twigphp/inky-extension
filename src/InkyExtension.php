<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Twig\Inky;

use Pinky;
use Twig\Extension\AbstractExtension;
use Twig\Extension\ExtensionInterface;
use Twig\TwigFilter;

class InkyExtension extends AbstractExtension implements ExtensionInterface
{
    public function getFilters()
    {
        return [
            new TwigFilter('inky', 'Twig\\Inky\\twig_inky', ['is_safe' => ['html']]),
        ];
    }
}

function twig_inky(string $body): string
{
    return Pinky\transformString($body)->saveHTML();
}
