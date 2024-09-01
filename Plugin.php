<?php namespace BlakeJones\OctoberForms;

use Backend;
use System\Classes\PluginBase;

/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/3.x/extend/system/plugins.html
 */
class Plugin extends PluginBase
{
    /**
     * pluginDetails about this plugin.
     */
    public function pluginDetails()
    {
        return [
            'name' => 'October Forms',
            'description' => 'The easiest way to create forms in October CMS, free and open source. A spiritual successor to the Magic Forms plugin.',
            'author' => 'BlakeJones',
            'icon' => 'icon-leaf'
        ];
    }

    /**
     * register method, called when the plugin is first registered.
     */
    public function register()
    {
        //
    }

    /**
     * boot method, called right before the request route.
     */
    public function boot()
    {
        //
    }

    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
        return [
            'BlakeJones\OctoberForms\Components\OctoberForm' => 'octoberForm',
        ];
    }

    /**
     * registerPermissions used by the backend.
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'blakejones.octoberforms.some_permission' => [
                'tab' => 'OctoberForms',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * registerNavigation used by the backend.
     */
    public function registerNavigation()
    {
        return [
            'octoberforms' => [
                'label' => 'Forms',
                'url' => Backend::url('blakejones/octoberforms/forms'),
                'iconSvg' => 'plugins/blakejones/octoberforms/assets/icon.svg',
                'permissions' => ['blakejones.octoberforms.*'],
                'order' => 500,
                'sideMenu' => [
                    'forms' => [
                        'label' => 'Forms',
                        'icon' => 'icon-pencil',
                        'url' => Backend::url('blakejones/octoberforms/forms'),
                        // @TODO: Implement permissions
                        'permissions' => ['blakejones.octoberforms.*'],
                    ],
                    'submissions' => [
                        'label' => 'Submissions',
                        'icon' => 'icon-envelope',
                        'url' => Backend::url('blakejones/octoberforms/submissions'),
                        // @TODO: Implement permissions
                        'permissions' => ['blakejones.octoberforms.*'],
                    ]
                ]
            ],
        ];
    }
}
