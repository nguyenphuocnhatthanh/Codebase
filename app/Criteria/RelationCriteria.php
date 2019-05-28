<?php
/**
 * Created by PhpStorm.
 * User: thanhnhat
 * Date: 9/27/18
 * Time: 9:33 PM
 */

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class RelationCriteria implements CriteriaInterface
{
    /**
     * @var array
     */
    private $allowedRelation;
    private $relation;

    /**
     * RelationCriteriaI constructor.
     * @param \Illuminate\Http\Request|\Illuminate\Support\Collection $request
     * @param array $allowedRelation
     */
    public function __construct($request, array $allowedRelation)
    {
        $this->allowedRelation = $allowedRelation;
        $this->relation = array_filter(explode(',', $request->get('with')));
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
        $relation = array_intersect($this->relation, $this->allowedRelation);

        return $model->with($relation);
    }
}
