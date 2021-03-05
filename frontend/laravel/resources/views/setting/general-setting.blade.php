{{ Form::model($settings, ['method' => 'POST','route' => ['settingsUpdates'],'enctype'=>'multipart/form-data','data-toggle'=>'validator']) }}

{{ Form::hidden('id', null, array('placeholder' => 'id','class' => 'form-control')) }}
{{ Form::hidden('page', $page, array('placeholder' => 'id','class' => 'form-control')) }}

<div class="row">
    <div class="col-lg-6"> 
        <div class="form-group">
            <label for="avatar" class="col-sm-3 control-label">Logo</label>
            <div class="col-sm-12">

                <div class="row">
                    <div class="col-sm-4">
                        <img src="{{ getSingleMedia($settings,'site_logo') }}" width="120" alt="site_logo" class="image site_logo">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file col-md-12">
                            {{ Form::file('site_logo', ['class'=>"custom-file-input custom-file-input-sm detail" , 'id'=>"site_logo" , 'lang'=>"en" , 'accept'=>"image/*"]) }}
                            <label class="custom-file-label" for="site_logo">Logo</label>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="form-group">
            <label for="avatar" class="col-sm-4 control-label">Favicon</label>
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="{{ getSingleMedia($settings,'site_favicon') }}" height="30" alt="site_favicon" class="image site_favicon">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file col-md-12">
                            {{ Form::file('site_favicon', ['class'=>"custom-file-input custom-file-input-sm detail" , 'id'=>"site_favicon" , 'lang'=>"en" , 'accept'=>"image/*"]) }}
                            <label class="custom-file-label" for="site_favicon">Favicon</label>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-6 control-label">{{ trans('messages.site_name') }}</label>
            <div class="col-sm-12">
                {{ Form::text('site_name', null, ['class'=>"form-control" ,'placeholder'=> trans('messages.site_name') ]) }}
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-6 control-label">Company Email</label>
            <div class="col-sm-12">
                {{ Form::email('site_email', null, ['class'=>"form-control" ,'placeholder'=>"Company Email"]) }}
            </div>
        </div>
        
        <div class="form-group">
            <label for="" class="col-sm-6 control-label">Site Description</label>
            <div class="col-sm-12">
                {{ Form::textarea('site_description', null, ['class'=>"form-control textarea" , 'rows'=>3  , 'placeholder'=>"A few words about site"]) }}
            </div>
        </div>
    </div>
    <div class="col-lg-6"> 
        <!-- <hr> -->
        <div class="form-group">
            <label for="" class="col-sm-12 control-label">Google Map API</label>
            <div class="col-sm-12">
                {{ Form::text('google_map_api', null, ['class'=>"form-control" , 'placeholder'=>"Google Map API"]) }}
            </div>
        </div>
        <!-- <hr> -->
        <div class="form-group">
            <label for="" class="col-sm-4 control-label">Facebook URL</label>
            <div class="col-sm-12">
                {{ Form::text('facebook_url', null, ['class'=>"form-control" , 'placeholder'=>"Facebook URL"]) }}
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-4 control-label">Twitter URL</label>
            <div class="col-sm-12">
                {{ Form::text('twitter_url', null, ['class'=>"form-control" , 'placeholder'=>"Twitter URL"]) }}
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-4 control-label">Google+ URL</label>
            <div class="col-sm-12">
                {{ Form::text('gplus_url', null, ['class'=>"form-control" , 'placeholder'=>"Google+ URL"]) }}
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-4 control-label">LinkedIn URL</label>
            <div class="col-sm-12">
                {{ Form::text('linkedin_url', null, ['class'=>"form-control" , 'placeholder'=>"LinkedIn URL"]) }}
            </div>
        </div>
        <!-- <hr> -->
        <div class="form-group">
            <label for="" class="col-sm-4 control-label">Copyright Text</label>
            <div class="col-sm-12">
                {{ Form::text('site_copyright', null, ['class'=>"form-control" , 'placeholder'=>"Copyright Text"]) }}
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
<script type="text/javascript">
    // $(".filestyle_js").filestyle({ btnClass: "btn btn-primary btn-sm " });
    // $(".filestyle_js").change(function(event) {
    //     readURL(this);
    // });
    function getExtension(filename) {
            var parts = filename.split('.');
            return parts[parts.length - 1];
        }
        function isImage(filename) {
            var ext = getExtension(filename);
            switch (ext.toLowerCase()) {
                case 'jpg':
                case 'jpeg':
                case 'png':
                case 'gif':
                case 'ico':
                    return true;
            }
            return false;
        }
    function readURL(input,className) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var res = isImage(input.files[0].name);
            if(res == false){
                var msg='Image should be png/PNG, jpg/JPG & jpeg/JPG.';
                Snackbar.show({text: msg ,pos: 'bottom-right',backgroundColor:'#d32f2f',actionTextColor:'#fff'});
                return false;
            }
            reader.onload = function(e){
                $(document).find('img.'+className).attr('src', e.target.result);
                $(document).find("label."+className).text((input.files[0].name));
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function (){
        $(document).on('change','#site_logo',function(){
            readURL(this,'site_logo');
        });
        $(document).on('change','#site_favicon',function(){
            readURL(this,'site_favicon');
        });
    })
</script>