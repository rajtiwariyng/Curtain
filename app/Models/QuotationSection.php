<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationSection extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    protected $table = 'quotation_sections';
}
