<?php

namespace Rindra\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class RindraUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
