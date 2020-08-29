<?php

declare(strict_types=1);

namespace App\Repository;

use App\DataFixtures\OrdersHistory;
use App\Dto\Customers;
use App\Dto\Order;
use App\Exceptions\OrderNotFoundException;
use DateTimeImmutable;

class CustomerRepository
{
    private OrdersHistory $orderHistory;

    /**
     * CustomerRepository constructor.
     *
     * @param OrdersHistory $orderHistory
     */
    public function __construct(OrdersHistory $orderHistory)
    {
        $this->orderHistory = $orderHistory;
    }

    /**
     * @return Customers[]
     * @throws OrderNotFoundException
     */
    public function findAll(): array
    {
        $orders = $this->orderHistory->getOrders();

        $result = [];
        foreach ($orders as $key => $order) {
            $customers = $this->createDto($order);
            $customers->setId($key);
            $result[] = $customers;
        }

        return $result;
    }

    /**
     * @param int $id
     *
     * @return Customers
     * @throws OrderNotFoundException
     */
    public function findById(int $id): Customers
    {
        $orders = $this->orderHistory->getOrders();
        $customers = $this->createDto($orders[$id]);
        $customers->setId($id);
        return $customers;
    }


    /**
     * @param array $order
     *
     * @return Customers
     * @throws OrderNotFoundException
     */
    private function createDto(array $order): Customers
    {
        if (empty($order)) {
            throw new OrderNotFoundException();
        }

        $result = new Customers();
        $orders = [];
        foreach ($order as $date => $params) {
            foreach ($params as $param) {
                $order = new Order();
                $order->setDate(new DateTimeImmutable($date));
                $order->setGoodId((int)$param[0]);
                $order->setQuantity((int)$param[1]);
                $order->setContactLensPower((string)$param[2]);
                $orders[] = $order;
            }
        }

        $result->setOrder($orders);
        return $result;
    }
}
