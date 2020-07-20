<?php

namespace App\Admin\Controllers;

use App\TestAnswer;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TestAnswerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'TestAnswer';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new TestAnswer());

        $grid->column('id', __('Id'));
        $grid->column('test_id', __('Test id'));
        $grid->column('question_id', __('Question id'));
        $grid->column('questions_option_id', __('Questions option id'));
        $grid->column('point', __('Point'));
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
        $show = new Show(TestAnswer::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('test_id', __('Test id'));
        $show->field('question_id', __('Question id'));
        $show->field('questions_option_id', __('Questions option id'));
        $show->field('point', __('Point'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('deleted_at', __('Deleted at'));

        return $show;
    }


    protected function form()
    {
        $form = new Form(new TestAnswer());

        $form->number('test_id', __('Test id'));
        $form->number('question_id', __('Question id'));
        $form->number('questions_option_id', __('Questions option id'));
        $form->number('point', __('Point'));


        return $form;
    }
}
