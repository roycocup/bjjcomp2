@extends('layouts/basic')

@section('content')

    <table id="app-4" class="table table-striped">
        <tr>
            <td></td>
            <td></td>
            <td>Search: <input placeholder="name"></td>
        </tr>
        <tr>
            <td>Date</td>
            <td>Name</td>
            <td>Actions</td>
        </tr>
        <tr v-for="user in users">
            <td>@{{ user.created_at }}</td>
            <td>@{{ user.f_name }} @{{ user.l_name }}</td>
            <td><input type="checkbox" ></td>
        </tr>
    </table>

@stop

@section('javascripts')
    <script>
        Vue.config.devtools = true;
        var apiURL = '/api/getList';

        var vm = new Vue({
            el: '#app-4',

            data : {
                users: {},
                search: {},
                namesTicked: [],
            },

            methods: {
                fetchData: function () {
                    this.$http.get(apiURL).then(function(response){
                        this.$data.users = response.data;
                    })
                }
            },

            created: function(){
              this.fetchData();
            },

        });


    </script>
@stop