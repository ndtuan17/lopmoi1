@extends('layouts.admin')

@section('main')
  <main id="main" class="main">
    @if (session('message'))
      <h1>{{ session('message') }}</h1>
    @endif

    <div class="pagetitle">
      <h1>{{ $center->name }}</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.centers.classes.index', $center) }}">Danh sách</a></li>
          <li class="breadcrumb-item active"><a class="active"
              href="{{ route('admin.centers.classes.create', $center) }}">Thêm mới</a>
          </li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Danh sách lớp</h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Mã lớp</th>
                    <th scope="col">Thông tin</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($classes as $class)
                    <tr>
                      <td scope="row">{{ $class->code ?? 'unknow' }}</td>
                      <td>
                        {{ $class->grade->name . ' - ' . $class->commune->name . ', ' . $class->commune->district->name }}
                      </td>
                      <td>
                        <a href="{{ route('admin.centers.classes.show', [$center, $class]) }}" class="btn btn-primary">Chi
                          tiết</a>
                        <a href="{{ $class->source_link }}" class="btn btn-outline-primary" target="_blank">Truy cập</a>
                        <button class="btn btn-danger show_confirm" for="delete{{ $class->id }}">Xóa</button>
                      </td>
                    </tr>
                    <form action="{{ route('admin.centers.classes.destroy', [$center, $class]) }}" method="POST"
                      id="delete{{ $class->id }}">
                      @csrf
                      @method('DELETE')
                    </form>
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

  {{-- show confirm delete --}}
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
            console.log('delete');
            form.submit();
          }
        })
      })
    })
  </script>
@endsection
