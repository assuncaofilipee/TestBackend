<?php

namespace Tests\Feature;

use Tests\TestCase;
class WaterFillCommandTest extends TestCase
{
    /**
     * @test
     * Verifica fluxo de perguntas
     * @return void
     */
    public function shouldValidFlow()
    {
        $this->artisan('water:fill')
        ->expectsQuestion('Digite a quantidade de casos (1 >= N <= 100): ', 1)
        ->expectsQuestion('Digite o tamanho do array (> 2): ', '9')
        ->expectsQuestion('Digite o conteúdo do array (silhueta), separado por espaço: ', '5 4 3 2 1 2 3 4 5')
        ->expectsOutput('Result: 16');
    }

    /**
     * @test
     *
     * @return void
     */
    public function shoundErrorInvalidLengthCases()
    {
        $this->artisan('water:fill')
        ->expectsQuestion('Digite a quantidade de casos (1 >= N <= 100): ', '101')
        ->expectsOutput('Quantidade inválida!');
    }

    /**
     * @test
     *
     * @return void
     */
    public function shoundErrorInvalidLengthArray()
    {
        $this->artisan('water:fill')
        ->expectsQuestion('Digite a quantidade de casos (1 >= N <= 100): ', 1)
        ->expectsQuestion('Digite o tamanho do array (> 2): ', 1)
        ->expectsOutput('Tamanho inválido!');
    }

    /**
     * @test
     *
     * @return void
     */
    public function shoundErrorInvalidArrayData()
    {
        $this->artisan('water:fill')
        ->expectsQuestion('Digite a quantidade de casos (1 >= N <= 100): ', 1)
        ->expectsQuestion('Digite o tamanho do array (> 2): ', 3)
        ->expectsQuestion('Digite o conteúdo do array (silhueta), separado por espaço: ', 'ss')
        ->expectsOutput('Formato de array inválido');
    }
}
