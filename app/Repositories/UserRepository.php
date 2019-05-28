<?php
/**
 * Created by PhpStorm.
 * User: thanhnhat
 * Date: 9/27/18
 * Time: 10:13 PM
 */

namespace App\Repositories;

use App\Models\User;

class UserRepository extends AbstractRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Check email exist
     *
     * @param $email
     * @param null $id
     * @return bool
     */
    public function hasEmail($email, $id = null)
    {
        $query = $this->model->where('email', $email);

        if ($id) {
            $query->where('id', '!=', $id);
        }

        return $query->exists();
    }
}
