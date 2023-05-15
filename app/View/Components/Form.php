<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    /**
     * Create a new component instance.
     */

    public function __construct(public string $method)
    {
        $this->method = strtoupper($this->method);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $method = $this->method;
        $isHtmlMethod = in_array($method, ['POST', 'GET']);

        return view('components.form', compact('isHtmlMethod'));
    }
}
