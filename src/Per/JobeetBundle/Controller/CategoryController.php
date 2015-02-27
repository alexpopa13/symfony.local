<?php

namespace Per\JobeetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Per\JobeetBundle\Entity\Category;

/**
 * Category controller.
 *
 */
class CategoryController extends Controller {

    public function showAction($slug) {
        $em = $this->getDoctrine()->getManager();

        $category = $em->getRepository('PerJobeetBundle:Category')->findOneBySlug($slug);

        if (!$category) {
            throw $this->createNotFoundException('Unable to find Category entity.');
        }

        $category->setActiveJobs($em->getRepository('PerJobeetBundle:Job')->getActiveJobs($category->getId()));

        return $this->render('PerJobeetBundle:Category:show.html.twig', array(
                    'category' => $category,
        ));
    }

}
