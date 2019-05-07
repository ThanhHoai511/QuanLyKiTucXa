<?php

namespace App\Services;

use App\Models\PhongCSVC;

class PhongCoSoVatChatService
{
    protected $phongCoSoVatChat;

    public function __construct(PhongCSVC $phongCSVC)
    {
        $this->phongCoSoVatChat = $phongCSVC;
    }

    public function store()
    {

    }
}
