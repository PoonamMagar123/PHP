<?php namespace App\Models;

use CodeIgniter\Model;

class Register extends Model
{
    protected $table = 'register';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'username',
        'email',
        'password'
    ];
}
?>
