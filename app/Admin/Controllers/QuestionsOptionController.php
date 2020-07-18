<?php

namespace App\Admin\Controllers;

use App\QuestionsOption;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class QuestionsOptionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'QuestionsOption';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new QuestionsOption());

        $grid->column('id', __('Id'));
        $grid->column('question_id', __('Question id'));
        $grid->column('option', __('Option'));
        $grid->column('correct', __('Correct'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('deleted_at', __('Deleted at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(QuestionsOption::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('question_id', __('Question id'));
        $show->field('option', __('Option'));
        $show->field('correct', __('Correct'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('deleted_at', __('Deleted at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new QuestionsOption());

        $form->number('question_id', __('Question id'));
        $form->text('option', __('Option'));
        $form->number('correct', __('Correct'));

        return $form;
    }
}
