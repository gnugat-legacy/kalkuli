<?php

namespace Gnugat\Kalkuli\Repository;

use Gnugat\Kalkuli\Entity\Tag;

interface TagRepository
{
    /**
     * @param string $name
     *
     * @return Tag
     */
    public function findByName($name);

    /**
     * @param Tag $tag
     */
    public function persist(Tag $tag);
}
