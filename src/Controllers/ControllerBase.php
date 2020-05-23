<?php
declare(strict_types=1);


namespace RekapBantuan\Controllers;

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    protected function initialize()
    {
        $this->tag->prependTitle('RekapBantuan | ');
        $this->view->setTemplateAfter('main');
    }
}
