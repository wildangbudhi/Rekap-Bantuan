<?php
declare(strict_types=1);

namespace RekapBantuan\Controllers;

use RekapBantuan\Models\TransaksiBantuanUser;
use RekapBantuan\Models\DetailBantuanUser;
use RekapBantuan\Models\KategoriBantuan;

use Phalcon\Db\RawValue;

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

    public function newAction(): void 
    {

        if( $this->request->isPost() )
        {
            $auth = $this->session->get('auth');
            $data =  $this->request->get();

            $transaksi = new TransaksiBantuanUser();
            $transaksi->user_id = $auth['id'];
            $transaksi->transaction_date =  new RawValue('now()');
            $transaksi->save();

            for ($i=0; $i < count($data['quantity']); $i++) 
            { 
                $detail = new DetailBantuanUser();
                $detail->transaksi_bantuan_user_id = $transaksi->id;
                $detail->kategori_bantuan_id = $data['kategori_bantuan_id'][ $i ];
                $detail->quantity = $data['quantity'][ $i ];
                $detail->save();
            }
            

            $this->flash->success('Success');
 
            $this->dispatcher->forward([
                'controller' => 'transaksi',
                'action'     => 'index',
            ]);
        }
        else 
        {
            $kategoris = KategoriBantuan::find();
            $this->view->kategoris = $kategoris;
        }
    }

    public function deleteAction( $id ): void 
    {
        DetailBantuanUser::find([
            "transaksi_bantuan_user_id = :id:",
            'bind' => [
                'id' => (int) $id
            ]
        ])->delete();

        TransaksiBantuanUser::findFirst([
            "id = :id:",
            'bind' => [
                'id' => (int) $id
            ]
        ])->delete();

        $this->flash->success('Delete Success');
 
        $this->dispatcher->forward([
            'controller' => 'transaksi',
            'action'     => 'index',
        ]);
    }

    public function detailAction( $id )
    {
        $detail_data = DetailBantuanUser::find([
            "transaksi_bantuan_user_id = :id:",
            'bind' => [
                'id' => (int) $id
            ]
        ]);

        $this->view->detail_data = $detail_data;
    }
}
