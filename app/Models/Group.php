<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name'
    ];

    //group belongs to many customers
    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'customers_groups');
    }

    //group belongs to many templates
    public function templates()
    {
        return $this->belongsToMany(Template::class, 'customers_groups');
    }
}
