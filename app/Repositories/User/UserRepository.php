<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function getUser()
    {
        return $user = Auth::user();;
    }

    public function getAdmin()
    {
        return $user = $this->model::where('role', 'admin')->first();;
    }
}
