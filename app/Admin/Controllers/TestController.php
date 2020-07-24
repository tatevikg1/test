<?php

namespace App\Admin\Controllers;

use App\Test;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\DB;
use Encore\Admin\Facades\Admin;



class TestController extends AdminController
{
    protected $title = 'Test';


    protected function grid()
    {
        $grid = new Grid(new Test());

        $grid->actions(function ($actions) {
            $actions->disableEdit();
        });
        $grid->disableFilter();

        //$grid->quickSearch('user_id');


        $grid->column('id', __('Id'));
        $grid->column('user_id', __('User id'));
        $grid->column('topic_id', __('Topic id'));
        $grid->column('score', __('Score'));
        $grid->column('created_at', __('Created at'))->date('Y-m-d | h:m');
        $grid->column('updated_at', __('Updated at'))->date('Y-m-d | h:m');

        Admin::navbar(function (\Encore\Admin\Widgets\Navbar $navbar) {
            $navbar->left(new \App\Admin\Extensions\Nav\Links());
        });

        return $grid;
    }


    protected function detail($id)
    {
        $show = new Show(Test::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('topic_id', __('Topic id'));
        $show->field('score', __('Score'));
        $show->field('created_at', __('Created at'))->date('Y-m-d | h:m');
        $show->field('updated_at', __('Updated at'))->date('Y-m-d | h:m');

        return $show;
    }

}
