<?php

namespace App\Admin\Controllers;

use App\Topic;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
Use Encore\Admin\Widgets\Table;
use Illuminate\Support\Facades\Auth;
use Encore\Admin\Facades\Admin;
// use App\Admin\Extensions\AddQuestion;



class TopicController extends AdminController
{

    protected $title = 'Topic';

    protected function grid()
    {
        $grid = new Grid(new Topic());

        // $grid->actions(function ($actions) {
        //
        //     $actions->append(new AddQuestion($actions->getKey()));
        // });


        $grid->column('id', __('Id'))->sortable()->expand(function ($model) {

            $questions = $model->questions->map(function ($question) {
                return $question->only(['id', 'question', 'created_at', 'updated_at']);
            });
            return new Table(['ID', 'Question', 'Created at', 'Updated at'], $questions->toArray());
        });
        $grid->column('title', __('Title'))->editable()->help('click to edit');
        $grid->column('admin_id', ('Teacher'));
        $grid->column('created_at', __('Created at'))->date('Y-m-d | h:m');
        $grid->column('updated_at', __('Updated at'))->date('Y-m-d | h:m');

        Admin::navbar(function (\Encore\Admin\Widgets\Navbar $navbar) {
            $navbar->left(new \App\Admin\Extensions\Nav\Links());
        });

        return $grid;
    }

    protected function detail($id)
    {
        $show = new Show(Topic::findOrFail($id));

        // $show->field('add question')->link();

        $show->field('id', __('Id'));
        $show->field('admin_id', __('Teacher'));
        $show->field('title', __('Title'));
        $show->field('created_at', __('Created at'))->date('Y-m-d | h:m');
        $show->field('updated_at', __('Updated at'))->date('Y-m-d | h:m');

        return $show;
    }

    protected function form()
    {
        $form = new Form(new Topic());

        $form->text('title', __('Title'));
        $form->text('admin_id', __('Teacher'))->default(Auth::id());

        return $form;
    }

}
