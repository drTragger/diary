@extends('templates.index')

@section('content')
	@include('common.errors')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					@if(count($groups)>0)
						@foreach($groups as $group)
							<div style="border:2px solid #000">
								<p>{{$group->id}}</p>
								<p>{{$group->name}}</p>
								<p>{{$group->description}}</p>
								<p>{{$group->owner_id}}</p>
								<p>{{$group->status}}</p>
								<p>{{$group->date_created}}</p>
							</div>
						@endforeach
					@else
						NOTHING
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection
