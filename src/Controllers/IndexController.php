<?php
declare(strict_types=1);

namespace RekapBantuan\Controllers;

use Phalcon\Mvc\Model\Manager;

class IndexController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();

        $this->tag->setTitle('Welcome');
    }

    public function indexAction(): void
    {
        // $query = $this->modelsManager
        //         ->createQuery(
                    
        //         );
        
        $rekap = $this->getDi()->getShared('db')->query(
            "
            SELECT
                kb.NAME,
                COALESCE(db.jumlah, 0) as jumlah
            FROM
                kategori_bantuan kb
            LEFT JOIN(
                SELECT
                    kategori_bantuan_id,
                    SUM(`quantity`) AS jumlah
                FROM
                    `detail_bantuan_user`
                GROUP BY
                    `kategori_bantuan_id`
            ) db
            ON
                kb.id = db.kategori_bantuan_id
            "
        );

        $this->view->rekap = $rekap->fetchAll();
    }
}
