@extends('layouts/basic')

@section('content')

    <table id="app-4" class="table table-striped">
        <tr>
            <td></td>
            <td></td>
            <td>Search: <input v-model="search" placeholder="name"></td>
        </tr>
        <tr>
            <td>Date</td>
            <td>Name</td>
            <td>Actions</td>
        </tr>
        <tr v-for="user in users">
            <td>@{{ user.created_at }}</td>
            <td>@{{ user.f_name }} @{{ user.l_name }}</td>
            <td><input type="checkbox" value="@{{ user.id }}" v-model="checkedNames"></td>
        </tr>
    </table>

    <p>Checked names are: @{{ checkedNames }}</p>
    <p>Search is: @{{ search }}</p>

@stop

@section('javascripts')
    <script>
        var apiURL = '/api/getList';

        new Vue({
            el: '#app-4',

            data: function () {
                return {users: this.fetchData()};
            },

            methods: {
                fetchData: function () {
                    var xhr = new XMLHttpRequest();
                    var self = this;
                    xhr.open('GET', apiURL );
                    xhr.onload = function () {
                        self.users = JSON.parse(xhr.responseText);
                        console.log(self.users.users);
                    };
                    xhr.send();
                }
            }
        });


    </script>
@stop