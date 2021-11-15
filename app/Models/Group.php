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
        'name',
        'template_id'
    ];

    //group belongs to many customers
    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'customers_groups');
    }

    //group belongs to one template
    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}
