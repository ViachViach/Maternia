<?php

declare(strict_types=1);

namespace App\Dto;

use DateTimeImmutable;

final class Order
{
    private DateTimeImmutable $date;

    private int $goodId;

    private int $quantity;

    private string $contactLensPower;

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getDate(): DateTimeImmutable
    {
        return $this->date;
    }

    /**
     * @param DateTimeImmutable $date
     */
    public function setDate(DateTimeImmutable $date): void
    {
        $this->date = $date;
    }

    /**
     * @return int
     */
    public function getGoodId(): int
    {
        return $this->goodId;
    }

    /**
     * @param int $goodId
     */
    public function setGoodId(int $goodId): void
    {
        $this->goodId = $goodId;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return string
     */
    public function getContactLensPower(): string
    {
        return $this->contactLensPower;
    }

    /**
     * @param string $contactLensPower
     */
    public function setContactLensPower(string $contactLensPower): void
    {
        $this->contactLensPower = $contactLensPower;
    }
}
