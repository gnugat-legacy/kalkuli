<?php

namespace Gnugat\Kalkuli\Command;

use Gnugat\Kalkuli\Repository\TagRepository;
use Gnugat\Kalkuli\Repository\TransactionRepository;

class TagTransactionCommand implements Command
{
    /**
     * @var TagRepository
     */
    private $tagRepository;

    /**
     * @var TransactionRepository
     */
    private $transactionRepository;

    /**
     * @param TagRepository         $tagRepository
     * @param TransactionRepository $transactionRepository
     */
    public function __construct(TagRepository $tagRepository, TransactionRepository $transactionRepository)
    {
        $this->tagRepository = $tagRepository;
        $this->transactionRepository = $transactionRepository;
    }

    /**
     * @param string $tagName
     * @param string $transactionLabel
     *
     * @return int
     */
    public function run($tagName, $transactionLabel)
    {
        $tag = $this->tagRepository->findByName($tagName);
        $transaction = $this->transactionRepository->findByLabel($transactionLabel);
        $transaction->addTag($tag);
        $this->transactionRepository->persist($transaction);

        return Command::EXIT_SUCCESS;
    }
}
