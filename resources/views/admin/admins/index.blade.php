@extends('layouts.admin')

@section('main')
    <main id="main" class="main">
        @if (session('message'))
            <h1>{{ session('message') }}</h1>
        @endif

        <div class="pagetitle">
            <h1>Quản lý Nhân sự</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.admins.index') }}">Danh sách</a></li>
                    <li class="breadcrumb-item active"><a class="active" href="{{ route('admin.admins.create') }}">Thêm mới</a>
                    </li>
                </ol>
            </nav>
        </div><!-- End Page Title -->


        <section class="section">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Danh sách nhân viên</h5>

                            <!-- Table with stripped rows -->
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Họ và tên</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admins as $admin)
                                        <tr>
                                            <td scope="row">{{ $admin->name }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td>
                                                <form action="{{ route('admin.admins.destroy', $admin) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger show_confirm">Xóa</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <script>
        $('.show_confirm').click(function(event) {
            var form = $(this).closest('form');
            var name = $(this).data('name');
            event.preventDefault();
            swal({
                title: 'Are you sure you want to delete this record?',
                text: 'If you delete this, it will be gone forever.',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            }).then(willDelete => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
