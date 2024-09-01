<?php namespace BlakeJones\OctoberForms\Components;

use Cms\Classes\ComponentBase;

/**
 * OctoberForm Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class OctoberForm extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'October Form Component',
            'description' => 'No description provided yet...'
        ];
    }

    /**
     * @link https://docs.octobercms.com/3.x/element/inspector-types.html
     */
    public function defineProperties()
    {
        return [];
    }
}
