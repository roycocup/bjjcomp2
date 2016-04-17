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

    <!-- sidebar -->
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

    <!-- main -->
    <div class="col-md-9">
        <h2>FightName</h2>
        <div class="well">
            Number of fighters in category: 10
        </div>
        <div class="well">
            <form action="#">
                Gender
                <select name="gender" id="gender">
                    <option value="">---</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                Age
                <select name="age" >
                    <option value="adult">adult</option>
                </select>
                Belt
                <select name="belt">
                    <option value="white">White</option>
                    <option value="blue">Blue</option>
                    <option value="purple">Purple</option>
                    <option value="brown">Brown</option>
                    <option value="black">Black</option>
                </select>
                <div id="men-weight" style="display: none">
                    Weight (Men)
                    <select name="men-weight">
                        <option value="rooster">Rooster (<57.5Kg)</option>
                        <option value="s_feather">Super Feather (<64Kg)</option>
                        <option value="feather">Feather (<70Kg)</option>
                        <option value="light">Light (<76Kg)</option>
                        <option value="middle">Middle (<82.3Kg)</option>
                        <option value="m_heavy">Medium Heavy (<88.3Kg)</option>
                        <option value="heavy">Heavy (<94.3Kg)</option>
                        <option value="s_heavy">Super Heavy (<100.5Kg)</option>
                        <option value="u_heavy">Ultra Heavy (>100.5Kg)</option>
                    </select>
                </div>
                <div id="women-weight" style="display: none">
                    Weight (Women)
                    <select name='women-weight' style="display: hidden">
                        <option value="s_feather">Super Feather (<53.5Kg)</option>
                        <option value="feather">Feather (<58.5Kg)</option>
                        <option value="light">Light (<64Kg)</option>
                        <option value="middle">Middle (<69Kg)</option>
                        <option value="m_heavy">Medium Heavy (<74Kg)</option>
                        <option value="heavy">Heavy (>74Kg)</option>
                    </select>
                </div>
                <input type="button" id="filter-btn" class="btn btn-primary" value="Get Bracket">
            </form>
        </div>
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

<script>
    $(document).ready(function(){
        $('#filter-btn').click(function(event) {
            $.post('competition/getFight', $('form').serialize(), function(response){
                var selected = $(this).val();
                console.log(selected); 
            });
        });

        $('#gender').change(function(event) {
            var selected = $(this).val(); 
            if (selected == 'male'){
                $('#men-weight').show();
                $('#women-weight').hide();
            }else{
                $('#men-weight').hide();
                $('#women-weight').show();
            }
        });
        

    });

</script>


@stop


