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
		<span class="fg-title mandatory">Title</span>
		<div class="fg-field">
			{!! Form::text('title', null, ['class'=>'fg-input-field']) !!}
		</div>
	</div>
	<!-- Regular input -->

	<!-- Select dropdown -->
	<div class="form-group">
		<span class="fg-title mandatory">Category</span>
		<div class="select-two-wrapper">
			{!! Form::select('about_category_id', $categories, null, ['placeholder' => 'Select a category', 'class'=>'select-two-field']) !!}
		</div>
	</div>
	<!-- Select dropdown -->

	<!-- Regular textarea -->
	<div class="form-group">
		<span class="fg-title">Biography</span>
		<div class="fg-field">
			{!! Form::textarea('biography', null, ['class'=>'fg-textarea-field']) !!}
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
	@if(isset($about) && $about->image != "" && file_exists("upload/about/" . $about->image))	  	
    	<div class="form-group">
            <?php list($width, $height) = getimagesize("upload/about/" . $about->image); ?>
            @if($width < $height)
              <img alt="{{ $about->name }}" src="{{ asset('/upload/about/'. $about->image) }}" height="250px">
            @else
              <img alt="{{ $about->name }}" src="{{ asset('/upload/about/' . $about->image) }}" width="250px">
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