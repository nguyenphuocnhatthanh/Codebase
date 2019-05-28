<?php
/**
 * Created by PhpStorm.
 * User: thanhnhat
 * Date: 9/27/18
 * Time: 9:35 PM
 */

namespace App\Services;


abstract class AbstractService
{
    /**
     * Define relation allow to use
     *
     * @var array
     */
    protected $allowedRelation = [];

    /**
     * Define relation allow to use with count
     *
     * @var array
     */
    protected $allowedWithCountRelation = [];
}
