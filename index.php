<!-- Descrizione
Dobbiamo creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore di password (abbastanza) sicure.
L’esercizio è suddiviso in varie milestone ed è molto importante svilupparle in modo ordinato.
Milestone 1
Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente.
Scriviamo tutto (logica e layout) in un unico file index.php
Milestone 2
Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file functions.php che includeremo poi nella pagina principale
Milestone 3 (BONUS)
Invece di visualizzare la password nella index, effettuare un redirect ad una pagina dedicata che tramite $_SESSION recupererà la password da mostrare all’utente.
Milestone 4 (BONUS)
Gestire ulteriori parametri per la password: quali caratteri usare fra numeri, lettere e simboli. Possono essere scelti singolarmente (es. solo numeri) oppure possono essere combinati fra loro (es. numeri e simboli, oppure tutti e tre insieme).
Dare all’utente anche la possibilità di permettere o meno la ripetizione di caratteri uguali. -->


<?php
// Milestone 2
include __DIR__ . '/functions.php';

    // // Milestone 1
    //     // Funzione che genera una password casuale
    //     function generateRandomPassword($length) {
    //         $password = [];
    //             // Lettere minuscole, Lettere maiuscole, Numeri, Simboli
    //             $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+-=[]{}|;:,.<>?';
    //             $password = '';
    //             $charactersLength = strlen($characters);

    //             // Combinazione di tutti i caratteri
    //             for ($i = 0; $i < $length; $i++) {
    //                 $randomCharacter = $characters[rand(0, $charactersLength - 1)];
    //                 // Generazione della password
    //                 $password .= $randomCharacter;
    //             }


    //         // Restituzione della password
    //         return $password;
    //     }

?>

<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>PHP Psw Gen</title>
        <!-- Font Awesome: -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Bootstrap 5 CDN: -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        
        <!-- Milestone 1
        Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente.
        Scriviamo tutto (logica e layout) in un unico file index.php -->
        <div class="container py-5 fs-2">
            <h1>Password Generator</h1>
            <form action="" method="GET">
                <label for="pswLen">Lunghezza Password</label>
                <input type="number" name="pswLen" id="pswLen" required>
                <button type="submit">Genera</button>
                <?php if(isset($_GET['pswLen'])) {
                // Generazione della password
                    $pswLen = $_GET['pswLen'];
                    $generatePsw = generateRandomPassword($pswLen);
                    // La tua password è: <?php echo $password;
                    echo "<p>La tua password è: $generatePsw</p>";
                }?>

            </form>

        </div>

    <!-------Script links:------->
    <!-- Bootstrap: -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>