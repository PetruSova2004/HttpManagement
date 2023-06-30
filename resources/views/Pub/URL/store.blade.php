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
                <form id="urlForm" action="{{route('storeUrl', ['user_id' => \Illuminate\Support\Facades\Auth::user()->id])}}" method="post">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <input type="text" name="original_url" class="form-control" placeholder="Original_Url">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Добавить">
                    </div>
                </form>
            </div>
        </div>
    </section>

</div>

</body>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const urlForm = document.querySelector('#urlForm');

        urlForm.addEventListener('submit', function (event) {
            event.preventDefault();

            const formData = new FormData(urlForm);
            const url = urlForm.getAttribute('action');

            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
                .then(response => response.json())
                .then(responseData => {
                    if (responseData.status) {
                        // Redirect to a different page
                        window.location.href = '{{ route("pub.url.index") }}';
                    } else {
                        console.error('Oops, something goes wrong');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });
</script>
