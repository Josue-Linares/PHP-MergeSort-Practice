<?php
function MergeSort($array){
    // Verifica si el array tiene uno o cero elementos
    if(count($array) <= 1) return $array;
    // Divide el array por la mitad utilizando la función array_splice()
    $mid = count($array)/2;
    $left = array_slice($array,0,$mid);
    $right =  array_slice($array,$mid);

    // Llama a MergeSort recursivamente en ambas mitades del array
    $left = MergeSort($left);
    $right = MergeSort($right);

    // Une las dos mitades del array , ya ordenadas en un solo array ordenado
    $arrayOrdenado = Merge($left, $right);

    // Devuelve el array ordenado
    return $arrayOrdenado;
}

function Merge($left,$right){
    // Crea un nuevo array vacío para almacenar los elementos ordenados
    $resp = [];
    // Usa un bucle while para comparar los primeros elementos de las dos mitades del array y agregar el menor de los dos al array $resp
    while(count($left) > 0 && count($right) > 0 ){
        if($left[0]>$right[0]){
            $resp[] = $right[0]; 
            $right = array_slice($right,1);
        }
        else{
            $resp[] = $left[0];
            $left = array_slice($left, 1);
        }
    }
    // Agrega todos los elementos restantes de la mitad izquierda al array $resp
    while(count($left) > 0){
        $resp[] = $left[0];
        $left = array_slice($left, 1);
    }
    // Agrega todos los elementos restantes de la mitad derecha al array $resp
    while(count($right) > 0){
        $resp[] = $right[0];
        $right = array_slice($right, 1);
    }
    // Devuelve el array $resp como la combinación ordenada de las dos mitades del array original
    return $resp;
}
//creamos un array desordenado y lo ejecutamos todo con un print_r
$array = array(3, 8, 1, 5, 2, 7, 4, 6);
$arrayOrdenado = MergeSort($array);
print_r($arrayOrdenado);


?>