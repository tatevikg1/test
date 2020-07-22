<?php

namespace App\Admin\Controllers;

use App\QuestionsOption;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Show;
use Encore\Admin\Grid;


class QuestionsOptionController extends AdminController
{
    protected $title = 'QuestionsOption';


    protected function grid()
    {
        $grid = new Grid(new QuestionsOption());

        $grid->actions(function (Grid\Displayers\Actions $actions) {
            $actions->disableView();
        });
        $grid->disableFilter();


        $grid->column('id', __('Id'))->sortable();
        $grid->column('question_id', __('Question id'))->sortable()//->expand(function ($model) {
            //return $model->question->question;})
            ;
        $grid->column('option', __('Option'));
        $grid->column('correct', __('Correct'));
        $grid->column('created_at', __('Created at'))->date('Y-m-d | h:m');
        $grid->column('updated_at', __('Updated at'))->date('Y-m-d | h:m');

        return $grid;
    }

    protected function detail($id)
    {
        $show = new Show(QuestionsOption::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('question_id', __('Question id'));
        $show->field('option', __('Option'));
        $show->field('correct', __('Correct'));
        $show->field('created_at', __('Created at'))->date('Y-m-d | h:m');
        $show->field('updated_at', __('Updated at'))->date('Y-m-d | h:m');

        return $show;
    }


    protected function form()
    {
        $form = new Form(new QuestionsOption());

        $correct = [1 => 'correct', 0 => 'false'];

        $form->number('question_id', __('Question id'));
        $form->text('option', __('Option'));
        $form->select('correct', __('Correct'))->options($correct);

        return $form;
    }
}
