<?php
/**
 * Created by PhpStorm.
 * User: thanhnhat
 * Date: 10/13/18
 * Time: 11:08 AM
 */

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class WithCountRelationCriteria implements CriteriaInterface
{
    /**
     * @var array
     */
    private $allowedRelation;

    private $relation;

    /**
     * WithCountRelationCriteria constructor.
     * @param \Illuminate\Http\Request|\Illuminate\Support\Collection $request
     * @param array $allowedRelation
     */
    public function __construct($request, array $allowedRelation = [])
    {
        $this->allowedRelation = $allowedRelation;
        $this->relation = array_filter(explode(',', $request->get('with_count')));
    }
    /**
     * Apply criteria in query repository
     *
     * @param                     $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->withCount($this->getRelation());
    }

    /**
     * @return array
     */
    private function getRelation()
    {
        $relation = [];

        foreach ($this->relation as $value) {
            if (in_array($value, $this->allowedRelation)) {
                array_push($relation, $value);
            } elseif (! empty($this->allowedRelation[$value]) && is_callable($this->allowedRelation[$value])) {
                $relation[$value] = $this->allowedRelation[$value];
            }
        }

        return $relation;
    }
}
