<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\BuildingType;
use App\Form\UserType;
use App\Service\UploadHelper;
use Doctrine\ORM\EntityManagerInterface;
use Gedmo\Sluggable\Util\Urlizer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/users", name="users")
     */
    public function index()
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("user/{id}",name="user_profile", requirements={"id"="\d+"})
     * @IsGranted("ROLE_USER")
     * @param User $user
     * @param EntityManagerInterface $em
     * @return Response
     *
     */
    public function user_profile(User $user,EntityManagerInterface $em){

        $image_path = $this->getParameter('kernel.project_dir').'/build/images';

        return $this->render('user/profile.html.twig',[
            'user' => $user,
            'image_path' => $image_path
        ]);

    }

    /**
     * @Route("user/add", name="add_user")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Response
     */

    public function addUser(Request $request,EntityManagerInterface $em,UploadHelper $uploadHelper){
        $form = $this->createForm(UserType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $user = new User();
            $user->setUsername($data['username']);
            $user->setPassword($data['password']);
            $user->setEmail($data['email']);

            $uploadedFile = $form['imageFile']->getData();
            if($uploadedFile) {
                $newFilename = $uploadHelper->uploadImage($uploadedFile);
                $user->setImageFilename($newFilename);
            }
            $em->persist($user);
            $em->flush();

            $this->addFlash('success','You added a new building');

            return $this->redirectToRoute('users');

        }

        return $this->render('user/add.html.twig',[
            'userForm' => $form->createView()
        ]);
    }



    /**
     * @Route("user/upload/" , name="user_upload")
     */

    public function uploadFile(Request $request){

        $uploadedFile = $request->files->get('image');
        $destination = $this->getParameter('kernel.project_dir').'/public/uploads';
        $originalFilename = pathinfo($uploadedFile->getClientOriginalName(),PATHINFO_FILENAME);
        $newFilename = Urlizer::urlize($originalFilename).'-'.uniqid().'.'. $uploadedFile->guessExtension();

        $uploadedFile->move($destination,$newFilename);

        return $this->redirectToRoute('user');
    }
}
