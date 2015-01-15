<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Entity\TagMatcherRepository")
 * @ORM\Table(name="tag_matcher")
 */
class TagMatcher
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    private $id;

    /**
     * @var Tag
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Tag", inversedBy="tagMatchers")
     * @ORM\JoinColumn(name="tag_id", referencedColumnName="id")
     */
    private $tag;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
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
