<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserSale extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $sales;
     public $user;

    public function __construct($sale, $user)
    {
        $this->sales = $sale;
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user-sale');
    }
}
