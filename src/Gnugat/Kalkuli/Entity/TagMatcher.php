<?php

namespace Gnugat\Kalkuli\Entity;

class TagMatcher
{
    /**
     * @var Tag
     */
    private $tag;

    /**
     * @var string
     */
    private $pattern;

    /**
     * @param Tag    $tag
     * @param string $pattern
     */
    public function __construct(Tag $tag, $pattern)
    {
        $this->tag = $tag;
        $this->pattern = $pattern;
    }

    /**
     * @param Transaction $transaction
     */
    public function match(Transaction $transaction)
    {
        if (preg_match($this->pattern, $transaction->getLabel())) {
            $transaction->addTag($this->tag);
        }
    }
}
