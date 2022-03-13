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
        ->expectsOutput('Result: 16')
        ->assertExitCode(0);
    }

    /**
     * @test
     *
     * @return void
     */
    public function shoundErrorEmptyLengthCases()
    {
        $this->artisan('water:fill')
        ->expectsQuestion('Digite a quantidade de casos (1 >= N <= 100): ', null)
        ->expectsOutput('Quantidade de casos é obrigatório.')
        ->assertExitCode(1);
    }

    /**
     * @test
     *
     * @return void
     */
    public function shoundErrorNotIntegerLengthCases()
    {
        $this->artisan('water:fill')
        ->expectsQuestion('Digite a quantidade de casos (1 >= N <= 100): ', 'dsd')
        ->expectsOutput('Quantidade de casos deve ser um número inteiro.')
        ->assertExitCode(1);
    }

    /**
     * @test
     *
     * @return void
     */
    public function shoundErrorInvalidLengthCases()
    {
        $this->artisan('water:fill')
        ->expectsQuestion('Digite a quantidade de casos (1 >= N <= 100): ', 101)
        ->expectsOutput('Quantidade de casos deve ser um número entre 1 a 100.')
        ->assertExitCode(1);
    }

    /**
     * @test
     *
     * @return void
     */
    public function shoundErrorEmptyLengthArray()
    {
        $this->artisan('water:fill')
        ->expectsQuestion('Digite a quantidade de casos (1 >= N <= 100): ', 1)
        ->expectsQuestion('Digite o tamanho do array (> 2): ', NULL)
        ->expectsQuestion('Digite o conteúdo do array (silhueta), separado por espaço: ', null)
        ->expectsOutput('Tamanho do array é obrigatório.')
        ->assertExitCode(1);
    }

    /**
     * @test
     *
     * @return void
     */
    public function shoundErrorNotIntegerLengthArray()
    {
        $this->artisan('water:fill')
        ->expectsQuestion('Digite a quantidade de casos (1 >= N <= 100): ', 1)
        ->expectsQuestion('Digite o tamanho do array (> 2): ', 'dasd')
        ->expectsQuestion('Digite o conteúdo do array (silhueta), separado por espaço: ', null)
        ->expectsOutput('Tamanho do array deve ser um número inteiro.')
        ->assertExitCode(1);
    }

      /**
     * @test
     *
     * @return void
     */
    public function shoundErrorGtLengthArray()
    {
        $this->artisan('water:fill')
        ->expectsQuestion('Digite a quantidade de casos (1 >= N <= 100): ', 1)
        ->expectsQuestion('Digite o tamanho do array (> 2): ', 2)
        ->expectsQuestion('Digite o conteúdo do array (silhueta), separado por espaço: ', null)
        ->expectsOutput('Tamanho do array deve ser maior do que 2.')
        ->assertExitCode(1);
    }

    /**
     * @test
     *
     * @return void
     */
    public function shoundErrorEmptyArrayData()
    {
        $this->artisan('water:fill')
        ->expectsQuestion('Digite a quantidade de casos (1 >= N <= 100): ', 1)
        ->expectsQuestion('Digite o tamanho do array (> 2): ', 3)
        ->expectsQuestion('Digite o conteúdo do array (silhueta), separado por espaço: ', null)
        ->expectsOutput('Silhueta é obrigatória.')
        ->assertExitCode(1);
    }

    /**
    * @test
    *
    * @return void
    */
   public function shoundErrorEmptyInvalidArrayData()
   {
       $this->artisan('water:fill')
       ->expectsQuestion('Digite a quantidade de casos (1 >= N <= 100): ', 1)
       ->expectsQuestion('Digite o tamanho do array (> 2): ', 3)
       ->expectsQuestion('Digite o conteúdo do array (silhueta), separado por espaço: ', 'dasds')
       ->expectsOutput('Formato de silhueta inválido.')
       ->assertExitCode(1);
   }

     /**
    * @test
    *
    * @return void
    */
    public function shoundErrorNotIntegerArrayData()
    {
        $this->artisan('water:fill')
        ->expectsQuestion('Digite a quantidade de casos (1 >= N <= 100): ', 1)
        ->expectsQuestion('Digite o tamanho do array (> 2): ', 3)
        ->expectsQuestion('Digite o conteúdo do array (silhueta), separado por espaço: ', '1.5 5 6')
        ->expectsOutput('Formato de silhueta inválido.')
        ->assertExitCode(1);
    }

    /**
    * @test
    *
    * @return void
    */
    public function shoundErrorArrayLengthNotEqualsSilhouetteLength()
    {
        $this->artisan('water:fill')
        ->expectsQuestion('Digite a quantidade de casos (1 >= N <= 100): ', 1)
        ->expectsQuestion('Digite o tamanho do array (> 2): ', 3)
        ->expectsQuestion('Digite o conteúdo do array (silhueta), separado por espaço: ', '1 5 6 4')
        ->expectsOutput('Tamanho do array não corresponde com a silhueta.')
        ->assertExitCode(1);
    }
}
