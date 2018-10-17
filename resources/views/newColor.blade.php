@include('partials.head')
@include('partials.nav')

{{ Form::open(array('route' => 'color-store')) }}
<label for="name">Farben-name</label>
<input name="name" id="name" />
{{ Form::close() }}

@include('partials/style')

