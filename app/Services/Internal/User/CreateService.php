<?php
/**
 * Created by PhpStorm.
 * User: thanhnhat
 * Date: 9/27/18
 * Time: 9:34 PM
 */

namespace App\Services\Internal\User;

use App\Helpers\UploadImage;
use App\Repositories\PhoneNumberRepository;
use App\Repositories\UserRepository;
use App\Services\AbstractService;

class CreateService extends AbstractService
{
    /**
     * @var UserRepository
     */
    private $repository;
    /**
     * @var PhoneNumberRepository
     */
    private $phoneNumberRepository;

    /**
     * CreateService constructor.
     * @param UserRepository $repository
     * @param PhoneNumberRepository $phoneNumberRepository
     */
    public function __construct(UserRepository $repository, PhoneNumberRepository $phoneNumberRepository)
    {
        $this->repository = $repository;
        $this->phoneNumberRepository = $phoneNumberRepository;
    }

    /**
     * @param \Illuminate\Http\Request|\Illuminate\Support\Collection $request
     *
     * @return mixed
     *
     * @throws \Throwable
     */
    public function handle($request)
    {
        $data = $request->only(array_diff($this->repository->getFillable(), ['avatar', 'email_verified_at']));

        if ($request->hasFile('avatar')) {
            $path = UploadImage::resizeImage($request->file('avatar'), 'users', 200, 200);
            $data['avatar'] = $path;
        }

        \DB::transaction(function () use (&$user, $data) {
            $user = $this->repository->create($data);
//            $this->phoneNumberRepository->deleteWhere(['phone_number' => $user->phone_number]);
        });

        return $user;
    }
}
