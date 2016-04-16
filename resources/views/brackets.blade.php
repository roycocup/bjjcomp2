@extends('layouts/basic')

@section('content')

<style type="text/css">
    table{ width: 100%; }

    .fighter-box { 
        border: 1px solid black; 
        width: 300px; 
    }
    .tlb, .blb{
        border: none;
        border-top: 1px solid black;
        border-right: 1px solid black;
        width: 150px;
        height: 5em;
        margin-top: .7em;
    }

    .blb {
        border: none;
        border-bottom: 1px solid black;
        border-right: 1px solid black;
        margin-bottom:  .7em;
    }
</style>


<div class="row">

	<div class="col-md-3">
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
                                    </tr>
                                </thead>
                                <tbody> 
                                <h5>{{ucwords($gender)}} {{ucwords($age)}} {{ucwords($belt)}} {{ucwords($textual)}}</h5>
                                <?php foreach($data[$gender][$age][$belt][$weight] as $fighter):?>
                                    <?php $dob = new DateTime($fighter->dob);  ?>
                                    <?php $f_age = $dob->diff($now); ?>
                                        <tr class="{{$fighter->belt}}">
                                            <td>{{ucwords($fighter->f_name)}}</td>
                                            <td>{{ucwords($fighter->l_name)}}</td>
                                            <td>{{ucwords($fighter->nickname)}}</td>
                                            <td>{{$f_age->format('%y')}}</td>
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
	</div>


    <div class="col-md-9">
        <h2>Nome da Luta</h2>
        <h3>Numero de lutadores na categoria </h3>
        <table border="1">
            <tr>
                <td>lutador 1</td>
                <td>Lutador 3</td>
            </tr>
            <tr>
                <td>Luta 1</td>
                <td>Luta 2</td>
            </tr>   
            <tr>
                <td>Lutador 2</td>
                <td>Lutador 4</td>
            </tr>
        </table>
    </div>
</div>

@stop