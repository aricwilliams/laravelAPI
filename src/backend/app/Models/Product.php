<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'ProductDetail',
        'Cost',
        'QuickSelectOption',
    ];

    // Specify the primary key if it's not 'id'
    protected $primaryKey = 'Id';

    // Ensure Laravel knows the primary key is auto-incrementing and an integer
    public $incrementing = true;
    protected $keyType = 'int';

    // If the table name is not the plural form of the model name, specify it
    protected $table = 'products';
}
