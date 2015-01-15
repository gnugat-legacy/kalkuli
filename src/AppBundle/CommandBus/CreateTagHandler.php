<?php

namespace AppBundle\CommandBus;

use AppBundle\Entity\Tag;
use AppBundle\Entity\TagRepository;
use SimpleBus\Message\Handler\MessageHandler;
use SimpleBus\Message\Message;

class CreateTagHandler implements MessageHandler
{
    /**
     * @var TagRepository
     */
    private $tagRepository;

    /**
     * @param TagRepository $tagRepository
     */
    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    /**
     * {@inheritDoc}
     */
    public function handle(Message $message)
    {
        $tag = new Tag($message->name);
        $this->tagRepository->persist($tag);
    }
}
