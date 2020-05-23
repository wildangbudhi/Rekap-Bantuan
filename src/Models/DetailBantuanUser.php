<?php
declare(strict_types=1);

namespace RekapBantuan\Models;

use Phalcon\Mvc\Model;

class DetailBantuanUser extends Model
{
    public $id;
    public $transaksi_bantuan_user_id;
    public $kategori_bantuan_id;
    public $quantity;

    public function initialize()
    {
        $this->belongsTo(
            'transaksi_bantuan_user_id', 
            TransaksiBantuanUser::class, 
            'id',
            [
                'alias' => 'transaksi_bantuan_user',
                'reusable' => true, 
            ]
        );

        $this->belongsTo(
            'kategori_bantuan_id', 
            KategoriBantuan::class, 
            'id',
            [
                'alias' => 'kategori_bantuan',
                'reusable' => true, 
            ]
        );
    }
}
