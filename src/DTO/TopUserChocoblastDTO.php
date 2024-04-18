<?php

namespace App\DTO;

readonly class TopUserChocoblastDTO
{
    public function __construct(
        public readonly string $firstname,
        public readonly string $lastname,
        public readonly int $count
    ) {
    }
}
