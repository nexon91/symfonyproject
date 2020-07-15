<?php

namespace App\Controller;

use App\Entity\Building;
use App\Form\BuildingType;
use App\Repository\BuildingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BuildingController extends AbstractController
{
    /**
     * @Route("/", name="building")
     */
    public function index()
    {

    }

    /**
     * @Route("building/", name="home")
     */
    public function home(BuildingRepository $buildingRepository)
    {
        $buildings = $buildingRepository->findAll();
        return $this->render('building/home.html.twig',[
            'buildings' => $buildings
        ]);
    }

    /**
     * @Route("building/add", name="add")
     * @param EntityManagerInterface $em
     * @param Request $request
     *
     * @return RedirectResponse|Response
     */

    public function add(EntityManagerInterface $em,Request $request){


        $form = $this->createForm(BuildingType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            //dd($form->getData());
            $data = $form->getData();
            $building = new Building();
            $building->setName($data['address']);
            $building->setNumber($data['number']);
            $building->setWindows($data['windows']);
            $building->setOvertime($data['overtime']);
            $building->setDateWashed($data['date_washed']);

            $em->persist($building);
            $em->flush();

            $this->addFlash('success','You added a new building');

            return $this->redirectToRoute('home');
        }

        return $this->render('building/add.html.twig',[
            'buildingForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("building/edit/{id}", name="edit")
     * @param Building $building
     */
    public function edit(Building $building){
        dd($building);
    }

    /**
     * @Route("building/delete/{id}", name="delete")
     * @param EntityManagerInterface $em
     * @param Request $request
     *
     */

    public function delete(Request $request){

    }
}
