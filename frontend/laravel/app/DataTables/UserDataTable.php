<?php

namespace App\DataTables;

use App\Traits\DataTableTrait;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    use DataTableTrait;
    /**
     * Build DataTable class.
     *
     * @return
     */
    public function dataTable($user)
    {
        return datatables()->eloquent($user)
            ->addColumn('action', function($user){
                return view('user.action',compact('user'))->render();
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
        $data = User::query()->select('*')->whereNotIn('user_type',['admin','demo_admin']);
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
            'email',
            'user_type',
            'action' => [ 'printable' => false ,'searchable' => false ,'orderable' => false],
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
