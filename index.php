<?php
require_once __DIR__ . '/functions.php';

// Milestone 1
// Creare un form che invii in GET la lunghezza della password. Una nostra funzione 
// utilizzerà questo dato per generare una password casuale (composta da lettere, 
// lettere maiuscole, numeri e simboli) da restituire all’utente.
// Scriviamo tutto (logica e layout) in un unico file index.php

// Milestone 2
// Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un 
// file functions.php che includeremo poi nella pagina principale

// Milestone 3 (BONUS)
// Invece di visualizzare la password nella index, effettuare un redirect ad una pagina 
// dedicata che tramite $_SESSION recupererà la password da mostrare all’utente.

// Milestone 4 (BONUS)
// Gestire ulteriori parametri per la password: quali caratteri usare fra numeri, lettere e simboli. 
// Possono essere scelti singolarmente (es. solo numeri) oppure possono essere combinati fra loro 
// (es. numeri e simboli, oppure tutti e tre insieme).
// Dare all’utente anche la possibilità di permettere o meno la ripetizione di caratteri uguali.
$userPasswordLength = isset($_GET['password-length']) ? intval($_GET['password-length']) : '';
$userAvailableChars = isset($_GET['available-chars']) ? $_GET['available-chars'] : [];
$userRepetition = isset($_GET['repetition']) && $_GET['repetition'] === 'yes' ? true : false;
var_dump($userRepetition);

$password = '';

if(!empty($userPasswordLength)) {
    // Per prima cosa ottenere un "lista" di caratteri possibli da cui "pescare" per generare
    // la password
    $allAvailableChars = getAvailableChars($userAvailableChars);

    // Generato la password
    $password = generatePassword($userPasswordLength, $allAvailableChars, $userRepetition);

    // Salvo la password nella session per visualizzarla nella pagina success.php
    // session_start();
    // $_SESSION['password'] = $password;

    // Generata la password reindirizzo l'utente alla pagina success
    // header('Location: ./success.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Password Generator</title>
</head>
<body>

    <header class="text-center">
        <h1>Password Generator</h1>
    </header>

    <main>
        <div class="container">
            <p><?php echo empty($password) ? 'Compila il form per generare la password' : 'La tua password è: ' . $password ?></p>
        </div>

        <div class="container">
            <form method="GET">
                <div class="mb-3">
                    <label for="password-length" class="form-label">Lunghezza password</label>
                    <input type="number" class="form-control" id="password-length" name="password-length" value="<?php echo $userPasswordLength; ?>">
                </div>

                <h4>Consenti ripetizioni di caratteri</h4>
                <div class="form-check">

                    <input class="form-check-input" type="radio" name="repetition" value="yes" id="repetition-yes">
                    <label class="form-check-label" for="repetition-yes">
                        Si
                    </label>
                    </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="repetition" value="no" id="repetition-no">
                    <label class="form-check-label" for="repetition-no">
                        No
                    </label>
                </div>

                <h4>Caratteri da usare</h4>

                <div class="form-check">
                    <input class="form-check-input" name="available-chars[]" type="checkbox" value="chars" id="chars">
                    <label class="form-check-label" for="chars">
                        Lettere
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="available-chars[]" type="checkbox" value="numbers" id="numbers">
                    <label class="form-check-label" for="numbers">
                        Numeri
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="available-chars[]" type="checkbox" value="special-chars" id="special-chars">
                    <label class="form-check-label" for="special-chars">
                        Caratteri speciali
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </main>
    
</body>
</html>