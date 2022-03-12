<?php

namespace App\Helpers;

class Validation
{
    /**
     * Validação para número inteiros
     * Retorna false caso número não seja inteiro
     * @param string $value
     * @return void
     */
    public function validator(string $value) {
        return !preg_match ("/[^0-9]/", $value);
    }
}