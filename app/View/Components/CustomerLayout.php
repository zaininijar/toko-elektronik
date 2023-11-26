<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CustomerLayout extends Component
{
    public $title;

    /**
     * Create a new component instance.
     */
    public function __construct($title)
    {
        $this->title = config('app.name') . ' | ' . $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.customer');
    }
}
