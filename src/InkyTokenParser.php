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

use Twig\Node\Expression\ArrayExpression;
use Twig\Node\Expression\ConstantExpression;
use Twig\Token;
use Twig\TokenParser\AbstractTokenParser;

/**
 * Token Parser for the 'inky' tag.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class InkyTokenParser extends AbstractTokenParser
{
    public function parse(Token $token)
    {
        $stream = $this->parser->getStream();
        $stream->expect(Token::BLOCK_END_TYPE);
        $body = $this->parser->subparse([$this, 'decideInkyEnd'], true);
        $stream->expect(Token::BLOCK_END_TYPE);

        return new InkyNode($body, $token->getLine(), $this->getTag());
    }

    public function decideInkyEnd(Token $token)
    {
        return $token->test(['endinky']);
    }

    public function getTag()
    {
        return 'inky';
    }
}
