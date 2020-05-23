<?php
declare(strict_types=1);

namespace RekapBantuan\Models;

use Phalcon\Mvc\Model;

class KategoriBantuan extends Model
{
    public $id;
    public $name;
    
    public function initialize(): void
    {
        $this->hasMany(
            'id',
            DetailBantuanUser::class,
            'transaksi_bantuan_user_id',
            [
                'alias' => 'detail_bantuan_user',
                'reusable' => true, 
            ]
        );
    }
}
