
<h2>Recently added</h2>
<div class="row">
{{--$latest is coming from ViewComposerService Provider --}}
@foreach( $latest as $product)
	@include('products.partials.list')
@endforeach
</div>