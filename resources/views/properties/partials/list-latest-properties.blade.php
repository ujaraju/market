
<div class="row">
	{{--$latestProperty is coming from ViewComposerService Provider --}}
	@foreach( $latestProperties as $property)
		@include('properties.partials.list')
	@endforeach
</div>