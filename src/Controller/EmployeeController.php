<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Form\EmployeeType;
use App\Repository\EmployeeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmployeeController extends AbstractController
{
    /**
     * @Route("/employees", name="employees")
     * @param EmployeeRepository $employeeRepository
     * @return Response
     */
    public function index(EmployeeRepository $employeeRepository)
    {
        $employees = $employeeRepository->findAll();
        return $this->render('employee/index.html.twig',[
            'employees' => $employees,
        ]);
    }

    /**
     * @Route("employee/add", name="add_employee")
     * @param EntityManagerInterface $em
     * @param Request $request
     * @return Response
     */

    public function addEmployee(EntityManagerInterface $em,Request $request){

        $form = $this->createForm(EmployeeType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();
            $employee = new Employee();
            $employee->setName($data['name']);
            $employee->setEmployedOnDate($data['employedOnDate']);
            $employee->setNumberOfBuildings($data['numberOfBuildings']);

            $em->persist($employee);
            $em->flush();

            $this->addFlash('success','You added a new employee');

            return $this->redirectToRoute('employees');

        }

        return $this->render('employee/add.html.twig',[
            'employeeForm' => $form->createView()
        ]);
    }

    /**
     * @Route("employee/edit/{id}", name="edit_employee", requirements={"id"="\d+"})
     * @param Employee $employee
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return RedirectResponse|Response
     */

    public function editEmployee(Employee $employee,Request $request,EntityManagerInterface $em){

        $form = $this->createForm(EmployeeType::class,$employee);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($employee);
            $em->flush();

            $this->addFlash('success','Employee edited successfully!');

            return $this->redirectToRoute('employees',[
                'id' => $employee->getId()
            ]);
        }

        return $this->render('employee/edit.html.twig',[
            'employeeForm' => $form->createView()
        ]);

    }

    /**
     * @Route("employee/delete/{id}",name="delete_employee",requirements={"id"="\d+"})
     * @param Employee $employee
     * @param EntityManagerInterface $em
     * @return RedirectResponse
     */

    public function deleteEmployee(Employee $employee,EntityManagerInterface $em){
        $deleteEmployee = $em->getRepository(Employee::class)->find($employee->getId());
        $em->remove($deleteEmployee);
        $em->flush();
        $this->addFlash('success','Employee deleted successfully!');
        return $this->redirectToRoute('employees');

    }
}
