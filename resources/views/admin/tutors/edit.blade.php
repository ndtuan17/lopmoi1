@extends('layouts.admin')

@section('main')
  <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.tutors.index') }}">Danh sách</a></li>
          <li class="breadcrumb-item active"><a class="active" href="{{ route('admin.tutors.create') }}">Thêm
              mới</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section">
      <div class="row justify-content-center">
        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Sửa thông tin gia sư</h5>

              <!-- General Form Elements -->
              <form method="POST" action="{{ route('admin.tutors.update', $tutor) }}">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Họ và tên</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="{{ old('name') ?? $tutor->name }}">
                    @error('name')
                      <p>{{ $message }}</p>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Năm sinh</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" min="1950" max="2010" name="birth_year"
                      value="{{ old('birth_year') ?? $tutor->birth_year }}">
                    @error('birth_year')
                      <p>{{ $message }}</p>
                    @enderror
                  </div>
                </div>

                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Giới tính</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" id="gender_male" value="male"
                        {{ $tutor->gender === 'male' ? 'checked' : '' }}>
                      <label class="form-check-label" for="gender_male">
                        Nam
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" id="gender_female" value="female"
                        {{ $tutor->gender === 'female' ? 'checked' : '' }}>
                      <label class="form-check-label" for="gender_female">
                        Nữ
                      </label>
                    </div>
                  </div>
                </fieldset>

                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Giới thiệu</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 158px;" name="description">{{ old('description') ?? $tutor->description }}</textarea>
                    @error('description')
                      <p>{{ $message }}</p>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Môn có thể dạy</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="subject_ids[]" multiple>
                      @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}" {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                          {{ $subject->name }}</option>
                      @endforeach
                    </select>
                    @error('subject_id')
                      <p>{{ $message }}</p>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Khu vực dạy</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="district_ids[]" multiple>
                      @foreach ($districts as $district)
                        <option value="{{ $district->id }}" {{ old('district_id') == $district->id ? 'selected' : '' }}>
                          {{ $district->name }}</option>
                      @endforeach
                    </select>
                    @error('district_id')
                      <p>{{ $message }}</p>
                    @enderror
                  </div>
                </div>

                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Trạng thái hồ sơ</legend>
                  <div class="col-sm-10">
                    @foreach ($states as $item)
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="status_id" id="status_{{ $item->id }}"
                          value="{{ $item->id }}">
                        <label for="status_{{ $item->id }}">{{ $item->name }}</label>
                      </div>
                    @endforeach
                  </div>
                </fieldset>

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

  <script>
    $("select[name='district_id']").change(function() {
      var district_id = $(this).val();
      var url = "{{ route('api.districts.communes.index', ':district_id') }}"
      url = url.replace(':district_id', district_id);
      // var token = $("input[name='_token']").val();
      $.ajax({
        url: url,
        method: 'POST',
        // data: {
        //   // district_id: district_id,
        //   // _token: token
        // },
        success: function(data) {
          $("select[name='commune_id']").html('');
          $.each(data, function(key, value) {
            $("select[name='commune_id']").append(
              "<option value=" + value.id + ">" + value.name + "</option>"
            )
          })
        }
      })
    })
  </script>
@endsection
