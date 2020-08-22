<?php

namespace App\Admin\Controllers;

use App\Model\Admin\PorderModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PorderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'PorderModel';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PorderModel());

        $grid->model()->orderBy('order_id','desc');
        $grid->column('order_id', __('Order id'));
        $grid->column('order_on', __('Order on'));
        $grid->column('user_id', __('User id'));
        $grid->column('order_morey', __('Order morey'));
        $grid->column('pay_type', __('Pay type'))->display(function ($type){
            switch ($type){
                case 1:
                    return '<span style="color: #00a7d0">支付宝</span>';
                case 2:
                    return '<span style="color: #0f9d58">微信</span>';
            }

        });
        $grid->column('status', __('Status'))->display(function ($status){
            switch ($status)
            {
                case 1:
                    return '<span style="color: #0f9d58">已支付</span>';
                case 0 :
                    return '<span style="color: red">未支付</span>';
            }
        }) ;

        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(PorderModel::findOrFail($id));

        $show->field('order_id', __('Order id'));
        $show->field('order_on', __('Order on'));
        $show->field('user_id', __('User id'));
        $show->field('order_morey', __('Order morey'));
        $show->field('pay_type', __('Pay type'));
        $show->field('status', __('Status'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new PorderModel());

        $form->text('order_on', __('Order on'));
        $form->switch('user_id', __('User id'));
        $form->switch('order_morey', __('Order morey'));
        $form->switch('pay_type', __('Pay type'))->default(1);
        $form->number('status', __('Status'));

        return $form;
    }
}
