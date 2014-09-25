<?php

namespace Gnugat\Kalkuli\Command;

use Gnugat\Kalkuli\Entity\Tag;
use Gnugat\Kalkuli\Repository\TagRepository;

class AddTagCommand implements Command
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
     * @param string $name
     *
     * @return int
     */
    public function run($name)
    {
        $tag = new Tag($name);
        $this->tagRepository->persist($tag);

        return Command::EXIT_SUCCESS;
    }
}
