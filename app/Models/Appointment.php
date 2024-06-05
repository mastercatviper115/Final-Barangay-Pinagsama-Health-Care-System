<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

class Appointment extends Model
{
    use HasFactory;
    use Notifiable;

    use Sortable;

    protected $fillable = ['name', 'email', 'type', 'service', 'date'];

    public $sortable = ['name', 'email', 'type', 'service', 'date'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function barangay()
    {
        return $this->belongsTo(Barangay::class);
    }
}
