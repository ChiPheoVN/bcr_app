<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use SoftDeletes;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','type', 'status', '	expiration_date'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getIsExpiredAttribute(){
        if($this->expiration_date)
            return Carbon::now()->gt($this->expiration_date);
        else return true;
    }

    public function getExpirationDateForInputTagAttribute(){
        if($this->expiration_date)
            return Carbon::createFromFormat('Y-m-d H:i:s', $this->expiration_date)->format('d-m-Y');
        else return null;
    }

    public function getExpirationDateFormatAttribute(){
        if($this->expiration_date)
            return Carbon::createFromFormat('Y-m-d H:i:s', $this->expiration_date)->format('d-m-Y');
        else return null;
    }

    public function setExpirationDateFromInputTagAttribute($input){
        $this->attributes['expiration_date'] = Carbon::createFromFormat('d-m-Y', $input)->format('Y-m-d'); 
    }
}
