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

       return new JsonResponse('ok', 200);
//        return $this->render('dashboard/index.html.twig', [
//            'controller_name' => 'DashboardController',
//        ]);
    }
}
