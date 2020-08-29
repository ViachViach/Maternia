<?php

declare(strict_types=1);

namespace App\PublicInterface;

interface SenderInterface
{

    /**
     * @param string $mailTo
     *
     * @return mixed
     */
    public function send(string $mailTo);
}
