<!-- Form group wrapper -->
<div class="form-group-wrapper">
	<!-- Regular input -->
	<div class="form-group">
		<span class="fg-title mandatory">Title</span>
		<div class="fg-field">
			{!! Form::text('title', null, ['class'=>'fg-input-field']) !!}
		</div>
	</div>
	<!-- Regular input -->


	<!-- Regular textarea -->
	<div class="form-group">
		<span class="fg-title mandatory">Description</span>
		<div class="fg-field fg-tinymce-textarea">
			{!! Form::textarea('description', null, ['class'=>'tinymce']) !!}
		</div>
	</div>
	<!-- Regular textarea -->

	<!-- Regular image input -->
	<div class="form-group">
		<span class="fg-title">Thumbnail</span>
        <div class="fg-field">
            <div class="fg-file-field">
            	<input type="file" name="thumbnail" id="thumbnail">
              	<span>Choose a thumbnail</span>
            </div>
        </div>
	</div>
	<span class="fg-field-notification">*Preferable thumbnail dimensions are 150x150</span>
	<!-- Regular image input -->

	<!-- Show news thumbnail while editing the details -->
	@if(isset($news) && $news->thumbnail != "" && file_exists("upload/news/".$news->id."/".$news->thumbnail))	  	
    	<div class="form-group">
            <?php list($width, $height) = getimagesize("upload/news/".$news->id."/".$news->thumbnail); ?>
            @if($width < $height)
              <img alt="{{ $news->title }}" src="{{ asset('upload/news/'.$news->id.'/'.$news->thumbnail) }}" height="250px">
            @else
              <img alt="{{ $news->title }}" src="{{ asset('upload/news/'.$news->id.'/'.$news->thumbnail) }}" width="250px">
            @endif 
        </div>    
    @endif
    <!-- Show news thumbnail while editing the details -->

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

	<!-- Show news image while editing the details -->
	@if(isset($news) && $news->image != "" && file_exists("upload/news/".$news->id."/".$news->image))  	
    	<div class="form-group">
            <?php list($width, $height) = getimagesize("upload/news/".$news->id."/".$news->image); ?>
            @if($width < $height)
              <img alt="{{ $news->name }}" src="{{ asset('/upload/news/'.$news->id.'/'.$news->image) }}" height="250px">
            @else
              <img alt="{{ $news->name }}" src="{{ asset('/upload/news/'.$news->id.'/'.$news->image) }}" width="250px">
            @endif 
        </div>    
    @endif
    <!-- Show news image while editing the details -->

	<!-- Regular input -->
	<div class="form-group">
		<div class="col-4">
			<input type="submit" class="default-button cyan fl-left" value="{{ $buttonName }}">
		</div>
	</div>
</div>