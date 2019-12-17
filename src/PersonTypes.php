<?php

namespace Festiware\Icons;

use App\PersonType;
use Illuminate\Support\Str;
use Laravel\Nova\Fields\Field;

class PersonTypes extends Field {
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'persontypes';

    /**
     * The icon's vendor name.
     *
     * @var
     */
    public $vendor;

    /**
     *
     * @param Closure|string $icon
     *
     * @return Icon
     */
    protected function icon($icon) {
        $this->icon = $icon;
        return $this;

        $iconExploded = (explode(":",$icon));
        $icon = is_callable($icon) ? $icon() : $icon;
        return (count($iconExploded) > 1)? $iconExploded[1] : $iconExploded[0];
    }

    /**
     * @return string
     */
    protected function classes($class) : string {
        return 'w-8 h-8 ' . $class;
    }

    public function resolve($resource, $attribute = null) {
        parent::resolve($resource, $attribute);

        $personTypes = [];

        foreach ($resource->person_types as $person_type) {
            $type = $person_type->toArray();
            $type["css"] = $this->classes($person_type->style_class);
            $type["icon"] = $this->icon($person_type->icon);
            $type["show"] = true;
            $personTypes[] = $type;
        }

        $this->withMeta([
            "personTypes" => $personTypes
        ]);

    }
}
