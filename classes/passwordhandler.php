<?php


class Passwordhandler
{
    public function hashPassword($password)
    {
        $hashedPassword = password_hash($password, CRYPT_BLOWFISH);
        return $hashedPassword;
    }

    public function verifyPass($loginInput, $dbHash)
    {
        if (password_verify($loginInput, $dbHash)) {
            return true;
        } else {
            return false;
        }
    }
}