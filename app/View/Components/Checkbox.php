<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Checkbox extends Component
{
    public string $id;
    public string $name;
    public string $value;
    public string $label;
    public bool $checked;
    public string $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $id,
        string $name,
        string $value = '',
        string $label = '',
        bool $checked = false,
        string $class = ''
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
        $this->checked = $checked;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.checkbox');
    }
}
