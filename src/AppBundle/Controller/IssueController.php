<?php

namespace AppBundle\Controller;

use AppBundle\Form\Issue10519\Issue10519;
use AppBundle\Form\Issue10519\IssueFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class IssueController extends Controller
{
    /**
     * @Route("/issue")
     * @Method("GET|POST")
     */
    public function issueAction(Request $request)
    {
        $issue = new Issue10519();
        $form = $this->createForm(new IssueFormType(), $issue);
        $form->add('submit', 'submit');
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            var_dump($issue);
            die;
        }

        return $this->render('issue/issue.html.twig', [ 'form' => $form->createView() ]);
    }
}
