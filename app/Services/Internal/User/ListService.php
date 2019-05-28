<?php
/**
 * Created by PhpStorm.
 * User: thanhnhat
 * Date: 9/30/18
 * Time: 8:56 AM
 */

namespace App\Services\Internal\User;

use App\Criteria\OrderCriteria;
use App\Criteria\SearchUserCriteria;
use App\Repositories\UserRepository;
use App\Services\AbstractService;

class ListService extends AbstractService
{
    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * ListService constructor.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \Illuminate\Http\Request|\Illuminate\Support\Collection $request
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function handle($request)
    {
        $this->repository->pushCriteria(new SearchUserCriteria($request->all()));
        $this->repository->pushCriteria(new OrderCriteria($request, ['id', 'name' => function ($q, $operator) {
            return $q->orderByRaw(\DB::raw("concat_ws(' ', first_name, last_name) $operator "));
        }, 'birthday', 'email', 'city', 'state', 'gender', 'credits', 'is_verified']));

        return $this->repository->getList($request);
    }
}
