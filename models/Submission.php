<?php namespace BlakeJones\OctoberForms\Models;

use Model;

/**
 * Submission Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Submission extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table name
     */
    public $table = 'blakejones_octoberforms_submissions';

    /**
     * @var array rules for validation
     */
    public $rules = [];

    /**
     * @var array jsonable fields
     */
    protected $jsonable = ['data'];
}
