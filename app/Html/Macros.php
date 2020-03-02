<?php 

Form::macro('selectPredmetiNaziv', function ($predmet) {

	return Form::select('predmet_id', $predmet, null, ['class' => 'form-control']);
});
