<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hoten', 'password', 'userid', 'dien_thoai', 'di_dong', 'chung_thu_so','status','level_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function medical_bills()
    {
        return $this->hasMany(MedicalBill::class, 'radiologist_id');
    }

    public function user_statuses()
    {
        return $this->hasMany(UserStatus::class);
    }
	
	public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
	// Quản trị viên
    function isAdmin()
    {
        return $this->level_id == 1;
    }

    // Lễ tân
    function isReceptionist()
    {
        return $this->level_id == 2;
    }

    // Kỹ thuật viên
    function isTechnician()
    {
        return $this->level_id == 3;
    }

    // Bên chuẩn đoán
    function isRadiologist()
    {
        return $this->level_id == 4;
    }

    // Thư ký
    function isSecretary()
    {
        return $this->level_id == 5;
    }

    // Quản lý
    function isManager()
    {
        return $this->level_id == 6;
    }
}
