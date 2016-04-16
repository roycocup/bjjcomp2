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
		Side list
	</div>
    <div class="col-md-9">
        <h2>Nome da Luta</h2>
        <table border="1">
            <tr>
                <td>
                    <div class="top-left-bracket">
                        <div class="fighter-box pull-left">Paulo "Rodrigues" Freitas</div>
                        <div class="pull-left tlb"></div>
                    </div>
                </td>
                <td>Lutador 3</td>
            </tr>
            <tr>
                <td>Luta 1</td>
                <td>Luta 2</td>
            </tr>   
            <tr>
                <td>
                    <div class="bottom-left-bracket">
                        <div class="fighter-box pull-left">Paulo "Rodrigues" Freitas</div>
                        <div class="pull-left blb"></div>
                    </div>
                </td>
                <td>Lutador 4</td>
            </tr>
        </table>
    </div>
</div>

@stop