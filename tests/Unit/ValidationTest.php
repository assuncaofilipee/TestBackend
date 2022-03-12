<?php

namespace Tests\Unit;

use App\Helpers\Validation;
use PHPUnit\Framework\TestCase;

class ValidationTest extends TestCase
{
    private $validation;

    public function setUp(): void
    {
        parent::setUp();
        $this->validation = new Validation();
    }


    /**
     * Dataprovider
     *
     * @return void
     */
    public function notIntegerProvider()
    {
        return [
            [ 's' ],
            [ '1.2' ],
            [ ' ' ],
        ];
    }

    /**
     * @test
     * Verifica se número é inteiro
     * @dataProvider notIntegerProvider
     * @return void
     */
    public function validator($notIntegerProvider)
    {
        $bool = $this->validation->validator($notIntegerProvider);
        $this->assertFalse($bool);
    }
}
