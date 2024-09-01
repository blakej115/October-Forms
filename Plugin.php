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
            'name' => 'OctoberForms',
            'description' => 'No description provided yet...',
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
        return []; // Remove this line to activate

        return [
            'BlakeJones\OctoberForms\Components\MyComponent' => 'myComponent',
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
