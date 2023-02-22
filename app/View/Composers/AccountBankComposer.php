<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Bank;

class AccountBankComposer
{
    public $model;
    public function __construct()
    {
        // Dependencies are automatically resolved by the service container...
        $this->model = new Bank;
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $banks = Bank::getAll();
        $view->with(['banks' => $banks]);
    }
}