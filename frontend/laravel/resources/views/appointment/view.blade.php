
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLabel">{{ $pageTitle }}</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <tbody>
                        <tr>
                            <th>{{ trans('messages.date') ." ". trans('messages.time')   }}</th>
                            <td>{{ date('d-m-Y',strtotime($appointmentdata->date)) ." ". date('h:i:s a',strtotime($appointmentdata->time)) }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('messages.name') }}</th>
                            <td>{{ isset($appointmentdata->user_id) && $appointmentdata->user  ? $appointmentdata->user->name : $appointmentdata->name }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('messages.category') }}</th>
                            <td>{{ isset($appointmentdata->category_id) && $appointmentdata->category ? $appointmentdata->category->name : '' }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('messages.service') }}</th>
                            <td>{{ isset($appointmentdata->service_id) && $appointmentdata->service ? $appointmentdata->service->name : '' }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('messages.price') }}</th>
                            <td>{{ $appointmentdata->price }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <a class="btn btn-md btn-info text-white" href="{{ route('appointment.edit',['id' => $appointmentdata->id]) }}" >{{ trans('messages.update_form_title',['form' => trans('messages.appointment') ]) }}</a>
            <a class="btn btn-md btn-danger" href="{{ route('appointment.delete',['id' => $appointmentdata->id]) }}" onclick="return confirm('{{ trans('messages.delete_form_message',['form' => trans('messages.appointment')]) }}')">{{ trans('messages.delete_form_title',['form'=>  trans('messages.appointment') ]) }}</a>
            <button type="button" class="btn btn-md btn-secondary" data-dismiss="modal">{{ trans('messages.close') }}</button>
        </div>
    </div>
</div>
