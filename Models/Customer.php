<?php namespace App\Models;

use CodeIgniter\Model;

class Customer extends Model
{
    protected $table = 'customer_master';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'customer_name',
        'place',
        'mobile',
        'route_name',
        'opbalance', 
        'clbalance',
        'a_fixqty',
        'b_fixqty',
        'a_fixrate', 
        'b_fixrate'
    ];
}
?>
