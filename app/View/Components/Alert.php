<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $message, public string $type = 'success')
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }

    public function ColorClasses(): string
    {
        return match ($this->type) {
            'success' => 'bg-[#051B11] text-[#75b798]',
            'error', 'danger'   => 'bg-[#2c0b0e] text-[#ea868f]',
            'warning' => 'bg-[#332701] text-[#ffda6a]',
            'info' => 'bg-[#032830] text-[#6edff6]',
        };
    }

    public function IconClasses(): string
    {
        return match ($this->type) {
            'success' => 'fa-regular fa-circle-check',
            'error', 'danger', 'warning' => 'fa-solid fa-triangle-exclamation',
            'info' => 'fa-solid fa-circle-info',
        };
    }
}
