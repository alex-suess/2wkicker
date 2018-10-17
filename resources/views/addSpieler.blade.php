@include('partials.head')
@include('partials.nav')
{{ Form::open(array('route' => 'player-store')) }}
    @csrf
    <label for="name">Spieler-Name:</label>
	<input type="text" name="name" id="name">
	<button>OK</button>
{{ Form::close() }}
@include('partials/style')

