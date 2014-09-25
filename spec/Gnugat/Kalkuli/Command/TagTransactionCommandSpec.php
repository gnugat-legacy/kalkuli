<?php

namespace spec\Gnugat\Kalkuli\Command;

use Gnugat\Kalkuli\Command\Command;
use Gnugat\Kalkuli\Entity\Tag;
use Gnugat\Kalkuli\Entity\Transaction;
use Gnugat\Kalkuli\Repository\TagRepository;
use Gnugat\Kalkuli\Repository\TransactionRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TagTransactionCommandSpec extends ObjectBehavior
{
    const TAG_NAME = 'groceries';
    const TRANSACTION_LABEL = 'VIR LC';

    function let(TagRepository $tagRepository, TransactionRepository $transactionRepository)
    {
        $this->beConstructedWith($tagRepository, $transactionRepository);
    }

    function it_is_a_command()
    {
        $this->shouldImplement('Gnugat\Kalkuli\Command\Command');
    }

    function it_tags_a_transaction(
        TagRepository $tagRepository,
        Tag $tag,
        TransactionRepository $transactionRepository,
        Transaction $transaction
    )
    {
        $tagRepository->findByName(self::TAG_NAME)->willReturn($tag);
        $transactionRepository->findByLabel(self::TRANSACTION_LABEL)->willReturn($transaction);
        $transaction->addTag($tag)->shouldBeCalled();
        $transactionRepository->persist($transaction)->shouldBeCalled();

        $this->run(self::TAG_NAME, self::TRANSACTION_LABEL)->shouldBe(Command::EXIT_SUCCESS);
    }
}
