<?php namespace BlakeJones\OctoberForms\Models;

use Model;

/**
 * Form Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Form extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table name
     */
    public $table = 'blakejones_octoberforms_forms';

    /**
     * @var array rules for validation
     */
    public $rules = [];
}