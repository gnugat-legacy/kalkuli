<?php

namespace spec\Gnugat\Kalkuli\Command;

use Gnugat\Kalkuli\Command\Command;
use Gnugat\Kalkuli\Entity\Tag;
use Gnugat\Kalkuli\Repository\TagRepository;
use Gnugat\Kalkuli\Repository\TagMatcherRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AddTagMatcherCommandSpec extends ObjectBehavior
{
    const TAG_NAME = 'account transaction';
    const PATTERN = '/^VIR /';

    function let(TagRepository $tagRepository, TagMatcherRepository $tagMatcherRepository)
    {
        $this->beConstructedWith($tagRepository, $tagMatcherRepository);
    }

    function it_is_a_command()
    {
        $this->shouldImplement('Gnugat\Kalkuli\Command\Command');
    }

    function it_creates_a_new_tag_matcher(
        TagRepository $tagRepository,
        Tag $tag,
        TagMatcherRepository $tagMatcherRepository
    )
    {
        $tagRepository->findByName(self::TAG_NAME)->willReturn($tag);
        $tagMatcher = 'Gnugat\Kalkuli\Entity\TagMatcher';
        $tagMatcherRepository->persist(Argument::type($tagMatcher))->shouldBeCalled();

        $this->run(self::TAG_NAME, self::PATTERN)->shouldBe(Command::EXIT_SUCCESS);
    }
}
