<?php

namespace App\Enums;

enum StatusEnum: string
{
    case WAITING_FOR_DEV = 'waiting for dev';
    case IN_PROGRESS = 'in progress';
    case READY = 'ready';

    public function getReadableText(): string
    {
        return match ($this) {
            self::WAITING_FOR_DEV => __('status.waiting_for_dev'),
            self::IN_PROGRESS => __('status.in_progress'),
            self::READY => __('status.ready'),
        };
    }

    public static function getValues(): array
    {
        return array_map(fn($enum) => $enum->value, self::cases());

    }
}
