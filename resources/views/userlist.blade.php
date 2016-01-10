@extends('layout')

@section('content')
	<table class="table table-stripped table-condensed">
		<thead>
			<tr>
				<th>First Name</th>
				<th>Last name</th>
				<th>Nickname</th>
				<th>Age</th>
				<th>Belt</th>
				<th>Weight</th>
				<th>Sex</th>
				<th>T-Shirt Size</th>
			</tr>
		</thead>
		<tbody>
	<?php $now = new DateTime(); ?>
    @foreach($data['all'] as $user)
    	<?php 
    		$dob = new DateTime($user['dob']); 
    		$age = $dob->diff($now);
    		$weight = App\Helper::getWeightStr($user['weight'], $user['gender']);
    	?>
    		<tr class="{{$user['belt']}}">
				<td>{{$user['f_name']}}</td>
				<td>{{$user['l_name']}}</td>
				<td>{{$user['nickname']}}</td>
				<td>{{$age->format('%y')}}</td>
				<td>{{$user['belt']}}</td>
				<td>{{$weight}}</td>
				<td>{{$user['gender']}}</td>
				<td>{{strtoupper($user['t_shirt_size'])}}</td>
			</tr>
    @endforeach
    	</tbody>
	</table>

@stop
