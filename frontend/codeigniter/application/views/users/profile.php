<div class="col-md-12 pall-20">
    <div class="row ">
		<div class="col-md-4">
			<div class="user-sidebar">
				<div class="user-body user-profile text-center">
					<div class="user-img">
					<img class="rounded-circle width-max-200 img-fluid image" src="<?php echo base_url('assets/images/user/1.jpg') ?>" alt="profile-pic">
					</div>
					<div class="sideuser-info">
						<span class="mb-2">username</span>
						<a>email</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="user-content">
					<input type="hidden" name="profile" value="profile">
                    <input type="hidden" name="username">
                    <input type="hidden" name="email">
                    <input type="hidden" name="id">
				        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group  has-feedback">
                                    <label class="col-md-12 control-label">Name<span class="required">*</span></label>  
                                    <div class="col-md-12">
                                        <input type="text" name="name" placeholder="Enter Name" required />
                                    </div> 
                                </div> 
                            </div>
				        <div class="col-md-6">
                            <div class="form-group  has-feedback">
                                    <label class="col-md-12 control-label">Contact No<span class="required">*</span></label>
                                    <div class="col-md-12">  
                                        <input type="text" name="contact_number" placeholder="Enter Contactno" >
                                    </div>
                                </div> 
                            </div>
				        <div class="col-md-6">
				            <div class="form-group {{ $errors->has('gender') ? ' has-danger' : '' }}">
				                <label class="col-md-12 control-label" >Gender<span class="required">*</span></label>  
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="radio" name="gender" class="radio no-wh mr-10" id="male"><label for="male">Male</label>
                                            <input type="radio" name="gender" class="radio no-wh mr-10" id="female"><label for="female">Female</label>
                                        </div>
                                    </div>
				            </div> 
				        </div>
				        <div class="col-md-12">
				            <div class="form-group  has-feedback">
                                <label class="col-md-12 control-label">Portfolio</label>  
                                <div class="col-md-12">
                                    <textarea name="portfolio" placeholder="Portfolio" class="form-control textarea" rows="4"></textarea>
                                </div> 
				            </div> 
				        </div>
				        
				        <div class="col-md-6">
				            <div class="form-group  has-feedback">
				                <label class="col-md-12 control-label">Designation</label>  
				            </div> 
				        </div>
				        
				        <div class="col-md-6">
				            <div class="form-group">
				                <label class="col-md-12 control-label">Upload Profile Image</label>  
				                <div class="row mlr-0">
				                    <div class="col-md-12">
										<div class="custom-file col-md-12">
											<input type="file" class="custom-file-input custom-file-input-sm details">
                                            <label class="custom-file-label" for="profile_image">Profile Image</label>
										</div>
				                    </div> 
				                </div>
				            </div> 
				        </div>

				        <div class="col-md-12">
                            <?php echo form_submit('submit', 'Update',['class'=>'btn btn-md btn-primary float-md-right']); ?>
				        </div>
				    </div>
			</div>
		</div>
    </div>
</div>

<script>

	function readURL(input) {
	  if (input.files && input.files[0]) {
	    var reader = new FileReader();

	    var res=isImage(input.files[0].name);

	    if(res==false){
	        var msg='Image should be png/PNG, jpg/JPG & jpeg/JPG.';
	        Snackbar.show({text: msg ,pos: 'bottom-center',backgroundColor:'#f94b4b',actionTextColor:'white'});
	        return false;
	    }

	    reader.onload = function(e) {
	      $('.image').attr('src', e.target.result);
	    }

	    reader.readAsDataURL(input.files[0]);
	  }
	}

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
	        return true;
	    }
	    return false;
	}

	$(".filestyle2").filestyle({size: "xs",btnClass: "button xs"});
   
    $(".filestyle2").change(function(event) {
      readURL(this);
    });
   
    $(document).ready(function(){
    	if (typeof(tinyMCE) != "undefined") {
    	    tinymce.init({
    	        selector: '.textarea',
    	        height: 100,
    	        theme: 'modern',
    	        content_css: [
    	            // 'http://fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    	            // 'http://www.tinymce.com/css/codepen.min.css'
    	        ],
    	        image_advtab: true,
    	        plugins: "textcolor colorpicker image imagetools media charmap link print textcolor code codesample table",
    	        toolbar: "image undo redo | link image | code table",
    	        toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | forecolor backcolor | removeformat | code',
    	        image_title: true,
    	        automatic_uploads: true,
    	        file_picker_types: 'image',
    	        file_picker_callback: function (cb, value, meta) {
    	            var input = document.createElement('input');
    	            input.setAttribute('type', 'file');
    	            input.setAttribute('accept', 'image/*');

    	            input.onchange = function () {
    	                var file = this.files[0];

    	                var reader = new FileReader();
    	                reader.onload = function () {
    	                    var id = 'blobid' + (new Date()).getTime();
    	                    var blobCache = tinymce.activeEditor.editorUpload.blobCache;
    	                    var base64 = reader.result.split(',')[1];
    	                    var blobInfo = blobCache.create(id, file, base64);
    	                    blobCache.add(blobInfo);

    	                    cb(blobInfo.blobUri(), {title: file.name});
    	                };
    	                reader.readAsDataURL(file);
    	            };

    	            input.click();
    	        }
    	    });
    	}
    });
</script>