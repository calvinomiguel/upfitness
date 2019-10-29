<?php


class Sanitizer
{
    //METHOD TO SANITIZE STRINGS
    public function sanitizeString($string)
    {
        $newString = filter_var($string, FILTER_SANITIZE_STRING);
        return $newString;
    }

    //METHOD TO SANITIZE EMAILS
    public function sanitizeMail($mail)
    {
        $newMail = filter_var($mail, FILTER_SANITIZE_EMAIL);
        return $newMail;
    }

    //METHOD TO SANITIZE INTEGERS
    public function sanitizeInt($int)
    {
        $newInt = filter_var($int, FILTER_SANITIZE_NUMBER_INT);
        return $newInt;
    }
}