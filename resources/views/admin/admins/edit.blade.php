@extends('layouts.admin');

@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Sửa thông tin</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.admins.index') }}">Danh sách</a></li>
                    <li class="breadcrumb-item active"><a class="active" href="{{ route('admin.admins.create') }}">Thêm mới</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->


        <section class="section">
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Cập nhật thông tin nhân sự</h5>

                            <!-- General Form Elements -->
                            <form method="POST" action="{{ route('admin.admins.update', $admin) }}">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Họ và tên</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') ?? $admin->name }}">
                                        @error('name')
                                            <p>{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email"
                                            value="{{ old('email') ?? $admin->email }}">
                                        @error('email')
                                            <p>{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    </div>
                                </div>

                            </form><!-- End General Form Elements -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
