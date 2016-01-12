@extends('layouts/main')

@section('content')


		<?php $now = new DateTime(); ?>
	
		@foreach($data['genders'] as $gender)
			@foreach($data['belts'] as $belt)
				@foreach($data['age_categories'] as $age=>$values)
					
					@if ($gender == 'male')
						<?php $weights = $data['menWeights'];?>
					@else
						<?php $weights = $data['womenWeights']; ?>
					@endif

					@foreach($weights as $weight=>$textual)
						 
						<?php if (!$data[$gender][$age][$belt][$weight]->isEmpty()): ?>

							<table class="table table-stripped table-condensed table-bordered">
								<thead>
									<tr>
										<th>First Name</th>
										<th>Last name</th>
										<th>Nickname</th>
										<th>Age</th>
										<th>Belt</th>
										<th>Weight</th>
										<th>Sex</th>
									</tr>
								</thead>
								<tbody>	
								<h2>{{ucwords($gender)}} {{ucwords($age)}} {{ucwords($belt)}} {{ucwords($textual)}}</h2>
								<?php foreach($data[$gender][$age][$belt][$weight] as $fighter):?>
									<?php $dob = new DateTime($fighter->dob);  ?>
									<?php $f_age = $dob->diff($now); ?>
										<tr class="{{$fighter->belt}}">
											<td>{{ucwords($fighter->f_name)}}</td>
											<td>{{ucwords($fighter->l_name)}}</td>
											<td>{{ucwords($fighter->nickname)}}</td>
											<td>{{$f_age->format('%y')}}</td>
											<td>{{ucwords($fighter->belt)}}</td>
											<td>{{ucwords($textual)}}</td>
											<td>{{ucwords($fighter->gender)}}</td>
										</tr>
									
								<?php endforeach; ?>
								</tbody>
							</table>

							<br><br><br>

						<?php endif; ?>
						
					@endforeach

				@endforeach
			@endforeach
		@endforeach
@stop
