<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DivisiPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function akses_divisi(User $user)
    {
        return $user->username == 'aeda';
    }

    public function tambah_divisi(User $user)
    {
        return $user->username == 'aeda';
    }

    public function hapus_divisi(User $user)
    {
        return $user->username == 'aeda';
    }
}
