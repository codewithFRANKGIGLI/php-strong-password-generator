<?php
// Funzione che genera una password
// $passwordLength -> numero intero che rappresenta la lunghezza della password da generare
// $passwordChars -> array con i caratteri disponibili per la generazione della password
// $passwordRepetition -> boolean vero se può contenere ripetizioni altrimenti falso
// return: stringa che rappresenta la password generata
function generatePassword($passwordLength, $passwordChars, $passwordRepetition) {
    // Poi per il numero di volte che rappresenta la lunghezza della password, vado a
    // "pescare" un elemento random dalla mia lista e la concateno per ottenere la password
    $password = '';
    while(strlen($password) < $passwordLength) {
        $randomIndex = rand(0, count($passwordChars) - 1);

        if($passwordRepetition) {
            $password .= $passwordChars[$randomIndex];
        } else {
            if(!str_contains($password, $passwordChars[$randomIndex])) {
                $password .= $passwordChars[$randomIndex];
            }
        }
    }
    
    return $password;
}

// Funzione che crea un array con i caratteri che si possono usare per creare la password
// $userSelectionChars -> array con i caratteri da utilizzare
// return: array con i caratteri che si possono usare per creare la password
function getAvailableChars($userSelectionChars) {
    $lowercaseChars = range('a', 'z');
    $uppercaseChars = range('A', 'Z');
    $numbers = range(0, 9);
    $specialChars = range('-', '!');

    if(empty($userSelectionChars)) {
        return array_merge($lowercaseChars, $uppercaseChars, $numbers, $specialChars);
    }

    $allChars = [];

    if(in_array('chars', $userSelectionChars)) {
        $allChars = array_merge($allChars, $lowercaseChars, $uppercaseChars);
    }

    if(in_array('numbers', $userSelectionChars)) {
        $allChars = array_merge($allChars, $numbers);
    }

    if(in_array('special-chars', $userSelectionChars)) {
        $allChars = array_merge($allChars, $specialChars);
    }

    return $allChars;
}
?>