<?php

namespace App\Console\Commands;

use App\Action\WaterFill;
use App\Helpers\Validation;
use Illuminate\Console\Command;

class WaterFillCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'water:fill';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $validation = new Validation();

        $events = $this->ask("Digite a quantidade de casos (1 >= N <= 100): ");

        if(!$validation->validator($events)) {
            $this->line("Somente números inteiros");
            return 0;
        }

        if($events <= 0 || $events > 100) {
            $this->line("Quantidade inválida!");
            return 0;
        }

        for($i = 0; $i < $events; $i++) {
            $arrayLength = $this->ask("Digite o tamanho do array (> 2): ");

            if(!$validation->validator($arrayLength)) {
                $this->line("Somente números inteiros");
                return 0;
            }

            if($arrayLength < 3) {
                $this->line("Tamanho inválido!");
                return 0;
            }

            $silhouette = $this->ask("Digite o conteúdo do array (silhueta), separado por espaço: ");
            $silhouette = trim($silhouette);

            if(strpos($silhouette, " ") === false) {
                $this->line("Formato de array inválido");
                return 0;
            }

            $silhouette = explode(" ", $silhouette);

            if($arrayLength != sizeof($silhouette)) {
                $this->line("Tamanho do array inválido");
                return 0;
            }

            foreach($silhouette as $value) {

                if(!$validation->validator($value)) {
                    $this->line('Somente números inteiros');
                    return 0;
                }
            }

            $waterFill = new WaterFill();
            $this->line("Result: ". $waterFill->waterFill($silhouette, 0, $arrayLength));
        }
    }

}
