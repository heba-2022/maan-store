<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboardLayout extends Component
{
    //automatic تمرر لملف الفيو تبع الداش بورد لاي اوت لانو ببلك
    public $pageTitle;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($pageTitle ='cc')
    {
        //
        $this->pageTitle = $pageTitle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.dashboard');
    }
}
