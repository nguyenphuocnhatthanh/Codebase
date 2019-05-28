<?php
/**
 * Created by PhpStorm.
 * User: thanhnhat
 * Date: 10/13/18
 * Time: 11:05 AM
 */

namespace App\Services\Internal\User;

use App\Criteria\WithCountRelationCriteria;
use App\Repositories\UserRepository;
use App\Services\AbstractService;

class ShowService extends AbstractService
{
    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * ShowService constructor.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
        $this->allowedWithCountRelation = ['relatives', 'closets', 'outfits', 'settingStyle'];
    }

    /**
     * @param $request
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function handle($request)
    {
        $id = ! empty($request->route('user')) ? $request->route('user') : auth()->id();
        $this->repository->pushCriteria(new WithCountRelationCriteria($request, $this->allowedWithCountRelation));

        return $this->repository->find($id);
    }
}
