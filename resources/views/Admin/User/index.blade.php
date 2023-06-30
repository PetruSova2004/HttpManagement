@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Urls</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('pub.url.index')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('logout')}}">Logout</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div id="usersTable"></div>
                        <div class="card-body table-responsive p-0 usersTable">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Login</th>
                                </tr>
                                </thead>
                                <tbody id="userTableBody">
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@stop

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('http://127.0.0.1:8001/api/admin/users') // Replace with your actual API endpoint
                .then(response => response.json())
                .then(responseData => {
                    if (responseData.status && responseData.data && responseData.data.data) {
                        const users = responseData.data.data;
                        const tableBody = document.querySelector('#userTableBody');

                        users.forEach(user => {
                            const tr = document.createElement('tr');

                            const idTd = document.createElement('td');
                            idTd.textContent = user.id;
                            tr.appendChild(idTd);

                            const nameTd = document.createElement('td');
                            nameTd.textContent = user.name;
                            tr.appendChild(nameTd);

                            const loginTd = document.createElement('td');
                            loginTd.textContent = user.login;
                            tr.appendChild(loginTd);

                            tableBody.appendChild(tr);
                        });
                    } else {
                        console.error('API response error:', responseData);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>
@stop
