<?php


namespace App\Services;


use Psr\Log\LoggerInterface;

class CurlConexion
{
//    const TOKEN_TEST = 'NzUwNDlmMTliODA4ZGI0NjNiN2Q1NzZjNjJiZTcwOTI0MWYyZDFmYzkxNDkxNTUzM2I5MmJmNGU2YjQ0ODJjMQ';

    /**
     * @var LoggerInterface
     */
    public $logger;

    public function __construct(
        LoggerInterface $logger
    )
    {
        $this->logger = $logger;
    }

    public function initCurl($url, $method, $token = null, $host = null)
    {
//        if (is_null($token)) $token = self::TOKEN_TEST;
//        if (is_null($host)) $host = "http://localhost";

        $ch = curl_init();

        if ($ch === false) {
            throw new Exception('failed to initialize');
        }

        curl_setopt_array($ch, array(
            CURLOPT_URL => $host . $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => array(
//                'Authorization: Bearer ' . $token,
                'Content-type: application/json'
            ),
        ));

        return $ch;
    }
}