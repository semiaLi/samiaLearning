<?php
/**
 * Created by PhpStorm.
 * User: SLI3763
 * Date: 28/12/2017
 * Time: 17:37
 */

namespace App\Controller;

use App\Document\Project ;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * @return Response
     */
    public function create()
    {
        $project = new Project();
        $project->setName('Formation Symfony 4');
        $project->setStartedAt(new \DateTime());

        $dm = $this->container->get('doctrine_mongodb')->getManager();
        $dm->persist($project);
        $dm->flush();


        return new Response('Access to mongo base with success _'.$project->getId());
    }

    /**
     * @param $id
     * @return Response
     */
    public function showProjectInformations($id)
    {
        $test = $this->
        $project = $this->container->get('doctrine_mongodb')->getRepository(Project::class)->findOneById($id);
        if (!$project) {
            throw $this->createNotFoundException('No product found');
        }
        return new Response('Product with ID : '.$project->getId().' is found');
    }
}