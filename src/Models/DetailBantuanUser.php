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
            'id'
        );

        $this->belongsTo(
            'kategori_bantuan_id', 
            KategoriBantuan::class, 
            'id'
        );
    }
}
