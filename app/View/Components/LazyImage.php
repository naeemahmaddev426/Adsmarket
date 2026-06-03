<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LazyImage extends Component
{
    public $src;
    public $alt;
    public $class;
    public $style;

    /**
     * Create a new component instance.
     *
     * @param string $src
     * @param string|null $alt
     * @param string|null $class
     * @param string|null $style
     */
    public function __construct($src, $alt = null, $class = null, $style = null)
    {
        $this->src = $src;
        $this->alt = $alt;
        $this->class = $class;
        $this->style = $style;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.lazy-image');
    }
}