<?php namespace App\Models;

use CodeIgniter\Model;

class Expense extends Model
{
    protected $table = 'expense';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name',
        'phone',
        'photo',
        'amount', 
        'expense', 
        'total_expense',
        'date'
    ];
}
?>
