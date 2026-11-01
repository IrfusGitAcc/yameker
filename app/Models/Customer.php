<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $primaryKey = 'customer_id';

    protected $table = 'customers';

    protected $fillable = ['user_id','session_id','first_name','last_name','email','phone','address','city','state','country','postal_code'];


}
