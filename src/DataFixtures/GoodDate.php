<?php

declare(strict_types=1);

namespace App\DataFixtures;

final class GoodDate
{
    private array $goods = [
        1 => 180,
        2 => 90,
        3 => 30,
    ];

    /**
     * @return array
     */
    public function getGoods(): array
    {
        return $this->goods;
    }

    /**
     * @param array $goods
     */
    public function setGoods(array $goods): void
    {
        $this->goods = $goods;
    }
}
