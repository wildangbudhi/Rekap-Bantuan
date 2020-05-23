<?php
declare(strict_types=1);

namespace RekapBantuan\Controllers;

use RekapBantuan\Models\Users;

class SessionController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();

        $this->tag->setTitle('Sign Up/Sign In');
    }

    public function indexAction(): void
    {
        $this->tag->setDefault('email', 'demo');
        $this->tag->setDefault('password', 'phalcon');
    }

    public function startAction(): void
    {
        if ($this->request->isPost()) {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $user = Users::findFirst([
                "email = :email: AND password = :password:",
                'bind' => [
                    'email'    => $email,
                    'password' => sha1($password),
                ],
            ]);

            if ($user) {
                $this->registerSession($user);
                $this->flash->success('Welcome ' . $user->name);

                $this->dispatcher->forward([
                    'controller' => 'index',
                    'action'     => 'index',
                ]);

                return;
            }

            $this->flash->error('Wrong email/password');
        }

        $this->dispatcher->forward([
            'controller' => 'session',
            'action'     => 'index',
        ]);
    }

    public function endAction(): void
    {
        $this->session->remove('auth');
        $this->flash->success('Goodbye!');

        $this->dispatcher->forward([
            'controller' => 'index',
            'action'     => 'index',
        ]);
    }

    private function registerSession(Users $user): void
    {
        $this->session->set('auth', [
            'id'   => $user->id,
            'name' => $user->name,
        ]);
    }
}
