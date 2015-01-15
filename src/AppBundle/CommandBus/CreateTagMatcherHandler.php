<?php

namespace AppBundle\CommandBus;

use AppBundle\Entity\TagMatcher;
use AppBundle\Entity\TagMatcherRepository;
use AppBundle\Entity\TagRepository;
use SimpleBus\Message\Handler\MessageHandler;
use SimpleBus\Message\Message;

class CreateTagMatcherHandler implements MessageHandler
{
    /**
     * @var TagMatcherRepository
     */
    private $tagMatcherRepository;

    /**
     * @var TagRepository
     */
    private $tagRepository;

    /**
     * @param TagMatcherRepository $tagMatcherRepository
     * @param TagRepository        $tagRepository
     */
    public function __construct(TagMatcherRepository $tagMatcherRepository, TagRepository $tagRepository)
    {
        $this->tagMatcherRepository = $tagMatcherRepository;
        $this->tagRepository = $tagRepository;
    }

    /**
     * {@inheritDoc}
     */
    public function handle(Message $message)
    {
        $tag = $this->tagRepository->findByName($message->tagName);
        $tagMatcher = new TagMatcher($tag, $message->pattern);
        $this->tagMatcherRepository->persist($tagMatcher);
    }
}
