<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h1 class="titolo">Cambio Valuta</h1>
    <?php

        $importo=intval($_GET['importo']);
        $valuta=$_GET['valuta'];
        $cambio=array("dollari"=>1.08, "yen"=> 0.0060, "franchi_svizzeri" => 1.07, "sterline" => 1.20);    //$cambio["dollaro"] = 1.08; // 1 euro equivale a 1.08 dollari
        //commissione
        $data=date("d-m-Y");
        $giorno_settimana=date('l', strtotime($data));
        $traduzioneGiorni = [
            'Monday' => 'lunedì',
            'Tuesday' => 'martedì',
            'Wednesday' => 'mercoledì',
            'Thursday' => 'giovedì',
            'Friday' => 'venerdì',
            'Saturday' => 'sabato',
            'Sunday' => 'domenica'
        ];
        $giorno_settimana=$traduzioneGiorni[$giorno_settimana];
        if($giorno_settimana=="domenica" || $giorno_settimana=="sabato"){
            $importo_con_commissioni=$importo * 0.95;
            $tipo_commissione="commisione maggiorata";

        }else{
            $importo_con_commissioni=$importo * 0.975;
            $tipo_commissione="commisione non maggiorata";
        }
        $commissioni=$importo-$importo_con_commissioni;


        $importo_valuta_di_arrivo_senza_commissioni=$importo*$cambio[$valuta];
        $importo_valuta_di_arrivo=$importo_con_commissioni*$cambio[$valuta];

        echo "<div class='div_risposta'>
        <p>Data=$data</p>
        <p>Giorno=$giorno_settimana</p>
        <p>Importo in € inserito=$importo</p>
        <img src='./images/it-flag.gif' alt='bandiera italiana'>
        <p>Importo nella valuta di arrivo escludendo commissioni = $importo_valuta_di_arrivo_senza_commissioni</p>
        <p>Commissioni= $commissioni €, $tipo_commissione</p>
        <p>Importo nella valuta di arrivo con commissioni = $importo_valuta_di_arrivo</p>
        <br><a href='valuta.html'>Torna alla pagina iniziale</a>
        </div>"

        
        

    ?>
    
</body>
</html>

<!-- 
La pagina cambio.php deve quindi mostrare:
- la data nel formato d-m-Y
- il giorno della settimana in Italiano (es. Lunedì)
- l'importo in Euro digitato dall'utente (con anche la bandiera dell'Italia)
- l'importo nella valuta di arrivo escludendo le commissioni (con anche la bandiera della nazione di destinazione)
- le commissioni di cambio, specificando se si tratta di una commissione maggiorata oppure no
- l'importa nella valuta di arrivo commissioni incluse
Inoltre deve essere presente un link per ritornare alla pagina valuta.html

Suggerimenti per la data: usare la funzione date() due volte: una per ottenere la data nel formato d-m-Y e un'altra per ottenere il giorno della settimana in Inglese (che sarà tradotto in Italiano creando un'apposita funzione).
Cercare su Internet i formati che devono essere passati alla funzione date() per ottenere quanto richiesto. -->