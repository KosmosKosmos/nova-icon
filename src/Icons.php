<?php

namespace Festiware\Icons;

use Log;
use Closure;
use Illuminate\Support\Str;
use Laravel\Nova\Fields\Field;

class Icons extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'icons';

    /**
     * The icon's vendor name.
     *
     * @var
     */
    public $vendor;

    /**
     * The icon's svg name.
     *
     * @var string
     */
    public $icon;

    /**
     * Indicates if the icon should be shown.
     *
     * @var bool
     */
    public $show = true;

    /**
     * The CSS classes being applied.
     *
     * @var string
     */
    public $css;


    /**
     * Specify if the icon should be hidden.
     *
     * @param Closure|bool $callback
     *
     * @return Icon
     */
    public function hide($callback = true) : Icons {
        $this->show = is_callable($callback) ? !$callback() : !$callback;

        return $this;
    }

    /**
     * Specify the CSS classes to be applied.
     *
     * @param $classes
     *
     * @return Icon
     */
    public function css($classes) : Icons {
        if (is_callable($classes)) {
            $classes = $classes();
        }

        $this->css = is_array($classes) ? implode(' ', $classes) : $classes;

        return $this;
    }

    /**
     * @return string
     */
    protected function classes() : string {
        return 'w-8 h-8 ' . $this->css;
    }

    /**
     * Resolve the field's value.
     *
     * @param mixed       $resource
     * @param string|null $attribute
     *
     * @return void
     */
    public function resolve($resource, $attribute = null) : void {
        parent::resolve($resource, $attribute);
        $this->withMeta(['icon'   => $resource->icon]);
    }
}
