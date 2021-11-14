<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Template extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'user_id',
        'email_subject',
        'email_message',
        'bcc_email',
        'cc_email'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */

    protected $casts = [
        'schedule_sending' => 'datetime',
    ];

    //template belongs to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //template belongs to many groups
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'category_posts');
    }
    //template belongs to many customers
    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'category_posts');
    }
}
