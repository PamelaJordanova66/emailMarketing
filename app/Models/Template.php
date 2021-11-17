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


    //template belongs to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // //set cc email attribute
    // public function setCcEmailAttribute($value)
    // {
    //     if (! $value) {
    //         $this->attributes['cc_email'] = json_encode([], true);
    //     } else {
    //         $this->attributes['cc_email'] = json_encode($value, true);
    //     }
    // }
    // //get cc mail attribute
    // public function getCcEmailAttribute($value)
    // {
    //     if (! $value) {
    //         return json_decode('[]', true);
    //     } else {
    //         return json_decode($value, true);
    //     }
    // }
    // //set bcc email attribute
    // public function setBccEmailAttribute($value)
    // {
    //     if (! $value) {
    //         $this->attributes['bcc_email'] = json_encode([], true);
    //     } else {
    //         $this->attributes['bcc_email'] = json_encode($value, true);
    //     }
    // }
    // //bcc email attribute
    // public function getBccEmailAttribute($value)
    // {
    //     if (! $value) {
    //         return json_decode('[]', true);
    //     } else {
    //         return json_decode($value, true);
    //     }
    // }
}
