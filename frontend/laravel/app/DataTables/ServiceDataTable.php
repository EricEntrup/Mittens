<?php

namespace App\DataTables;

use App\Traits\DataTableTrait;
use App\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Yajra\DataTables\Services\DataTable;

class ServiceDataTable extends DataTable
{
    use DataTableTrait;
    /**
     * Build DataTable class.
     *
     * @return
     */
    public function dataTable($service)
    {
        return datatables()->eloquent($service)
            ->editColumn('category_id' , function ($service){
                return ($service->category_id != null && isset($service->category)) ? $service->category->name : '';
            })
            ->filterColumn('category_id',function($query,$keyword){
                $query->whereHas('category',function ($q) use($keyword){
                    $q->where('name','like','%'.$keyword.'%');
                });
            })

            ->editColumn('status' , function ($service){
                return '<div class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline">
                    <div class="custom-switch-inner">
                        <input type="checkbox" class="custom-control-input bg-success change_status" data-type="service" '.($service->status ? "checked" : "").' value="'.$service->id.'" id="'.$service->id.'" data-id="'.$service->id.'">
                        <label class="custom-control-label" for="'.$service->id.'" data-on-label="" data-off-label=""></label>
                    </div>
                </div>';
            })
            ->addColumn('action', function($service){
                return view('service.action',compact('service'))->render();
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
        $data = Service::query()->select('*');
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
            'category_id' =>  [ 'title' => trans('messages.category')],
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
