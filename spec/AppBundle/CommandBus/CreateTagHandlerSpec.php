<?php

namespace spec\AppBundle\CommandBus;

use AppBundle\CommandBus\CreateTag;
use AppBundle\Entity\TagRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateTagHandlerSpec extends ObjectBehavior
{
    const NAME = 'Groceries';

    function let(TagRepository $tagRepository)
    {
        $this->beConstructedWith($tagRepository);
    }

    function it_creates_a_new_Tag(TagRepository $tagRepository)
    {
        $createTag = new CreateTag(self::NAME);

        $tag = Argument::type('AppBundle\Entity\Tag');
        $tagRepository->persist($tag)->shouldBeCalled();

        $this->handle($createTag);
    }
}
