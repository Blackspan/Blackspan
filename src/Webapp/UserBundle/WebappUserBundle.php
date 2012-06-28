<?php

namespace Webapp\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class WebappUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}