<?php

namespace spec\Gnugat\Kalkuli\Command;

use Gnugat\Kalkuli\Command\Command;
use Gnugat\Kalkuli\Repository\TagRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AddTagCommandSpec extends ObjectBehavior
{
    const NAME = 'groceries';

    function let(TagRepository $tagRepository)
    {
        $this->beConstructedWith($tagRepository);
    }

    function it_is_a_command()
    {
        $this->shouldImplement('Gnugat\Kalkuli\Command\Command');
    }

    function it_creates_a_new_tag(TagRepository $tagRepository)
    {
        $tag = 'Gnugat\Kalkuli\Entity\Tag';
        $tagRepository->persist(Argument::type($tag))->shouldBeCalled();

        $this->run(self::NAME)->shouldBe(Command::EXIT_SUCCESS);
    }
}
