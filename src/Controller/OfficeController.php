<?php

namespace App\Controller;

use App\Entity\Office;
use App\Form\OfficeType;
use App\Repository\OfficeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OfficeController extends AbstractController
{
    /**
     * @Route("/offices", name="offices")
     * @param OfficeRepository $officeRepository
     * @return Response
     */
    public function home(OfficeRepository $officeRepository)
    {
        $offices = $officeRepository->findAll();
        return $this->render('office/index.html.twig', [
            'offices' => $offices,

        ]);
    }

    /**
     * @Route("/office/add", name="add_office")
     * @param EntityManagerInterface $em
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function addOffice(EntityManagerInterface $em,Request $request){
        $form = $this->createForm(OfficeType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();
            $office = new Office();
            $office->setAddress($data['address']);
            $office->setNumber($data['number']);
            $office->setFloors($data['floors']);
            $office->setWorkingHours($data['workingHours']);
            $office->setEmployeesWorkingOnCleaning($data['employeesWorkingOnCleaning']);

            $em->persist($office);
            $em->flush();

            $this->addFlash('success','You added a new office');

            return $this->redirectToRoute('offices');

        }

        return $this->render('office/add.html.twig',[
            'officeForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/office/edit/{id}", name="edit_office", requirements={"id"="\d+"})
     * @param Office $office
     * @param EntityManagerInterface $em
     * @param Request $request
     */

    public function editOffice(Office $office,EntityManagerInterface $em,Request $request){
        $form = $this->createForm(OfficeType::class,$office);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em->persist($office);
            $em->flush();

            $this->addFlash('success','Office edited successfully');

            return $this->redirectToRoute('offices',[
                'id' => $office->getId(),
            ]);
        }

        return $this->render('office/edit.html.twig',[
            'officeForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/office/delete/{id}", name="delete_office", requirements={"id"="\d+"})
     * @param Office $office
     * @param EntityManagerInterface $em
     * @return RedirectResponse
     */

    public function deleteOffice(Office $office,EntityManagerInterface $em){
        $deleteOffice = $em->getRepository(Office::class)->find($office->getId());
        $em->remove($deleteOffice);
        $em->flush();
        $this->addFlash('success','Office deleted successfully!');
        return $this->redirectToRoute('offices');
    }
}
