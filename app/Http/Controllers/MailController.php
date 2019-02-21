<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Requests\CustomerRequest;
use App\Jobs\SendCustomer;
use App\Jobs\SendOk;
use App\Jobs\SendWelcome;
use App\Models\Customer;
use App\Models\Meeting;

class MailController extends Controller
{
    public function ajax(CustomerRequest $request)
    {
        Customer::create(
            [
                'first_name' => $request->get('firstName'),
                'last_name' => $request->get('lastName'),
                'phone' => $request->get('phone'),
                'email' => $request->get('email'),
                'education' => $request->get('education'),
                'meeting_id' => $request->get('meeting'),
                'ip' => $request->ip(),
                'utm' => Helpers::getUtm(url()->previous()),
            ]
        );

        $emailOrganizer = Meeting::find($request->get('meeting'))->user()->first()->email;

        SendOk::withChain(
            [
                new SendWelcome($request->get('email')),
                new SendCustomer($emailOrganizer, $request->all())
            ]
        )->dispatch('Пользователь зарегестрирован ип-' . $request->ip() . ' маил-' . $request->get('email'));

        return ['customer' => TRUE];
    }
}
