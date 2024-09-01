<?php namespace BlakeJones\OctoberForms\Components;

use Cms\Classes\ComponentBase;
use BlakeJones\OctoberForms\Models\Form;

/**
 * OctoberForm Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class OctoberForm extends ComponentBase
{
    /**
     * @link https://docs.octobercms.com/3.x/extend/cms-components.html#component-class-definition
     */
    public function componentDetails()
    {
        return [
            'name' => 'October Form',
            'description' => 'A form that can be submitted.'
        ];
    }

    /**
     * @link https://docs.octobercms.com/3.x/element/inspector-types.html
     */
    public function defineProperties()
    {
        return [
            'slug' => [
                'title' => 'Slug',
                'type' => 'string',
                'validation' => [
                    'required' => [
                        'message' => 'The slug field is required.'
                    ]
                ]
            ]
        ];
    }

    public function form()
    {
        return Form::where('slug', $this->property('slug'))->first();
    }
}
