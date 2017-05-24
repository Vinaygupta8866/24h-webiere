<?php

namespace EL\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ELUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
