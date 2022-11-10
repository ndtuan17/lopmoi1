@extends('layouts.admin')

@section('main')
  <style>
    .popup {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 999999;
      display: none;
      background-color: rgba(0, 0, 0, 0.6);
    }
  </style>

  <main id="main" class="main">
    @if (session('message'))
      <h1>{{ session('message') }}</h1>
    @endif
    <div class="flex popup align-items-center justify-content-center">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Lọc gia sư</h5>

            <!-- Horizontal Form -->
            <form action="{{route('admin.tutors.index')}}">
              <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Trạng thái</legend>
                <div class="col-sm-10">
                  @foreach ($states as $item)
                    <div class="form-check">
                      <input type="radio" class="form-check-input" name="status_id" id="status_{{ $item->id }}"
                        value="{{ $item->id }}">
                      <label for="status_{{ $item->id }}" class="form-check-label">{{ $item->name }}</label>
                    </div>
                  @endforeach
                </div>
              </fieldset>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Khu vực</label>
                <div class="col-sm-10">
                  <select class="form-select" name="district_id">
                    <option value="">Tất cả quận/huyện</option>
                    @foreach ($districts as $item)
                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Môn dạy</label>
                <div class="col-sm-10">
                  <select class="form-select" name="subject_id">
                    <option value="">Tất cả môn học</option>
                    @foreach ($subjects as $item)
                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Giới tính</legend>
                <div class="col-sm-10">
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="gender" id="gender_male"
                      value="male">
                    <label for="gender_male" class="form-check-label">Nam</label>
                  </div>
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="gender" id="gender_female"
                      value="female">
                    <label for="gender_female" class="form-check-label">Nữ</label>
                  </div>
                </div>
              </fieldset>

              <div class="text-center">
                <button type="submit" class="btn btn-primary">Tiến hành lọc</button>
                <button class="btn btn-secondary">Thoát</button>
              </div>
            </form><!-- End Horizontal Form -->

          </div>
        </div>
      </div>
    </div>

    <div class="pagetitle">
      <h1>Quản lý Gia Sư</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.tutors.index') }}">Danh sách</a></li>
          <li class="breadcrumb-item active"><a class="active" href="{{ route('admin.tutors.create') }}">Thêm
              mới</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <button type="button" class="btn btn-info toggle_popup">Lọc gia sư</button>

    <section class="section">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Danh sách gia sư</h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Họ tên</th>
                    <th scope="col">Năm sinh</th>
                    <th scope="col">Môn dạy</th>
                    <th scope="col">Khu vực dạy</th>
                    <th scope="col">Trạng thái hồ sơ</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($tutors as $tutor)
                    <tr>
                      <td scope="row">{{ $tutor->name }}</td>
                      <td>{{ $tutor->birth_year }}</td>
                      <td>
                        @foreach ($tutor->subjects as $item)
                          {{ $item->name . ', ' }}
                        @endforeach
                      </td>
                      <td>
                        @foreach ($tutor->districts as $item)
                          {{ $item->name . ', ' }}
                        @endforeach
                      </td>
                      <td>{{ $tutor->status->name }}</td>
                      <td>
                        <a href="{{ route('admin.tutors.edit', $tutor) }}" class="btn btn-warning">Sửa</a>
                        <a href="{{ route('admin.tutors.destroy', $tutor) }}" class="btn btn-danger show_confirm"
                          for="delete{{ $tutor->id }}">Xóa</a>
                      </td>
                      <form action="{{ route('admin.tutors.destroy', $tutor) }}" method="POST"
                        id="delete{{ $tutor->id }}">
                        @csrf
                        @method('DELETE')
                      </form>
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

    var btnFilter = $('button.toggle_popup');
    btnFilter.click(function(event) {
      $('.popup').toggle();
    })
  </script>
@endsection
