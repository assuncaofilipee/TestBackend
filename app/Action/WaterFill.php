<?php

namespace App\Action;

class WaterFill {

    private $water = [];
    private $maxSubtract = 0;
    
    /**
     * Percorre array recursivamente, verifica qual é o maior elemento
     * a esquerda da posição atual e verifica qual é o maior elemento
     * a direita de posição atual, quando a posição atual se encontra 
     * após o maior elemento a direita, o maior elemento a se subtrair 
     * da silhueta recebe o segundo maior elemento a direita do maior
     * elemento, o qual se tem a vazão de agua
     *
     * @param array $silhueta
     * @param integer $key
     * @param integer $arrayLength
     * @return int
     */
    function waterFill(array $silhouette, int $key, int $arrayLength) {
        if($key < $arrayLength)
        {
            $max = max(array_slice($silhouette, $key)); 
        
            if($this->maxSubtract > $max) {
                $this->maxSubtract = $max;
            }

            if($silhouette[$key] > ($this->maxSubtract)) {
                $this->water[] = 0;
                $this->maxSubtract = $silhouette[$key];
            } else {
                $this->water[] = ($this->maxSubtract - $silhouette[$key]);
            }
            
            return $this->waterFill($silhouette, $key+1, $arrayLength);
        } else {
            return array_sum($this->water);
        }
    }   
}