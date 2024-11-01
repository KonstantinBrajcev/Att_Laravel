<?php

namespace App\Admin\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Category;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Gate;

class CategoriesWidget extends AbstractWidget
{
    protected $config = [];

    public function run()
    {
        $count = Category::count();
        $string = 'Категории';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-categories',
            'title'  => "{$count} {$string}",
            'text'   => "Всего {$count} категорий в системе.",
            'button' => [
                'text' => 'Посмотреть все категории',
                'link' => route('voyager.categories.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/03.jpg'),
        ]));
    }

    public function shouldBeDisplayed()
    {
        return Gate::allows('browse', Voyager::model('User'));
    }

}
