<?php namespace BlakeJones\OctoberForms\Components;

use BlakeJones\OctoberForms\Models\Submission;
use Cms\Classes\ComponentBase;
use BlakeJones\OctoberForms\Models\Form;
use Flash;

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

    public function getForm() {
        return Form::where('slug', $this->property('slug'))->first();
    }

    public function form()
    {
        return $this->getForm();
    }

    public function onOctoberFormSubmit() {
        $form = $this->getForm();
        $data = post();

        $submission = new Submission;
        
        $submission->data = array_map(function($field) use ($data) {
            return [
                'field' => $field['name'],
                'value' => $data[$field['name']]
            ];
        }, $form->fields);

        $submission->save();

        Flash::success('Your ' . $form->name . ' message was sent.');
    }
}
