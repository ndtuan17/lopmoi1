@extends('layouts.admin');

@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Quản lý Trung tâm</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.centers.index') }}">Danh sách</a></li>
                    <li class="breadcrumb-item active"><a class="active" href="{{ route('admin.centers.create') }}">Thêm
                            mới</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->


        <section class="section">
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $center->name }}</h5>

                            <!-- General Form Elements -->
                            <form method="POST" action="{{ route('admin.centers.update', $center) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Ảnh hiện tại</label>
                                    <div class="col-sm-10 card">
                                        <img src="/{{ $center->avatar_path }}" class="card-img-top" alt="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Tên trung tâm</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') ?? $center->name }}">
                                        @error('name')
                                            <p>{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Thông tin</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" style="height: 158px;" name="description">{{ old('description') ?? $center->description }}</textarea>
                                        @error('description')
                                            <p>{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Ảnh đại diện</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="formFile" name="avatar">
                                        @error('avatar')
                                            <p>{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Link Fanpage</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="fanpage"
                                            value="{{ old('fanpage') ?? $center->fanpage }}">
                                        @error('fanpage')
                                            <p>{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Website</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="website"
                                            value="{{ old('website') ?? $center->website }}">
                                        @error('website')
                                            <p>{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Mức phí</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="fee_percent"
                                            value="{{ old('fee_percent') ?? $center->fee_percent }}">
                                        @error('fee_percent')
                                            <p>{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Link danh sách lớp</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="url_show_classes"
                                            value="{{ old('url_show_classes') ?? $center->url_show_classes }}">
                                        @error('url_show_classes')
                                            <p>{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                        <button class="btn btn-danger show_confirm" for="delete">Xóa</button>
                                    </div>
                                </div>

                            </form><!-- End General Form Elements -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
    <form action="{{ route('admin.centers.destroy', $center) }}" class="btn" method="POST" id="delete">
        @csrf
        @method('DELETE')
    </form>
    <script>
        $('.show_confirm').each((key, button) => {
            btn = $(button);
            console.log(btn);
            var form = $('form#' + btn.attr('for'));
            console.log(form);
            btn.click(event => {
                event.preventDefault();
                swal({
                    title: 'Are you sure?',
                    text: 'think more',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                }).then(will => {
                    if (will) {
                        form.submit();
                    }
                })
            })
        })
    </script>
@endsection
