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

class InkyExtension extends AbstractExtension
{
    public function getTokenParsers()
    {
        return [
            new InkyTokenParser(),
        ];
    }
}

function twig_inky(string $body): string
{
    return Pinky\transformString($body)->saveHTML();
}
