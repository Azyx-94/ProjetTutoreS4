<?php

class DonneesManquantes extends Exception
{
    public function __construct($message = "Il manque des données", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}