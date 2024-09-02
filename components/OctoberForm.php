<?php namespace BlakeJones\OctoberForms\Components;

use Cms\Classes\ComponentBase;
use October\Rain\Support\Collection;
use Flash;
use Mail;
use BlakeJones\OctoberForms\Models\Form;
use BlakeJones\OctoberForms\Models\Submission;

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

    protected function getForm()
    {
        return Form::where('slug', $this->property('slug'))->first();
    }

    public function form()
    {
        return $this->getForm();
    }

    protected function saveSubmission($fields, $data)
    {
        $submission = new Submission;
        
        $submission->data = array_map(function($field) use ($data) {
            return [
                'field' => $field['name'],
                'value' => $data[$field['name']]
            ];
        }, $fields);

        $submission->save();

        return $submission;
    }

    protected function sendNotification($notify, $submission, $formName) {
        $notify = new Collection($notify);

        $sendTo = $notify->flatMap(function($email) {
            return [
                $email['email'] => $email['name']
            ];
        })->all();

        $submissionId = $submission->id;

        Mail::send('blakejones.octoberforms:notification', $submission->toArray(), function($message) use ($sendTo, $formName, $submissionId) {
            $message->to($sendTo);
            $message->subject($formName . ' - ' . $submissionId);
        });
    }

    public function onOctoberFormSubmit()
    {
        $form = $this->getForm();
        $data = post();

        $submission = $this->saveSubmission($form->fields, $data);

        $this->sendNotification($form->notify, $submission, $form->name);

        Flash::success('Your ' . $form->name . ' message was sent.');
    }
}
