<?php

declare(strict_types=1);

namespace App\Repository;

use App\DataFixtures\GoodDate;
use App\Dto\Good;
use App\Exceptions\GoodNotFoundException;

class GoodRepository
{
    private GoodDate $goodDate;

    /**
     * GoodRepository constructor.
     *
     * @param GoodDate $goodDate
     */
    public function __construct(GoodDate $goodDate)
    {
        $this->goodDate = $goodDate;
    }

    /**
     * @param int $id
     *
     * @return mixed
     * @throws GoodNotFoundException
     */
    public function findById(int $id): Good
    {
        $goods = $this->goodDate->getGoods();

        if (!isset($goods[$id])) {
            throw new GoodNotFoundException();
        }

        $good = new Good();
        $good->setId((int) $id);
        $good->setDuration((int) $goods[$id]);

        return $good;
    }
}
