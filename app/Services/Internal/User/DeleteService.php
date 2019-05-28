<?php

namespace App\Services\Internal\User;

use App\Repositories\UserRepository;
use App\Services\AbstractService;

/**
 * Class DeleteService
 * @package App\Services\Internal\User
 *
 * @author: Thanhnpn(thanhnpn@evolableasia.vn)
 * @date 18/12/12
 */
class DeleteService extends AbstractService
{
    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * DeleteService constructor.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \Illuminate\Http\Request
     *
     * @void
     */
    public function handle($request)
    {
        $this->repository->delete($request->route('user'));
    }
}
