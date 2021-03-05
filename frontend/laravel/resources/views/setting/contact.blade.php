    {{ Form::model($settings, ['method' => 'POST','route' => ['contactus_settings'],'enctype'=>'multipart/form-data','data-toggle'=>'validator']) }}

    {{ Form::hidden('id', null, array('placeholder' => 'id','class' => 'form-control')) }}
    {{ Form::hidden('page', $page, array('placeholder' => 'id','class' => 'form-control')) }}
    <div class="row">
        
        <div class="col-lg-12"> 
           
           <div class="form-group">
                <label for="" class=" control-label">Title</label>
                <div class="">
                    {{ Form::text('contact_title', null, ['class'=>"form-control" , 'placeholder'=>"Title"]) }}
                </div>
            </div>  
            <div class="form-group">
                <label for="" class="control-label">Address</label>
                <div class="">
                    {{ Form::textarea('contact_address', null, ['class'=>"form-control" , 'rows'=>5 , 'placeholder'=>"Address"]) }}
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label">Contact Email</label>
                <div class="">
                    {{ Form::email('contact_email', null, ['class'=>"form-control" , 'placeholder'=>"Contact Email"]) }}
                </div>
            </div>
            <div class="form-group">
                <label for="" class=" control-label">Contact Number</label>
                <div class="">
                    {{ Form::text('contact_number',null, ['class'=>"form-control" ,  'pattern'=>"[0-9]{6,12}" , 'placeholder'=>"Contact Number"]) }}
                </div>
            </div> 
            
        </div>
        <div class="col-lg-12"> 
      
            <div class="form-group">
                <div class="col-md-offset-3 col-sm-12 ">
                    {{ Form::submit('Save Changes', ['class'=>"btn btn-md btn-primary float-md-right"]) }}
                </div>
            </div>
         </div>
    </div>
                   

    {{ Form::close() }}        