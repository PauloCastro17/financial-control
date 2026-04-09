<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class dashboardChart extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public null|array|object $payments = null, public null|array|object $transactions = null)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard-chart');
    }
}
