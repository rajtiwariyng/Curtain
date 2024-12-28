<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationItem extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table='quotation_items';

    public function franchise(){
        return $this->belongsto(Franchise::class, 'franchise_id', 'id'); 
    }

    public function appointment(){
        return $this->belongsto(Appointment::class, 'appointment_id', 'id'); 
    }

    public function quotation(){
        return $this->belongsto(Quotation::class, 'quotation_id', 'id'); 
    }
    
    
}
