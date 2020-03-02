<!-- Form group wrapper -->
<div class="form-group-wrapper">

	<!-- Regular file input -->
	<div class="form-group">
		<span class="fg-title mandatory">Document</span>
        <div class="fg-field">
            <div class="fg-file-field">
            	{!! Form::file('document', ['id' => 'document']) !!}
              	<span>Upload a document</span>
            </div>
        </div>
	</div>
	@if(isset($research->document))
		<span class="fg-field-notification">*Currently uploaded document: <a target="_blank" class="download-doc-cms" title="Download/Preview the Document" href="{{ asset('upload/research/'.$research->document) }}">{{ $research->document }}</a></span>
	@endif
	<!-- Regular file input -->
	
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
		<span class="fg-title">Description</span>
		<div class="fg-field">
			{!! Form::textarea('description', null, ['class'=>'fg-textarea-field']) !!}
		</div>
	</div>
	<!-- Regular textarea -->

	<!-- Select dropdown -->
	<div class="form-group">
		<span class="fg-title mandatory">Category</span>
		<div class="select-two-wrapper">
			{!! Form::select('research_category_id', $categories, null, ['placeholder' => 'Select a category', 'class'=>'select-two-field']) !!}
		</div>
	</div>
	<!-- Select dropdown -->

	<!-- Regular input -->
	<div class="form-group">
		<div class="col-4">
			<input type="submit" class="default-button cyan fl-left" value="{{ $buttonName }}">
		</div>
	</div>
</div>