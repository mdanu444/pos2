<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserPayment extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $payments = [];
    public function __construct($payments)
    {
        return $this->payments = $payments;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user-payment');
    }
}
