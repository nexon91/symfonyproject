<?php

namespace App\Controller;

use App\Entity\Building;
use App\Form\BuildingType;
use App\Repository\BuildingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class BuildingController extends AbstractController
{


    /**
     * @Route("/buildings", name="buildings")
     * @param BuildingRepository $buildingRepository
     * @return Response
     */
    public function home(BuildingRepository $buildingRepository,Request $request,PaginatorInterface $paginator)
    {

        $buildings = $buildingRepository->findAll();

        $pagination = $paginator->paginate(
            $buildings, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );

        return $this->render('building/home.html.twig',[
            'pagination' => $pagination,

        ]);
    }

    /**
     * @Route("building/add", name="add")
     * @param EntityManagerInterface $em
     * @param Request $request
     *
     * @param ValidatorInterface $validator
     * @return RedirectResponse|Response
     */

    public function add(EntityManagerInterface $em,Request $request,ValidatorInterface $validator){

        $form = $this->createForm(BuildingType::class);
        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()){
            //dd($form->getData());
            $data = $form->getData();
            $building = new Building();

            $building->setAddress($data['address']);
            $building->setCity($data['city']);
            $building->setNumber($data['number']);
            $building->setWindows($data['windows']);
            $building->setOvertime($data['overtime']);
            $building->setDateWashed($data['date_washed']);

            // test for errors
            // if any error -> goes to template validation
            $errors = $validator->validate($building);
            if (count($errors) > 0){
                return $this->render('building/validation.html.twig', [
                    'errors' => $errors,
                ]);
            }
            $em->persist($building);
            $em->flush();

            $this->addFlash('success','You added a new building');

            return $this->redirectToRoute('buildings');
        }

        return $this->render('building/add.html.twig',[
            'buildingForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("building/edit/{id}", name="edit")
     * @param Building $building
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return RedirectResponse|Response
     */
    public function edit(Building $building, Request $request, EntityManagerInterface $em){


        $form = $this->createForm(BuildingType::class,$building);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $em->persist($building);
            $em->flush();


            $this->addFlash('success','You edited successfully');

            return $this->redirectToRoute('buildings',[
                'id' => $building->getId()
            ]);
        }

        return $this->render('building/edit.html.twig',[
            'buildingForm' => $form->createView(),

        ]);
    }

    /**
     * @Route("building/delete/{id}", name="delete")
     * @param Building $building
     * @param EntityManagerInterface $em
     * @return RedirectResponse
     */

    public function delete(Building $building,EntityManagerInterface $em){
        $deleteBuilding = $em->getRepository(Building::class)->find($building);
        $em->remove($deleteBuilding);
        $em->flush();
        return $this->redirectToRoute('buildings');
    }
}
