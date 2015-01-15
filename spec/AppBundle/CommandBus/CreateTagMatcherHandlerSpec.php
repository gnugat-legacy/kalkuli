<?php

namespace spec\AppBundle\CommandBus;

use AppBundle\CommandBus\CreateTagMatcher;
use AppBundle\Entity\Tag;
use AppBundle\Entity\TagMatcherRepository;
use AppBundle\Entity\TagRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateTagMatcherHandlerSpec extends ObjectBehavior
{
    const TAG_NAME = 'Groceries';
    const PATTERN = '/^Tesco /';

    function let(TagMatcherRepository $tagMatcherRepository, TagRepository $tagRepository)
    {
        $this->beConstructedWith($tagMatcherRepository, $tagRepository);
    }

    function it_creates_a_new_tag_matcher(
        TagRepository $tagRepository,
        Tag $tag,
        TagMatcherRepository $tagMatcherRepository
    )
    {
        $createTagMatcher = new CreateTagMatcher(self::TAG_NAME, self::PATTERN);

        $tagRepository->findByName(self::TAG_NAME)->willReturn($tag);
        $tagMatcher = 'AppBundle\Entity\TagMatcher';
        $tagMatcherRepository->persist(Argument::type($tagMatcher))->shouldBeCalled();

        $this->handle($createTagMatcher);
    }
}
