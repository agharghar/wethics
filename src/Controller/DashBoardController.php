<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/dashBoard", name="dashBoard")
 */
class DashBoardController extends AbstractController
{

    /**
     * @Route("/", name="_user")
     */
    public function dashBoard()
    {
        return $this->render('dashboard/dashboard.html.twig', [
            'controller_name' => 'DashBoardController',
        ]);
    }

    /**
     * @Route("/admin", name="_admin")
     */
    public function dashBoard_admin()
    {
        return $this->render('dashboard/dashboard_admin.html.twig', [
            'controller_name' => 'DashBoardController',
        ]);
    }


}
