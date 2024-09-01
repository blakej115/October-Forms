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
        return []; // Remove this line to activate

        return [
            'octoberforms' => [
                'label' => 'OctoberForms',
                'url' => Backend::url('blakejones/octoberforms/mycontroller'),
                'icon' => 'icon-leaf',
                'permissions' => ['blakejones.octoberforms.*'],
                'order' => 500,
            ],
        ];
    }
}
