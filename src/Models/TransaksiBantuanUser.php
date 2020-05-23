<?php
declare(strict_types=1);

namespace RekapBantuan\Models;

use Phalcon\Mvc\Model;

class TransaksiBantuanUser extends Model
{
    public $id;
    public $user_id;
    public $transaction_date;

    public function initialize()
    {
        $this->belongsTo(
            'user_id', 
            Users::class, 
            'id'
        );

        $this->hasMany(
            'id',
            DetailBantuanUser::class,
            'transaksi_bantuan_user_id',
            [
                'alias' => 'transaksi_bantuan_user',
                'reusable' => true, 
            ]
        );
    }
}
