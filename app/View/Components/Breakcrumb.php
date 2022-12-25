<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Breakcrumb extends Component
{
    public $title;
    public $activePage;
    /**
     *
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title,$activePage)
    {
        $this->title = $title;
        $this->activePage = $activePage;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.breakcrumb');
    }
}