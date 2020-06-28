<?php

class MinhaExcecao extends Exception
{
    public function exibeVinicius()
    {
        echo "Vinicius";
    }
}

try {
    throw new MinhaExcecao();
} catch(MinhaExcecao $e) {
    
} 
