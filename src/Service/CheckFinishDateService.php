<?php

declare(strict_types=1);

namespace App\Service;

use App\Dto\Customers;
use App\Dto\Order;
use App\PublicInterface\SenderInterface;
use App\Repository\CustomerRepository;
use App\Repository\GoodRepository;
use DateTimeImmutable;
use App\Exceptions\GoodNotFoundException;

class CheckFinishDateService
{
    private CustomerRepository $orderRepository;

    private GoodRepository $goodRepository;

    private SenderInterface $mailService;

    /**
     * CheckFinishDateService constructor.
     *
     * @param CustomerRepository $orderRepository
     * @param GoodRepository $goodRepository
     * @param MailService $mailService
     */
    public function __construct(
        CustomerRepository $orderRepository,
        GoodRepository $goodRepository,
        MailService $mailService
    ) {
        $this->orderRepository = $orderRepository;
        $this->goodRepository = $goodRepository;
        $this->mailService = $mailService;
    }

    /**
     * @throws GoodNotFoundException
     */
    public function checkFinishDate()
    {
        $customers = $this->orderRepository->findAll();
        foreach ($customers as $customer) {
            $this->sendEmail($customer);
        }
    }

    /**
     * @param Customers $customer
     * @throws GoodNotFoundException
     */
    private function sendEmail(Customers $customer): void
    {
        $maxDate = null;
        foreach ($customer->getOrder() as $order) {
            $maxDate = $this->getFinishedOrderDate($order, $maxDate);
        }

        $today = new DateTimeImmutable();
        if ($maxDate < $today) {
            $this->mailService->send($customer->getEmail());
        }
    }

    /**
     * @param Order $order
     * @param DateTimeImmutable|null $maxDate
     *
     * @return DateTimeImmutable
     * @throws GoodNotFoundException
     */
    private function getFinishedOrderDate(Order $order, DateTimeImmutable $maxDate = null): DateTimeImmutable
    {
        $good = $this->goodRepository->findById($order->getGoodId());
        $duration = $order->getQuantity() * $good->getDuration();

        if ($order->getDate() > $maxDate) {
            $maxDate = $order->getDate();
        }

        $finishDate = $maxDate->modify("+ {$duration} day");
        return $finishDate;
    }
}
