<?php

namespace Rindra\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TestEmailController extends Controller
{
    public function indexAction($name)
    {
        // on envoie le code par e-mail au proprietaire de la comptePublic
        $message = \Swift_Message::newInstance()
            ->setSubject('code d\'activation compte Ariary.net')
            ->setFrom('rahrindra@gmail.com')
            ->setTo('rraharinambinina@bocasay.fr')
            ->setBody('test envoie email');
        ;
        $mailer = $this->get('mailer')->send($message);

        return $this->render('@RindraUser/Registration/test.html.twig');
    }
}
