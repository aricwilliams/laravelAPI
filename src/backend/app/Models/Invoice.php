<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $primaryKey = 'Id';

    // If 'Id' is not an auto-incrementing integer, explicitly set its type
    public $incrementing = true;
    protected $keyType = 'int';

    // Define the table name if it does not match the default pluralized convention
    protected $table = 'invoice';

    // Define the attributes that are mass assignable
    protected $fillable = [
        'LandscapingJobId',
        'CustomerId',
        'TotalAmount',
        'TaxRate',
        'TaxAmount',
        'DiscountAmount',
        'SubtotalAmount',
        'PaidAmount',
        'IsPaid',
        'IsSent',
        'ReqDownPayment',
        'DownPaymentAmount',
        'Notes',
        'DateIssued',
        'DueDate',
    ];

    // Define date attributes for automatic Carbon instances
    protected $dates = ['DateIssued', 'DueDate'];

    // You can also define any additional casts for the attributes
    protected $casts = [
        'TotalAmount' => 'decimal:2',
        'TaxRate' => 'decimal:2',
        'TaxAmount' => 'decimal:2',
        'DiscountAmount' => 'decimal:2',
        'SubtotalAmount' => 'decimal:2',
        'PaidAmount' => 'decimal:2',
        'DownPaymentAmount' => 'decimal:2',
        'IsPaid' => 'boolean',
        'IsSent' => 'boolean',
        'ReqDownPayment' => 'boolean',
    ];

}
