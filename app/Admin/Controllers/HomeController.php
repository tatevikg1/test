<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Facades\Admin;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('Teachers')
            ->description('Manage your tests and  questions.')
            ->row(function (Row $row) {

                //$row->column(12, function (Column $column) {
                //    $column->append(Dashboard::environment());
                //});

                Admin::navbar(function (\Encore\Admin\Widgets\Navbar $navbar) {

                    $navbar->left(new \App\Admin\Extensions\Nav\Links());

                });

            });
    }
}
