<?php

declare(strict_types=1);

namespace App\DataFixtures;

final class OrdersHistory
{
    private array $orders = [
        1 => [
            '2015-04-01' => [
                [1, 2, '-2.00'],
                [1, 2, '-3.00'],
            ],
        ],
        2 => [
            '2014-10-01' => [
                [3, 2, '-1.50'],
                [3, 2, '-3.50'],
            ],
            '2015-01-01' => [
                [3, 2, '-1.50'],
                [3, 2, '-3.50'],
            ],
            '2015-04-15' => [
                [3, 1, '-1.50'],
                [3, 1, '-3.50'],
            ],
        ],
        3 => [
            '2014-08-01' => [
                [2, 2, '+0.50'],
            ],
        ],
    ];

    /**
     * @return array
     */
    public function getOrders(): array
    {
        return $this->orders;
    }

    /**
     * @param array $orders
     */
    public function setOrders(array $orders): void
    {
        $this->orders = $orders;
    }
}
