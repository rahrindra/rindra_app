<?php

namespace Rindra\NotificationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MessageController extends Controller
{
    public function indexAction()
    {
        return $this->render('@RindraNotification/Message/index.html.twig');
    }
}
