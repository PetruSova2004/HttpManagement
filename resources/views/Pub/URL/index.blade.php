<!DOCTYPE html>
<html lang="en">
@include('Pub.layouts.parts.header_settings')
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
    @include('Pub.layouts.parts.sidebar')

    @include('Pub.layouts.parts.wrapper')

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

</div>


@include('Pub.layouts.parts.footer_settings')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        fetch("http://127.0.0.1:8001/api/urls/{{\Illuminate\Support\Facades\Auth::user()->id}}") // Replace with your actual API endpoint
            .then(response => response.json())
            .then(responseData => {
                if (responseData.status && responseData.data && responseData.data.urls) {
                    const urls = responseData.data.urls;
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
                        short_link.textContent = url.short_url;

                        short_link.addEventListener('click', function() {
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

                        short_Td.appendChild(short_link);
                        tr.appendChild(short_Td);

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
</body>
</html>
