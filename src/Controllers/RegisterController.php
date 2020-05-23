<?php
declare(strict_types=1);


namespace RekapBantuan\Controllers;

use RekapBantuan\Forms\RegisterForm;
use RekapBantuan\Models\Users;
use Phalcon\Db\RawValue;

/**
 * SessionController
 *
 * Allows to register new users
 */
class RegisterController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Sign Up/Sign In');

        parent::initialize();
    }

    public function indexAction(): void
    {
        $form = new RegisterForm();

        if ($this->request->isPost()) {
            $password = $this->request->getPost('password');
            $repeatPassword = $this->request->getPost('repeatPassword');

            if ($password !== $repeatPassword) {
                $this->flash->error('Passwords are different');

                return;
            }

            $user = new Users();
            $user->password = sha1($password);
            $user->name = $this->request->getPost('name', ['string', 'striptags']);
            $user->email = $this->request->getPost('email', 'email');
            $user->created_at = new RawValue('now()');

            if (!$user->save()) {
                foreach ($user->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
            } else {
                $this->tag->setDefault('email', '');
                $this->tag->setDefault('password', '');

                $this->flash->success('Thanks for sign-up, please log-in to start generating invoices');

                $this->dispatcher->forward([
                    'controller' => 'session',
                    'action'     => 'index',
                ]);

                return;
            }
        }

        $this->view->form = $form;
    }
}
