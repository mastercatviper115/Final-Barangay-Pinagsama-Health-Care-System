<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

class Doctor extends Model
{
    use HasFactory;
    use Notifiable;

    use Sortable;

    protected $fillable = ['name', 'phone', 'specialty', 'room', 'image', 'user_id'];

    public $sortable = ['name', 'phone', 'specialty', 'room'];

    public function appointment()
    {
        return $this->hasOne(Appointment::class);
    }
    
    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
