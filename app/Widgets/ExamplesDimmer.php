<?php

namespace App\Widgets;

use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;
use App\WorkExample;

class ExamplesDimmer extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = WorkExample::count();
        $string = trans_choice('Work examples', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-photo',
            'title'  => "{$count} {$string}",
            'text'   => "",
            'button' => [
                'text' => 'View all work examples',
                'link' => route('voyager.goods.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/02.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return app('VoyagerAuth')->user()->can('browse', Voyager::model('User'));
    }
}
