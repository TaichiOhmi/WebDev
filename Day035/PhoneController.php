<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phone;

class PhoneController extends Controller
{
    //
    private $phone;

    public function __construct(Phone $phone)
    {
        $this->phone = $phone;
    }

    public function showUser($phone_id)
    {
        $phone_info = $this->phone->find($phone_id);
        $user_info = $phone_info->user;

        return "Phone Number: $phone_info->phone<br>Owner: $user_info->name";
    }
}
