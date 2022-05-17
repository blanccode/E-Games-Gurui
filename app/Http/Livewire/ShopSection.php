<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class ShopSection extends Component
{

    public $amount = 0;
    public $goal = 1000.00;


    public function mount() {
        $orders = Order::all('amount');
//        dd($orders[0]['amount']);
        $totalAmount = 0;
;        foreach ($orders as $key => $order) {
                $totalAmount+= $order['amount'];
//                echo $order['amount'];
        }

       $percent = ((100 / $this->goal) * $totalAmount);

        $this->amount = $percent;
    }

    public function render()
    {
        return view('livewire.shop-section');
    }
}
