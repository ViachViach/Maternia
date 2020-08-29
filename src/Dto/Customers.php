<?php

declare(strict_types=1);

namespace App\Dto;

final class Customers
{
    private int $id;

    /**
     * @var Order[]
    */
    private array $order;

    private string $email = '';

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return Order[]
     */
    public function getOrder(): array
    {
        return $this->order;
    }

    /**
     * @param Order[] $order
     */
    public function setOrder(array $order): void
    {
        $this->order = $order;
    }
}
