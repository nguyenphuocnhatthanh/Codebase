<?php

namespace App\Criteria;

use App\Helper\Helper;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class SearchUserCriteriaCriteria.
 *
 * @package namespace App\Criteria;
 */
class SearchUserCriteria implements CriteriaInterface
{
    /**
     * @var array
     */
    private $input;

    /**
     * SearchUserCriteriaCriteria constructor.
     * @param array $input
     */
    public function __construct($input = [])
    {
        $this->input = $input;
    }

    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        if (isset($this->input['type']) && is_integer($this->input['type'])) {
            $model = $model->where('type', $this->input['type']);
        }

        if (! empty($this->input['without_id']) && $withOutId = Helper::parseStrByDelimiter($this->input['without_id'])) {
            $model = count($withOutId) > 1
                ? $model->whereNotIn('id', $withOutId)
                : $model->where('id', '!=', $withOutId[0]);
        }

        if (! empty($this->input['email'])) {
            $model = $model->where('email', $this->input['email']);
        }

        if (! empty($this->input['keyword'])) {
            $model = $model->where(function ($q) {
                $value = '%'. $this->input['keyword'] . '%';
                $q->whereRaw("concat_ws(' ', first_name, last_name) LIKE ? ", $value)
                    ->orWhere('city', 'LIKE', $value)
                    ->orWhere('address', 'LIKE', $value)
                    ->orWhere('state', 'LIKE', $value);
            });
        }

        return $model;
    }
}
