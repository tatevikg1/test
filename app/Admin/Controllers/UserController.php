<?php

namespace App\Admin\Controllers;

use App\User;
use Encore\Admin\Controllers\AdminController;
Use Encore\Admin\Widgets\Table;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    protected $title = 'Students';


    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'));

        $grid->column('name', __('Name'))->expand(function ($model) {

            $tests = $model->tests->map(function ($test) {

                return $test->only(['id', 'topic_id', 'score', 'created_at']);
            });

            return new Table(['ID', 'Topic', 'Score', 'Created at'], $tests->toArray());
        });

        $grid->column('email', __('Email'));
        // $grid->column('email_verified_at', __('Email verified at'));
        $grid->column('remember_token', __('Remember token'))->hide();
        $grid->column('created_at', __('Created at'))->date('Y-m-d | h:m');
        $grid->column('updated_at', __('Updated at'))->date('Y-m-d | h:m');

        Admin::navbar(function (\Encore\Admin\Widgets\Navbar $navbar) {
            $navbar->left(new \App\Admin\Extensions\Nav\Links());
        });

        return $grid;
    }


    protected function detail($id)
    {
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));

        $show->field('email_verified_at', __('Email verified at'));
        $show->field('remember_token', __('Remember token'))->hide();
        $show->field('created_at', __('Created at'))->date('Y-m-d | h:m');
        $show->field('updated_at', __('Updated at'))->date('Y-m-d | h:m');

        return $show;
    }


    protected function form()
    {
        $form = new Form(new User());

        $form->text('name', __('Name'));
        $form->email('email', __('Email'));
        $form->password('password', __('Password'));

        $form->datetime('email_verified_at', __('Email verified at'))->default(date('Y-m-d H:i:s'));
        $form->text('remember_token', __('Remember token'));

        return $form;
    }
}
