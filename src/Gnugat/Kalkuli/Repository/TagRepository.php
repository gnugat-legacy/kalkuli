<?php

namespace Gnugat\Kalkuli\Repository;

use Gnugat\Kalkuli\Entity\Tag;

/**
 * Takes care of the persistence of Account.
 */
interface TagRepository
{
    /**
     * @param Tag $tag
     */
    public function persist(Tag $tag);
}
