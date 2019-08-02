<?php
/**
 * Sender
 * @package lib-sms
 * @version 0.0.1
 */

namespace LibSms\Iface;

interface Sender
{

    static function send(string $phone, string $message): bool;

    static function lastError(): ?string;

    static function lastErrno(): ?int;
}