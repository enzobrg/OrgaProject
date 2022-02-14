<?php

namespace App\Controller;

use App\Entity\Months;
use App\Entity\Task;
use App\Repository\TaskRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalendrierController extends AbstractController
{
    /**
     * @Route("/calendrier", name="calendrier")
     */
    public function index(ManagerRegistry $managerRegistry): Response
    {
        $months = $managerRegistry->getRepository(Months::class)->findAll();
        $tasks = $managerRegistry->getRepository(Task::class)->findAll();
        return $this->render('Calendrier/calendrier.html.twig', [
            'months' => $months,
            'tasks' => $tasks,
        ]);
    }
}
