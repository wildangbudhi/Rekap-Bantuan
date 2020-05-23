<?php
declare(strict_types=1);

namespace RekapBantuan\Controllers;

class IndexController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();

        $this->tag->setTitle('Welcome');
    }

    public function indexAction(): void
    {
        
    }
}
