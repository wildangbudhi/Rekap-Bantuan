<?php
declare(strict_types=1);

namespace RekapBantuan\Controllers;

use RekapBantuan\Models\TransaksiBantuanUser;

class TransaksiController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();

        $this->tag->setTitle('Transaksi');
    }

    public function indexAction(): void
    {
        $auth = $this->session->get('auth');

        $histories_transaksi = TransaksiBantuanUser::find( [
            "user_id = :userId:",
            'bind' => [
                'userId' => $auth['id']
            ]
        ] );

        $this->view->histories_transaksi = $histories_transaksi;
    }
}
