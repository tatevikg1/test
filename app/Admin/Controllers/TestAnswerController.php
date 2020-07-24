<?php

namespace App\Admin\Controllers;

use App\TestAnswer;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;


class TestAnswerController extends AdminController
{
    protected $title = 'Test Answer\'s';


    protected function grid()
    {
        $grid = new Grid(new TestAnswer());

        $grid->actions(function (Grid\Displayers\Actions $actions) {
            //$actions->disableView();
            //$actions->disableEdit();
        });
        $grid->disableFilter();

        $grid->column('id', __('Id'));
        $grid->column('test_id', __('Test id'));
        $grid->column('question.question', __('Question'));
        $grid->column('questions_option_id', __('Answer id'));
        $grid->column('correct', __('Correct'));
        $grid->column('created_at', __('Created at'));

        Admin::navbar(function (\Encore\Admin\Widgets\Navbar $navbar) {
            $navbar->left(new \App\Admin\Extensions\Nav\Links());
        });

        return $grid;
    }


    protected function detail($id)
    {
        $show = new Show(TestAnswer::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('test_id', __('Test id'));
        $show->field('question', __('Question'));
        $show->field('questions_option', __('Questions option'));
        $show->field('correct', __('Correct'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

}
