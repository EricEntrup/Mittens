<?php

namespace App\DataTables;

use App\Traits\DataTableTrait;
use App\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Yajra\DataTables\Services\DataTable;

class CategoryDataTable extends DataTable
{
    use DataTableTrait;
    /**
     * Build DataTable class.
     *
     * @return
     */
    public function dataTable($category)
    {
        return datatables()->eloquent($category)
            ->editColumn('status' , function ($category){
                return '<div class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline">
                    <div class="custom-switch-inner">
                        <input type="checkbox" class="custom-control-input bg-success change_status" data-type="category" '.($category->status ? "checked" : "").' value="'.$category->id.'" id="'.$category->id.'" data-id="'.$category->id.'">
                        <label class="custom-control-label" for="'.$category->id.'" data-on-label="" data-off-label=""></label>
                    </div>
                </div>';
            })
            ->addColumn('action', function($category){
                return view('category.action',compact('category'))->render();
            })
            ->addIndexColumn()
            ->rawColumns(['action','status']);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return Builder|\Illuminate\Database\Query\Builder|Collection
     */
    public function query()
    {
        $data = Category::query()->select('*');
        return $this->applyScopes($data);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'DT_RowIndex' =>  [ 'title' => trans('messages.srno') ,'searchable' => false ,'orderable' => false],
            'name',
            'status' => [ 'printable' => false ,'exportable' => false  ,'searchable' => false ,'orderable' => false],
            'action' => [ 'printable' => false ,'exportable' => false  ,'searchable' => false ,'orderable' => false],
        ];
    }


    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'User-' . time();
    }
}
