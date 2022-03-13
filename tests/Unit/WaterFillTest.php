<?php

namespace Tests\Unit;

use App\Action\WaterFill;
use Tests\TestCase;

class WaterFillTest extends TestCase
{
    private $waterFill;

    public function setUp(): void
    {
        parent::setUp();
        $this->waterFill = new WaterFill();
    }

    /**
     * Dataprovider
     *
     * @return void
     */
    public function silhouetteProvider()
    {
        return [
            [ [5, 4, 3, 2, 1, 2, 3, 4, 5], 16 ],
            [ [7, 10, 2, 5, 13, 3, 4, 1, 5, 9], 36 ],
            [ [7, 10, 2, 5, 13, 3, 4, 10, 5, 9, 4, 2, 6, 5, 18, 6, 8, 6, 15, 4, 20, 4, 8, 9, 5, 21, 4, 7, 19, 2], 214 ],
            [ [1, 2, 3, 4, 5, 6, 7, 8, 9, 10], 0],
            [ [10, 9, 8, 7, 6, 5, 4, 3, 2, 1], 0]
        ];
    }

    /**
     * @test
     * Teste de quantidade de água acumulada
     * @dataProvider silhouetteProvider
     * @return void
     */
    public function waterFill($silhouetteProvider, $result)
    {
        $totalWater = $this->waterFill->waterFill($silhouetteProvider, 0, sizeof($silhouetteProvider));
        $this->assertEquals($result, $totalWater);
    }
}
