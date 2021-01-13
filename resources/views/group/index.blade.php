@extends('templates.default')

@section('content')
	@include('common.errors')
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<ul id="nav navbar-nav">
				<li>
					<a href="{{route('groups.index')}}"
					   class="nav-link">My groups
					</a>
				</li>
				<li>
					<a href="{{route('groups.create')}}"
					   class="nav-link">Create Group
					</a>
				</li>
				<li>
					<a href=""
					   class="nav-link">Marks
					</a>
				</li>
				<li>
					<a href=""
					   class="nav-link">Participants
					</a>
				</li>
				<li>
					<a href="#"
					   class="nav-link">New homework
					</a>
				</li>
				<li>
					<a href="#"
					   class="nav-link">Submited homework
					</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					@if(count($groups)>0)
						@foreach($groups as $group)
							<div style="border:2px solid #000">
								<p>Title: {{$group->name}}</p>
								<p>Description: {{$group->description}}</p>
								<p>Owner: {{$group->owner_id}}</p>
								<p>Date created: {{$group->date_created}}</p>
								<div>
									<a href="{{route('groups.show', $group->id)}}">more information</a>
								</div>
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
