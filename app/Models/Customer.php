<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

class Customer extends Model
{
    use HasFactory;
    use Notifiable;

    use Sortable;

    protected $fillable = ['name', 'email','phone', 'address'];

    public $sortable = ['name', 'email','phone', 'address'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function appointment() {
        return $this->hasOne(Appointment::class, 'user_id');
    }
}
