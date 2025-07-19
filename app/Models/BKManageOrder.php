<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageOrder extends Model
{
    use HasFactory;
    protected $table = 'manage_orders';
    protected $fillable = [
        'id',
        'client_name',
        'mobile_number',
        'email',
        'address',
        'order_item',
        'order_note',
        'quantity',
        'status',
        'associate_status',
        'coustomer_service_status',
        'warehouse_team_status',
        'dispatch_team_status',
        'dispatched_date',
        'tracking_number',
        'signed_pod',
        'reason',
        'country_id',
        'city_id',
        'created_at',
        'updated_at'
    ];
    public function orderItems(){
        return $this->belongsTo(OrderItem::class, 'order_item');
    }
    public function orders_date(){
        return $this->hasMany(OrderDate::class, 'order_id');
    }


    public function countries()
    {
        return $this->belongsTo(Countries::class,'country_id');
    }

    public function cities()
    {
        return $this->belongsTo(Cities::class,'city_id');
    }

    
}
