<?php

namespace App\Criteria;

use App\Helper\Helper;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class OrderCriteriaI
 * @package App\CriteriaIs
 *
 * @author: Thanhnpn(thanhnpn@evolableasia.vn)
 * @date 18/09/28
 */
class OrderCriteria implements CriteriaInterface
{
    private $sortFields;
    private $allowFields;
    private $callableFields = [];

    /**
     * OrderCriteria constructor.
     * @param \Illuminate\Http\Request $request
     * @param array $allowFields
     */
    public function __construct($request, array $allowFields = [])
    {
        $this->allowFields = $allowFields;
        $this->prepareData($request->get('orders'));
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
        if (! empty($this->sortFields)) {
            foreach ($this->prepareSortData() as $fieldName => $operator) {
                $model = $model->orderBy($fieldName, $operator);
            }
        }

        if (! empty($this->callableFields)) {
            $model = $this->applyCallable($model);
        }

        return $model;
    }

    /**
     * Get data prepare sort
     *
     * @return array
     */
    private function prepareSortData()
    {
        $result = [];

        foreach ($this->sortFields as $sortField) {
            [$field, $operator] = $this->collectOperation($sortField);

            if (! $this->inAllowFields($field)) {
                continue;
            }

            $result[$field] = $operator;
        }

        return $result;
    }

    /**
     * If field param has in allow field sort
     *
     * @param $field
     * @return bool
     */
    private function inAllowFields($field)
    {
        return in_array($field, $this->allowFields);
    }

    /**
     * Transform sortFields anh callableFields data
     * @param $orders
     *
     * @void
     */
    private function prepareData($orders)
    {
        $this->sortFields = Helper::parseStrByDelimiter($orders);

        foreach ($this->sortFields as $i => $sortField) {
            $fieldName = preg_replace('/[^a-z]/', '', $sortField);

            foreach ($this->allowFields as $key => $allowField) {
                if (is_callable($allowField) && $fieldName === $key) {
                    unset($this->sortFields[$i]);
                    $this->callableFields[$sortField] = $allowField;
                    break;
                }
            }
        }
    }

    /**
     * Apply callable sorted field
     *
     * @param $model
     * @return mixed
     */
    private function applyCallable($model)
    {
        foreach ($this->callableFields as $value => $callableField) {
            [, $operator] = $this->collectOperation($value);
            $model = $callableField($model, $operator);
        }

        return $model;
    }

    /**
     * collect field and operator fort prepare sort
     *
     * @param $sortField
     * @return array
     */
    private function collectOperation($sortField)
    {
        $pieces = explode('-', $sortField);

        if ($this->isDecreaseOperator($pieces)) {
            $operator = 'DESC';
            $field = $pieces[1];
        } else {
            $operator = 'ASC';
            $field = $pieces[0];
        }

        return [$field, $operator];
    }

    /**
     * If prefix fieldname is operator "-"
     *
     * @param $pieces
     * @return bool
     */
    private function isDecreaseOperator($pieces)
    {
        return count($pieces) > 1;
    }
}
