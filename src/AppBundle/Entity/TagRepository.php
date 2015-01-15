<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class TagRepository extends EntityRepository
{
    /**
     * @param string $name
     *
     * @return Tag
     */
    public function findByName($name)
    {
        return $this->findOneBy(array('name' => $name));
    }

    /**
     * @param Tag $tag
     */
    public function persist(Tag $tag)
    {
        $this->_em->persist($tag);
        $this->_em->flush();
    }
}
