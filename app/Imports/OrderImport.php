<?php

namespace App\Imports;

use App\Models\Cities;
use App\Models\Countries;
use App\Models\ManageOrder;
use App\Models\OrderDate;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class OrderImport implements ToModel,WithHeadingRow
{
    
    protected $errors = [];

    public function model(array $row)
    {
        if (empty(array_filter($row))) {
            return null; 
        }
        $country = Countries::where('country_name', $row['state'])->first();
        if (!$country) {
            $this->errors[] = "Invalid country: {$row['state']}";
        }
        $city = Cities::where('city_name', $row['city'])->first();
        if (!$city) {
            $this->errors[] = "Invalid city: {$row['city']}";
        }
 
        $orderItem = OrderItem::where('title', $row['order_item'])->first();
        if (!$orderItem) {
            $this->errors[] = "Invalid order item: {$row['order_item']}";
        }
        if (!empty($this->errors)) {
            Log::error('Import error for row: ' . json_encode($row), $this->errors);
            throw new \Exception(implode(', ', $this->errors)); // Throwing an exception with error messages
        }
        $manageOrder = ManageOrder::create([
            'country_id'        => $country->id,
            'city_id'           => $city->id,
            'order_item'        => $orderItem->id,
            'email'             => $row['email_address'],
            'address'           => $row['address'],
            'order_note'        => $row['order_note'],
            'quantity'          => $row['quantity'],
            'mobile_number'     => $row['mobile_phone'],
            'client_name'       => $row['first_name'],
            'status'            => 'Pending',
            'associate_status'  => 1,
            'coustomer_service_status'  => 1,
            //new add field
            'vin_record_number'  => $row['vin_vin_record_id'],
            'client_last_name'   => $row['last_name'],
            'zip_code'           => $row['postal_code_zip'],
            'brand'              => $row['brand'],
            'description'        => $row['model_description'],
            'branch'             => $row['branch'],
            'engine_type'        => $row['engine_type'],
            'transmission'       => $row['transmission'],
            'invoice_date'       => $row['invoice_date'],
            'vin_number'         => $row['vin_number'],
            'base_model'         => $row['base_model'],
        ]);
        OrderDate::create([
            'user_id'         => '', 
            'order_status'    => 'Pending',
            'date'            => now()->format('d-m-Y h:i A'),
            'order_id'        => $manageOrder->id,
        ]);
        return $manageOrder;
    }
    public function getErrors(){
        return $this->errors;
    }

}
