<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class Modal extends Component
{

    public $model;
    public $modelName;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($model,$modelName)
    {
        $this->model = $model;
        $this->modelName = $modelName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.modal');
    }
}
