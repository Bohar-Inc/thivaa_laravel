<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatsCard extends Component
{
    public $title, $tooltip, $value, $percentage;
    /**
     * Create a new component instance.
     */
    public function __construct($title, $tooltip = null, $value, $percentage = null)
    {
        $this->title = $title;
        $this->tooltip = $tooltip;
        $this->value = $value;
        $this->percentage = $percentage;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.stats-card');
    }
}
