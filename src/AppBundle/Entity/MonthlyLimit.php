<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Entity\MonthlyLimitRepository")
 * @ORM\Table(name="monthly_limit")
 */
class MonthlyLimit
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
     * @var Account
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Account", inversedBy="monthly_limits")
     * @ORM\JoinColumn(name="account_id", referencedColumnName="id")
     */
    private $account;

    /**
     * @var Tag
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Tag", inversedBy="monthly_limits")
     * @ORM\JoinColumn(name="tag_id", referencedColumnName="id")
     */
    private $tag;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $amount;

    /**
     * @param Account $account
     * @param Tag     $tag
     * @param string  $amount
     */
    public function __construct(Account $account, Tag $tag, $amount)
    {
        $this->account = $account;
        $this->tag = $tag;
        $this->amount = $amount;
    }
}
