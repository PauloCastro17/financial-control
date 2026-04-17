<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DashboardChart extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public null|array|object $months = null, public null|array|object $income = null, public null|array|object $expense = null)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('dashboard.dashboard-chart');
    }
}
