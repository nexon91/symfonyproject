<?php

namespace App\Controller;

use App\Entity\Building;
use App\Entity\Employee;
use App\Entity\Office;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function index(EntityManagerInterface $em)
    {

        $lastAddedEmployee = $em->getRepository(Employee::class)->findBy([],['id' => 'DESC'],3);
        $lastAddedBuilding = $em->getRepository(Building::class)->findBy([],['id' => 'DESC'],3);
        $lastAddedOffice = $em->getRepository(Office::class)->findBy([],['id' => 'DESC'],3);
        return $this->render('home/index.html.twig',[
            'lastAddedEmployee' => $lastAddedEmployee,
            'lastAddedBuilding' => $lastAddedBuilding,
            'lastAddedOffice' => $lastAddedOffice
        ]);
    }
}
