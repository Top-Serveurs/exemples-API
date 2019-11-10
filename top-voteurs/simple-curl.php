<?php
    $server_token = 'XXXXXXXXXXX'; // Renseignez la token de votre serveur présente sur votre fiche Top-Serveurs
    $ch = curl_init("https://api.top-serveurs.net/v1/servers/$server_token/players-ranking");
    curl_setopt_array( $ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => ['Content-type: application/json']
    ]);
    $json = json_decode(curl_exec($ch));

    if (!$json || $json->code !== 200) {
        echo 'Erreur lors la récupération des données';
        die;
    }
    
    print_r($json->players);
