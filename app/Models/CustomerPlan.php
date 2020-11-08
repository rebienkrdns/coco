<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerPlan extends Model
{
  protected $table = "customer_plan";
  protected $guarded = [
    'created_at', 'updated_at'
  ];
}
