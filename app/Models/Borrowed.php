<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowed extends Model
{
    use HasFactory;
    protected $table = 'borrowed'; // Specify the table name if it's different from the default naming convention

    protected $fillable = [
        'registration_number',
        'name',
        'program',
        'barcode',
        // Add other fields as needed
    ];

    // If you have timestamps (created_at and updated_at) in your table
    public $timestamps = true;

    // Define any relationships or additional methods as needed

}
