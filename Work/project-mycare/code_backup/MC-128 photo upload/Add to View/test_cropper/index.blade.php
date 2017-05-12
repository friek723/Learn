<html>

<link rel="stylesheet" href="{{url('css/bulma.css')}}">
<link rel="stylesheet" href="{{url('css/bulma-docs.css')}}">


<style>
@include('test_cropper.css.cropper_css')
@include('test_cropper.css.main_css')

.cropper_form {
	position: absolute;
	
	width: 50%;
	height: 50%;
	left: 25%;
	top:  25%;
	font-size: 46px;
}

.button {
    background-color: #4CAF50; /* Green */
  	font-size: 26px;
	text-align: center;
	text-decoration: none;
    display: inline-block;
}

</style>




<body>

<div class="cropper_form">
	<form method="post" id="upload_form" action="{{url('/test/cropper/cropper_upload')}}" enctype="multipart/form-data">
		{{csrf_field()}}

		<div class="columns">
			

			    <div class="field">
	                <label> This is a HTML form, use this button to crop & upload photos to server.</label>
	            	<h2>- You must <span style="color: blue">login</span> mycare to be able to upload photos.</h2>
	            	<h2>- Use the <span style="color: blue">red buttons</span> in the modal.</h2>
	            </div>

	            <div class="field">
	                <label> </label>
	                <p class="control">
	                    <a class="button is-primary" onclick="event.preventDefault();onClickUpload(this)">Click to upload a photo</a>
						<input type="hidden" id="upload_hidden" name="croppedImage" />
	                </p>
	            </div>
			
			
		</div>
	</form>
</div>

<!--Modal for uploading photo-->
<div class="modal fade" id="upload_modal" style="background-color: rgba(224, 224, 224, 0.5)">
    <button type="button" class="button is-primary" data-dismiss="modal">Close</button>
	@include('test_cropper.cropper_modal')
</div>





<script>
@include('test_cropper.js.cropper_js')
@include('test_cropper.js.main_js')

function onClickUpload(){
	$('#upload_modal').modal();
}

</script>



</body>
</html>
