<?php

namespace App\Admin\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Product;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Gate;

class ProductsWidget extends AbstractWidget
{
    protected $config = [];

    public function run()
    {
        $count = Product::count();
        $string = 'Товары';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-basket',
            'title'  => "{$count} {$string}",
            'text'   => "Всего {$count} товаров в системе.",
            'button' => [
                'text' => 'Посмотреть все товары',
                'link' => route('voyager.products.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/02.jpg'),
        ]));
    }

    public function shouldBeDisplayed()
    {
        // return auth()->user()->can('browse', Voyager::model('User'));
        return Gate::allows('browse', Voyager::model('User'));
    }

}
