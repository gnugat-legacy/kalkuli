<?php

namespace spec\AppBundle\CommandBus;

use AppBundle\CommandBus\TagTransaction;
use AppBundle\Entity\Tag;
use AppBundle\Entity\Transaction;
use AppBundle\Entity\TagRepository;
use AppBundle\Entity\TransactionRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TagTransactionHandlerSpec extends ObjectBehavior
{
    const TAG_NAME = 'Groceries';
    const TRANSACTION_LABEL = 'Tesco';

    function let(TagRepository $tagRepository, TransactionRepository $transactionRepository)
    {
        $this->beConstructedWith($tagRepository, $transactionRepository);
    }

    function it_tags_a_transaction(
        TagRepository $tagRepository,
        Tag $tag,
        TransactionRepository $transactionRepository,
        Transaction $transaction
    )
    {
        $tagTransaction = new TagTransaction(self::TAG_NAME, self::TRANSACTION_LABEL);

        $tagRepository->findByName(self::TAG_NAME)->willReturn($tag);
        $transactionRepository->findByLabel(self::TRANSACTION_LABEL)->willReturn($transaction);
        $transaction->addTag($tag)->shouldBeCalled();
        $transactionRepository->persist($transaction)->shouldBeCalled();

        $this->handle($tagTransaction);
    }
}
