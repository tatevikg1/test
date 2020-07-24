<?php

namespace App\Admin\Controllers;

use App\Question;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;


class QuestionController extends AdminController
{

    protected $title = 'Questions';


    protected function grid()
    {
        $grid = new Grid(new Question());

        $grid->disableFilter();

        $grid->column('id', __('Id'))->sortable();
        $grid->column('topic_id', __('Topic id'))->sortable();
        $grid->column('question', __('Question'));
        $grid->column('point', __('Point'));
        $grid->column('created_at', __('Created at'))->date('Y-m-d | h:m');
        $grid->column('updated_at', __('Updated at'))->date('Y-m-d | h:m');


        Admin::navbar(function (\Encore\Admin\Widgets\Navbar $navbar) {
            $navbar->left(new \App\Admin\Extensions\Nav\Links());
        });


        return $grid;
    }


    protected function detail($id)
    {
        $show = new Show(Question::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('topic_id', __('Topic id'));
        $show->field('question', __('Question'));
        $show->field('point', __('Point'));
        $show->field('created_at', __('Created at'))->date('Y-m-d | h:m');
        $show->field('updated_at', __('Updated at'))->date('Y-m-d | h:m');

        return $show;
    }


    protected function form()
    {
        $form = new Form(new Question());

        $form->number('topic_id', __('Topic id'));
        $form->textarea('question', __('Question'));
        $form->number('point', __('Point'));

        return $form;
    }
}
