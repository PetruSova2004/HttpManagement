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
                                    <th>Original_Url</th>
                                    <th>Short_Url</th>
                                    <th>User_Name</th>
                                    <th>Views</th>
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
            fetch('http://127.0.0.1:8001/api/admin/urls') // Replace with your actual API endpoint
                .then(response => response.json())
                .then(responseData => {
                    if (responseData.status && responseData.data && responseData.data.data) {
                        const urls = responseData.data.data;
                        const tableBody = document.querySelector('#userTableBody');

                        urls.forEach(url => {
                            const tr = document.createElement('tr');

                            const idTd = document.createElement('td');
                            idTd.textContent = url.id;
                            tr.appendChild(idTd);

                            const original_Td = document.createElement('td');
                            const original_link = document.createElement('a');
                            original_link.href = url.original_url;
                            original_link.textContent = url.original_url;

                            original_link.addEventListener('click', function() {
                                // Выполнение API-запроса при клике на ссылку
                                fetch(`http://127.0.0.1:8001/api/url/${encodeURIComponent(short_link.textContent)}`)
                                    .then(response => response.json())
                                    .then(data => {
                                        // Обработка данных, полученных из API
                                        console.log(data);
                                    })
                                    .catch(error => {
                                        // Обработка ошибок
                                        console.error(error);
                                    });
                            });

                            original_Td.appendChild(original_link);
                            tr.appendChild(original_Td);

                            const short_Td = document.createElement('td');
                            const short_link = document.createElement('a');
                            short_link.href = url.original_url;
                            short_link.textContent = "{{env('APP_URL')}}" + '/api/url/' + url.short_url;

                            short_link.addEventListener('click', function() {
                                // Выполнение API-запроса при клике на ссылку
                                fetch(short_link.textContent)
                                    .then(response => response.json())
                                    .then(data => {
                                        // Обработка данных, полученных из API
                                        console.log(data);
                                    })
                                    .catch(error => {
                                        // Обработка ошибок
                                        console.error(error);
                                    });
                            });

                            short_Td.appendChild(short_link);
                            tr.appendChild(short_Td);

                            const name_Td = document.createElement('td');
                            name_Td.textContent = url.name;
                            tr.appendChild(name_Td);

                            const views_Td = document.createElement('td');
                            views_Td.textContent = url.views;
                            tr.appendChild(views_Td);

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
