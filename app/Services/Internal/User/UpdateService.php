<?php

namespace App\Services\Internal\User;

use App\Helpers\UploadImage;
use App\Repositories\UserRepository;
use App\Services\AbstractService;

/**
 * Class UpdateService
 * @package App\Services\Internal\User
 *
 * @author: Thanhnpn(thanhnpn@evolableasia.vn)
 * @date 18/12/05
 */
class UpdateService extends AbstractService
{
    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * UpdateService constructor.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \Illuminate\Http\Request
     * @return mixed
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function handle($request)
    {
        $data = $request->only(array_diff($this->repository->getFillable(), ['avatar', 'type', 'email_verified_at']));

        if ($request->hasFile('avatar')) {
            $path = UploadImage::resizeImage($request->file('avatar'), 'users', 200, 200);
            $data['avatar'] = $path;
        }

        return $this->repository->update($data, $request->route('user'));
    }
}
