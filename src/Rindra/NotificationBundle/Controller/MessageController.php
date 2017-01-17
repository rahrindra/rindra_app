<?php

namespace Rindra\NotificationBundle\Controller;

use Rindra\NotificationBundle\Entity\Message;
use Rindra\NotificationBundle\Form\Handler\MessageHandler;
use Rindra\NotificationBundle\Form\Type\MessageType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class MessageController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $messages = $em->getRepository('RindraNotificationBundle:Message')->findAll();

        return $this->render('@RindraNotification/Message/index.html.twig', array(
            'messages' => $messages
        ));
    }

    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $message = new Message();
        $messageForm = $this->createForm(new MessageType(), $message);
        $formHandler = new MessageHandler($messageForm, $request, $em);
        if($formHandler->process())
        {
            return new JsonResponse(array(
                'success' => true
            ));
        }
        return $this->render('@RindraNotification/Message/create.html.twig', array(
            'form' => $messageForm->createView()
        ));
    }

    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $message = $em->getRepository('RindraNotificationBundle:Message')->find($id);

        $messageForm = $this->createForm(new MessageType(), $message);
        $formHandler = new MessageHandler($messageForm, $request, $em);
        if($formHandler->process())
        {
            return new JsonResponse(array(
                'success' => true
            ));
        }
        return $this->render('@RindraNotification/Message/create.html.twig', array(
            'form' => $messageForm->createView()
        ));
    }
}
