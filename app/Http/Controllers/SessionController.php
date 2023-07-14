<?php

namespace App\Http\Controllers;

use Ramsey\Uuid\Uuid;

class SessionController extends Controller
{
    public function setSession()
    {
        $this->newSession();
        if (session('count') !== null) {
            session()->increment('count');
        }
        return
            'Id: ' . session('user_id') . "<br>" .
            'count: ' . session('count');
    }

    public function refreshSession()
    {
        session()->flush();
        $this->newSession();
        return
            'Сессия успешно сброшена. Ваш новый id: ' . session('user_id');
    }

    protected function newSession(): void
    {
        if (session('user_id') === null) {
            session(['user_id' => Uuid::uuid4()]);
            session(['count' => 0]);
        }
    }
}
