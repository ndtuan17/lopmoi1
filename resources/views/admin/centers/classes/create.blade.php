@extends('layouts.admin')

@section('main')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>{{ $center->name }}</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.centers.classes.index', $center) }}">Danh sách</a></li>
          <li class="breadcrumb-item active"><a class="active"
              href="{{ route('admin.centers.classes.create', $center) }}">Thêm
              mới</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section">
      <div class="row justify-content-center">
        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Thêm lớp mới</h5>

              <!-- General Form Elements -->
              <form method="POST" action="{{ route('admin.centers.classes.store', $center) }}">
                @csrf

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Môn học</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="subject_id">
                      <option value="">Chọn môn</option>
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
                  <label class="col-sm-2 col-form-label">Lớp</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="grade_id">
                      <option value="">Chọn lớp</option>
                      @foreach ($grades as $grade)
                        <option value="{{ $grade->id }}" {{ old('grade_id') == $grade->id ? 'selected' : '' }}>
                          {{ $grade->name }}</option>
                      @endforeach
                    </select>
                    @error('grade_id')
                      <p>{{ $message }}</p>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Giới tính học sinh</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="student_gender_id">
                      <option value="">Giới tính học sinh</option>
                      @foreach ($student_genders as $student_gender)
                        <option value="{{ $student_gender->id }}"
                          {{ old('student_gender_id') == $student_gender->id ? 'selected' : '' }}>
                          {{ $student_gender->name }}</option>
                      @endforeach
                    </select>
                    @error('student_gender_id')
                      <p>{{ $message }}</p>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Học lực</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="student_level_id">
                      <option value="">---------</option>
                      @foreach ($student_levels as $student_level)
                        <option value="{{ $student_level->id }}"
                          {{ old('student_level_id') == $student_level->id ? 'selected' : '' }}>
                          {{ $student_level->name }}</option>
                      @endforeach
                    </select>
                    @error('student_level_id')
                      <p>{{ $message }}</p>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Học lực chi tiết</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 158px;" name="student_level_detail">{{ old('student_level_detail') }}</textarea>
                    @error('student_level_detail')
                      <p>{{ $message }}</p>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Quận/Huyện</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="district_id">
                      <option value="">---------</option>
                      @foreach ($districts as $district)
                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Xã/Phường/Thị trấn</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="commune_id">
                      <option value="">---------</option>
                    </select>
                    @error('commune_id')
                      <p>{{ $message }}</p>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Địa chỉ chi tiết</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 158px;" name="address">{{ old('address') }}</textarea>
                    @error('address')
                      <p>{{ $message }}</p>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Số buổi/tuần</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" min="0" max="30" name="shift"
                      value="{{ old('shift') }}">
                  </div>
                </div>

                <div class="input-group mb-3">
                  <label for="" class="col-sm-2 col-form-label">Tiền lương/buổi</label>
                  <div class="col-sm-10">
                    <div class="input-group">
                      <span class="input-group-text">$</span>
                      <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)"
                        name="salary" value="{{ old('salary') }}">
                      <span class="input-group-text">000 VNĐ</span>
                    </div>
                  </div>
                </div>

                <div class="input-group mb-3">
                  <label for="" class="col-sm-2 col-form-label">Phí nhận lớp</label>
                  <div class="col-sm-10">
                    <div class="input-group">
                      <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)"
                        min="0" max="100" name="fee_percent"
                        value="{{ old('fee_percent') ?? ($center->fee_percent ?? null) }}">
                      <span class="input-group-text">%</span>
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Thông tin thêm</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 158px;" name="class_detail">{{ old('class_detail') }}</textarea>
                    @error('class_detail')
                      <p>{{ $message }}</p>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Yêu cầu gia sư</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="tutor_type_id">
                      <option value="">---------</option>
                      @foreach ($tutor_types as $tutor_type)
                        <option value="{{ $tutor_type->id }}"
                          {{ old('tutor_type_id') == $tutor_type->id ? 'selected' : '' }}>{{ $tutor_type->name }}
                        </option>
                      @endforeach
                    </select>
                    @error('tutor_type_id')
                      <p>{{ $message }}</p>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Giới tính gia sư</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="tutor_gender_id">
                      <option value="">---------</option>
                      @foreach ($tutor_genders as $tutor_gender)
                        <option value="{{ $tutor_gender->id }}"
                          {{ old('tutor_gender_id') == $student_level->id ? 'selected' : '' }}>{{ $tutor_gender->name }}
                        </option>
                      @endforeach
                    </select>
                    @error('tutor_gender_id')
                      <p>{{ $message }}</p>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Yêu cầu khác</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 158px;" name="tutor_detail">{{ old('tutor_detail') }}</textarea>
                    @error('tutor_detail')
                      <p>{{ $message }}</p>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Link nguồn</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="source_link"
                      value="{{ old('source_link') ?? ($center->url_show_classes ?? null) }}">
                    @error('source_link')
                      <p>{{ $message }}</p>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Mã lớp</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="code" value="{{ old('code') }}">
                    @error('code')
                      <p>{{ $message }}</p>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
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
    var url = "{{ url('/showCommunesInDistrict') }}";
    $("select[name='district_id']").change(function() {
      var district_id = $(this).val();
      var token = $("input[name='_token']").val();
      $.ajax({
        url: url,
        method: 'POST',
        data: {
          district_id: district_id,
          _token: token
        },
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
