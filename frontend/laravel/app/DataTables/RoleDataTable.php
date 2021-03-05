<?php

namespace App\DataTables;

use App\Traits\DataTableTrait;
use App\Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Yajra\DataTables\Services\DataTable;

class RoleDataTable extends DataTable
{
    use DataTableTrait;
    /**
     * Build DataTable class.
     *
     * @return
     */
    public function dataTable($role)
    {
        return datatables()->eloquent($role)
            ->addColumn('action', function($role){
                return view('role.action',compact('role'))->render();
            })
            ->addIndexColumn()
            ->rawColumns(['action']);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return Builder|\Illuminate\Database\Query\Builder|Collection
     */
    public function query()
    {
        $data = Role::query()->select('*')->whereNotIn('name',['admin','demo_admin']);
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
