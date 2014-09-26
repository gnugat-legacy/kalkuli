<?php

namespace Gnugat\Kalkuli\Command;

use Gnugat\Kalkuli\Entity\TagMatcher;
use Gnugat\Kalkuli\Repository\TagRepository;
use Gnugat\Kalkuli\Repository\TagMatcherRepository;

class AddTagMatcherCommand implements Command
{
    /**
     * @var TagRepository
     */
    private $tagRepository;

    /**
     * @var TagMatcherRepository
     */
    private $tagMatcherRepository;

    /**
     * @param TagRepository $tagRepository
     */
    public function __construct(
        TagRepository $tagRepository,
        TagMatcherRepository $tagMatcherRepository
    )
    {
        $this->tagRepository = $tagRepository;
        $this->tagMatcherRepository = $tagMatcherRepository;
    }

    /**
     * @param string $tagName
     * @param string $pattern
     *
     * @return int
     */
    public function run($tagName, $pattern)
    {
        $tag = $this->tagRepository->findByName($tagName);
        $tagMatcher = new TagMatcher($tag, $pattern);
        $this->tagMatcherRepository->persist($tagMatcher);

        return Command::EXIT_SUCCESS;
    }
}
