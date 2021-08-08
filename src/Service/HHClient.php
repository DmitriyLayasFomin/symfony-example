<?php


namespace App\Service;


use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HHClient
{
    private $client;

    public function __construct(HttpClientInterface $hhClient)
    {
        $this->client = $hhClient;
    }

    /**
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws DecodingExceptionInterface
     */
    public function getVacancies(string $text = '', int $page = 0, int $per_page = 100): array
    {
        $response = $this->client->request('GET', '/vacancies', ['query' =>
            ['text' => $text,'page'=>$page,'per_page'=>$per_page]
        ]);
        $response->getContent();
        return $response->toArray();
    }
}