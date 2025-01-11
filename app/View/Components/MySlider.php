<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Slider;


class MySlider extends Component
{
    public $sliders;
    public function __construct()
    {
        $this->sliders= Slider::orderBy('id')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.my-slider');
    }
}
