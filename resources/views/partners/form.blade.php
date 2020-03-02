<!-- Form group wrapper -->
<div class="form-group-wrapper">
	<!-- Regular input -->
	<div class="form-group">
		<span class="fg-title mandatory">Name</span>
		<div class="fg-field">
			{!! Form::text('name', null, ['class'=>'fg-input-field']) !!}
		</div>
	</div>
	<!-- Regular input -->

	<!-- Regular input -->
	<div class="form-group">
		<span class="fg-title mandatory">Link</span>
		<div class="fg-field">
			{!! Form::text('link', null, ['class'=>'fg-input-field']) !!}
		</div>
	</div>
	<!-- Regular input -->

	<!-- Regular textarea -->
	<div class="form-group">
		<span class="fg-title">Description</span>
		<div class="fg-field">
			{!! Form::textarea('description', null, ['class'=>'fg-textarea-field']) !!}
		</div>
	</div>
	<!-- Regular textarea -->

	<!-- Regular image input -->
	<div class="form-group">
		<span class="fg-title mandatory">Image</span>
        <div class="fg-field">
            <div class="fg-file-field">
            	<input type="file" name="image" id="image">
              	<span>Choose an image</span>
            </div>
        </div>
	</div>
	<!-- Regular image input -->

	<!-- Show the partner's image while editing the details -->
	@if(isset($partners) && $partners->image != "" && file_exists("upload/partners/" . $partners->image))	  	
    	<div class="form-group">
            <?php list($width, $height) = getimagesize("upload/partners/" . $partners->image); ?>
            @if($width < $height)
              <img alt="{{ $partners->name }}" src="{{ asset('/upload/partners/'. $partners->image) }}" height="250px">
            @else
              <img alt="{{ $partners->name }}" src="{{ asset('/upload/partners/' . $partners->image) }}" width="250px">
            @endif 
        </div>    
    @endif
    <!-- Show the partner's image while editing the details -->

	<!-- Regular input -->
	<div class="form-group">
		<div class="col-4">
			<input type="submit" class="default-button cyan fl-left" value="{{ $buttonName }}">
		</div>
	</div>
</div>