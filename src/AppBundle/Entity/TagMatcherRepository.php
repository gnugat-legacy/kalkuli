<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class TagMatcherRepository extends EntityRepository
{
    /**
     * @param TagMatcher $tagMatcher
     */
    public function persist(TagMatcher $tagMatcher)
    {
        $this->_em->persist($tagMatcher);
        $this->_em->flush();
    }
}
