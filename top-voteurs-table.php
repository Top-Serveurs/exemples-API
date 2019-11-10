<?php
    $server_token = 'XXXXXXXXXXX';  // Renseignez la token de votre serveur présente sur votre fiche Top-Serveurs
    $response = @file_get_contents("https://api.top-serveurs.net/v1/servers/$server_token/players-ranking");
    $json = json_decode($response);
    if (!$json || $json->code !== 200) {
        echo 'Erreur lors la récupération des données';
        die;
    }

    $table = '
        <table>
            <thead>
                <tr>
                    <th>Pseudo</th>
                    <th>Votes</th>
                </tr>
            </thead>
            <tbody>
    ';

    foreach ($json->players as $player) {
        $table .="
            <tr>
                <td>$player->playername</td>
                <td>$player->votes</td>
            </tr>
        ";
    }

    $table .= "
        </tbody>
    </table>";

    echo $table;