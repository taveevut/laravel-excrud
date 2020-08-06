<?php

namespace App\View\Components;

use Illuminate\View\Component;

class invalidfeedback extends Component
{
    public $err;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($err)
    {
        $this->err = $err;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.invalid-feedback');
    }
}
