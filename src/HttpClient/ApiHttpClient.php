<?php

namespace App\HttpClient;

use Symfony\Component\HttpFundation\Response;
use Symfony\Component\HttpFundation\JsonResponse;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiHttpClient extends AbstractController
{
    //déclare un champ privé $httpClient pour stocker l'instance du service HttpClient
    private $httpClient;

    public function __construct(HttpClientInterface $jph)
    {
        // initialise le champ $httpClient avec l'instance du service HttpClient
        $this->httpClient = $jph;
    }

    public function getUsers(){
        /*
        utilise le service HttpClient pour effectuer une requête GET à l'API avec un endpoint 
        spécifié et des options, notamment la désactivation de la vérification SSL (verify_peer) et 
        le nombre de résultats à renvoyer (ici 15)
        */
        $response = $this->httpClinet->request('GET', "?results=15", [
            'verify_peer' => false,
        ]);

        return $response->toArray();
    }
}