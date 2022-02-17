<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserPurchase extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $purchase = [];
    public function __construct($purchase)
    {
        return $this->$purchase = $purchase;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */


    public function render()
    {
        return view('components.user-purchase');
    }
}
