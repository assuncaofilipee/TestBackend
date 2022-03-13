<?php

namespace App\Console\Commands;

use App\Action\WaterFill;
use App\Rules\Silhouette;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

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
        $events = $this->ask("Digite a quantidade de casos (1 >= N <= 100): ");

        $validator = Validator::make(
            [
                'events' => $events
            ],
            [
                'events' => ['required', 'integer', 'between:1,100'],
            ],
            [
                'events.required' => 'Quantidade de casos é obrigatório.',
                'events.integer' => 'Quantidade de casos deve ser um número inteiro.',
                'events.between' => 'Quantidade de casos deve ser um número entre 1 a 100.'
            ]
        );

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return 0;
        }

        for ($i = 0; $i < $events; $i++) {

            $arrayLength = $this->ask("Digite o tamanho do array (> 2): ");
            $silhouette = $this->ask("Digite o conteúdo do array (silhueta), separado por espaço: ");

            $validator = Validator::make(
                [
                    'arrayLength' => $arrayLength,
                    'silhouette' => $silhouette
                ],
                [
                    'arrayLength' => ['required', 'integer', 'gt:2'],
                    'silhouette' => ['required', new Silhouette]
                ],
                [
                    'arrayLength.required' => 'Tamanho do array é obrigatório.',
                    'arrayLength.integer' => 'Tamanho do array deve ser um número inteiro.',
                    'arrayLength.gt' => 'Tamanho do array deve ser maior do que 2.',
                    'silhouette.required' => 'Silhueta é obrigatória.'
                ]
            );

            if ($validator->fails()) {
                foreach ($validator->errors()->all() as $error) {
                    $this->error($error);
                }
                return 0;
            }

            $silhouette = explode(" ", $silhouette);

            if($arrayLength != sizeof($silhouette)) {
                $this->line('Tamanho do array não corresponde com a silhueta.');
                return 0;

            }

            $waterFill = new WaterFill();
            $this->line("Result: " . $waterFill->waterFill($silhouette, 0, $arrayLength));
        }

        return 1;
    }
}
