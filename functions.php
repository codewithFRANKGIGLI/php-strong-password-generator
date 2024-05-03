<!-- Milestone 2
Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file functions.php che includeremo poi nella pagina principale -->

<?php

    // Milestone 1
        // Funzione che genera una password casuale
        function generateRandomPassword($length) {
            $password = [];
                // Lettere minuscole, Lettere maiuscole, Numeri, Simboli
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+-=[]{}|;:,.<>?';
                $password = '';
                $charactersLength = strlen($characters);

                // Combinazione di tutti i caratteri
                for ($i = 0; $i < $length; $i++) {
                    $randomCharacter = $characters[rand(0, $charactersLength - 1)];
                    // Generazione della password
                    $password .= $randomCharacter;
                }


            // Restituzione della password
            return $password;
        }

?>