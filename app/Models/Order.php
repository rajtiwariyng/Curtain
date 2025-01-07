<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    // Add the columns you want to allow mass assignment
    protected $fillable = [
        'appointment_id',
        'franchise_id',
        'quotation_id',
        'name',
        'mobile',
        'pincode',
        'installation_date',
    ];

    public function franchise(){
        return $this->belongsto(Franchise::class, 'franchise_id', 'id'); 
    }

    public function appointment(){
        return $this->belongsto(Appointment::class, 'appointment_id', 'id'); 
    }

    public function quotation_data(){
        return $this->belongsto(Quotation::class, 'quotation_id', 'id'); 
    }

    public function section_name(){
        return $this->hasMany(QuotationSection::class, 'id', 'section_order'); 
    }
}
