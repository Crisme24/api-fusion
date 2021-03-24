<?php

namespace App\Controller;

use App\Services\CurlConexion;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FusionExport\ExportManager;
use FusionExport\ExportConfig;

class DashboardController extends AbstractController
{
    private $curl;

    public function __construct(CurlConexion $curl)
    {
        $this->curl = $curl;
    }

    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index(): JsonResponse
    {
        $exportManager = new ExportManager();
        $exportConfig = new ExportConfig();
        $config = (object)[
            "type" => "column2d",
            "renderAt" => "chart-container",
            "width" => "550",
            "height" => "350",
            "id" => "myChartId",
            "dataFormat" => "json",
            "dataSource" => (object)[
                "chart" => (object)[
                    "caption" => "Number of visitors last week",
                    "theme" => "ocean",
                    "subCaption" => "Bakersfield Central vs Los Angeles Topanga"
                ],
                "data" => [
                    (object)[
                        "label" => "Mon",
                        "value" => "15123"
                    ],
                    (object)[
                        "label" => "Tue",
                        "value" => "14233"
                    ],
                    (object)[
                        "label" => "Wed",
                        "value" => "25507"
                    ]
                ]
            ]
        ];
        $exportConfig->set('chartConfig', $config);
        $files = $exportManager->export($exportConfig, '.', true);
        var_dump($files);
        die();
       return new JsonResponse($schema, 200);
//        return $this->render('dashboard/index.html.twig', [
//            'controller_name' => 'DashboardController',
//        ]);
    }
}
