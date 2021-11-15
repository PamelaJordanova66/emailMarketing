<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'birth_date',
        'sex',
        'group_id',
        'template_id'
    ];

    //customer belongs to many groups
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'customers_groups');
    }

    //customer belongs to many templates
    public function templates()
    {
        return $this->belongsToMany(Template::class, 'customers_groups');
    }
}
