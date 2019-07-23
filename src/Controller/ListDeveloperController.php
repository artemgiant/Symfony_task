<?php

namespace App\Controller;

use App\Repository\DeveloperRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ListDeveloperController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     *
     */
    public function index(DeveloperRepository $developerRepository)
    {
        $devs = $developerRepository->findAll();
        return $this->render('list_developer/index.html.twig',['developers'=>$devs]);
    }


    /**
     * @Route("/dev/{id}/lists",name="app_list_projects")
     * @Template()
     */
    public function listProjects(DeveloperRepository $developerRepository,$id){

        $developer =  $developerRepository->findAllRelatedProjectsByDeveloper($id);
        return['developer'=>$developer[0]];
    }
}
