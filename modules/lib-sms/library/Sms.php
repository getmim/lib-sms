<?php
/**
 * Sms
 * @package lib-sms
 * @version 0.0.1
 */

namespace LibSms\Library;

class Sms
{

    static $last_error;
    static $last_errno;

    static function send(string $phone, string $message, array $senders=[]): bool {
        $reg_senders = \Mim::$app->config->libSms->senders;
        if(!$reg_senders){
            trigger_error('No SMS sender module found');
            return false;
        }

        if(!$senders)
            $senders = array_keys((array)$reg_senders);

        foreach($senders as $sender){
            $class = $reg_senders->$sender ?? null;
            if(!$class){
                trigger_error('SMS Sender named `'.$sender.'` not registered');
                break;
            }

            $result = $class::send($phone, $message);
            if($result)
                return true;

            self::$last_error = $class::lastError();
            self::$last_errno = $class::lastErrno();
        }

        return false;
    }

    static function lastError(): ?string {
        return self::$last_error;
    }

    static function lastErrno(): ?int {
        return self::$last_errno;
    }
}