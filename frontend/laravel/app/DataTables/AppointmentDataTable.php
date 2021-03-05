<?php

namespace App\DataTables;

use App\Traits\DataTableTrait;
use App\Appointment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Yajra\DataTables\Services\DataTable;

class AppointmentDataTable extends DataTable
{
    use DataTableTrait;
    /**
     * Build DataTable class.
     *
     * @return
     */
    public function dataTable($appointment)
    {
        return datatables()->eloquent($appointment)

            ->editColumn('category_id' , function ($appointment){
                return ($appointment->category_id != null && isset($appointment->category)) ? $appointment->category->name : '';
            })
            ->filterColumn('category_id',function($query,$keyword){
                $query->whereHas('category',function ($q) use($keyword){
                    $q->where('name','like','%'.$keyword.'%');
                });
            })

            ->editColumn('service_id' , function ($appointment){
                return ($appointment->service != null && isset($appointment->service)) ? $appointment->service->name : '';
            })
            ->filterColumn('service_id',function($query,$keyword){
                $query->whereHas('service',function ($q) use($keyword){
                    $q->where('name','like','%'.$keyword.'%');
                });
            })

            ->editColumn('name' , function ($appointment){
                return ($appointment->user_id != null && isset($appointment->user)) ? $appointment->user->name : $appointment->name;
            })
            ->filterColumn('name',function($query,$keyword){
                $query->whereHas('user',function ($q) use($keyword){
                    $q->where('name','like','%'.$keyword.'%');
                });
            })

            ->addColumn('action', function($appointment){
                return view('appointment.action',compact('appointment'))->render();
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
        $data = Appointment::query()->select('*');
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
            // 'email',
            'category_id' => ['title' => trans('messages.category') ],
            'service_id' => ['title' => trans('messages.service') ],
            // 'contact_number',
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
