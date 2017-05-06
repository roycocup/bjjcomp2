@extends('layouts/basic')

@section('content')

    <table id="app-4" class="table table-striped">
        <tr>
            <td></td>
            <td></td>
            <td>Search: <input placeholder="name" v-model="search"></td>
        </tr>
        <tr>
            <td>Date</td>
            <td>Name</td>
            <td>Actions</td>
        </tr>
        <tr v-for="user in users">
            <td>@{{ user.created_at }}</td>
            <td>@{{ user.f_name }} @{{ user.l_name }}</td>
            <td><input type="checkbox" :value="user.id" v-model="namesTicked"></td>
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
                search: '',
                namesTicked: [],
            },

            methods: {
                fetchData: function () {
                    this.$http.get(apiURL).then(function(response){
                        this.$data.users = response.data;
                    })
                },

                log: function (o){
                    console.log(o);
                }
            },

            created: function(){
              this.fetchData();
            },

            watch:{
                search: 'log',
                namesTicked: 'log',
            },

            filters: {
                truncate: function (v) {
                    var newline = v.indexOf('\n')
                    return newline > 0 ? v.slice(0, newline) : v
                },
                formatDate: function (v) {
                    return v.replace(/T|Z/g, ' ')
                }
            },

        });


    </script>
@stop