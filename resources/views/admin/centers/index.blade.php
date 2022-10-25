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
              <h5 class="card-title">Danh sách trung tâm</h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Tên</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($centers as $center)
                    <tr>
                      <td scope="row">{{ $center->name }}</td>
                      <td>
                        <a href="{{ route('admin.centers.edit', $center) }}" class="btn btn-warning">Sửa</a>
                        <a href="{{ route('admin.centers.classes.index', $center) }}" class="btn btn-primary">Quản lý lớp</a>
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
@endsection
