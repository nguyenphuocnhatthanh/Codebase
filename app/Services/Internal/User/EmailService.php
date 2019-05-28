<?php
/**
 * Created by PhpStorm.
 * User: thanhnhat
 * Date: 10/22/18
 * Time: 8:47 PM
 */

namespace App\Services\Internal\User;

use App\Repositories\UserRepository;
use App\Services\AbstractService;
use JWTAuth;

class EmailService extends AbstractService
{
    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * EmailService constructor.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \Illuminate\Http\Request|\Illuminate\Support\Collection $request
     * @return bool
     */
    public function handle($request)
    {
        $id = $request->get('user_id');

        if (empty($id) && ! empty($token = $request->bearerToken())) {
            if ($user = JWTAuth::setToken($token)->authenticate()) {
                $id = $user->id;
            }
        }

        return $this->repository->hasEmail($request->get('email'), $id);
    }
}
