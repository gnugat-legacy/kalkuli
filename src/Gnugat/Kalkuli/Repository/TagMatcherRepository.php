<?php

namespace Gnugat\Kalkuli\Repository;

use Gnugat\Kalkuli\Entity\TagMatcher;

interface TagMatcherRepository
{
    /**
     * @return array of TagMatcher
     */
    public function findAll();

    /**
     * @param TagMatcher $tagMatcher
     */
    public function persist(TagMatcher $tagMatcher);
}
