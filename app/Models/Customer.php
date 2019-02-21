<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'phone', 'email', 'education', 'ip', 'utm', 'meeting_id'
    ];

    /**
     *  Т.к. пользователь может зарегаться на 2 мероприятия
     *  находим текущее
     *
     * @return Meeting
     */
    public function meeting() : Meeting
    {
        return Meeting::find($this->meeting_id);
    }
}
