<?php
/**
 * Created by PhpStorm.
 * User: RINDRA
 * Date: 13/01/2017
 * Time: 14:55
 */

namespace Rindra\NotificationBundle\Form\Handler;


use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

class MessageHandler
{
    protected $request;
    protected $form;
    protected $em;

    public function __construct(Form $form, Request $request, $em)
    {
        $this->form     = $form;
        $this->request  = $request;
        $this->em   = $em;
    }

    /**
     * @return boolean
     */
    public function process()
    {
        $this->form->handleRequest($this->request);
        if($this->request->isMethod('post') && $this->request->isXmlHttpRequest())
        {
            $data = $this->form->getData();
            $this->em->persist($data);
            $this->em->flush();
            $this->onSuccess($data);
            return true;
        }
        return false;
    }

    protected function onSuccess($data)
    {
        // ici on fait les choses après que le formulaire est réussi et l'objet enregistré
    }
}