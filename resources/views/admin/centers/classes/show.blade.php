@extends('layouts.admin')

@section('main')
  <main id="main" class="main">
    @if (session('message'))
      <h1>{{ session('message') }}</h1>
    @endif

    <div class="pagetitle">
      <h1>Mã lớp: {{ $class->code }}</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.centers.classes.index', $center) }}">Trở lại</a></li>
          <li class="breadcrumb-item active"><a class="active"
              href="{{ route('admin.centers.classes.create', $center) }}">Copy</a>
          </li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section">
      <div class="row justify-content-center">
        <div class="col-xl-10">

          <div class="card">
            <div class="card-body pt-3">
              {{-- <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">

                <li class="nav-item" role="presentation">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview"
                    aria-selected="true" role="tab">Thông tin chi tiết</button>
                </li>

              </ul>
              <div class="tab-content pt-2"> --}}

              {{-- <div class="tab-pane fade profile-overview active show" id="profile-overview" role="tabpanel"> --}}
              {{-- <h5 class="card-title">About</h5>
              <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus.
                Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet
                perspiciatis odit. Fuga sequi sed ea saepe at unde.</p> --}}

              <h5 class="card-title">Thông tin chi tiết lớp dạy</h5>

              <div class="row mt-3">
                <div class="col-lg-2 col-md-4 label ">Trung tâm</div>
                <div class="col-lg-10 col-md-8">{{ $class->center->name }}</div>
              </div>

              <div class="row mt-3">
                <div class="col-lg-2 col-md-4 label ">Môn</div>
                <div class="col-lg-10 col-md-8">
                  @foreach ($class->subjects as $item)
                    {{ $item->name . ', ' }}
                  @endforeach
                </div>
              </div>

              <div class="row mt-3">
                <div class="col-lg-2 col-md-4 label ">Khối lớp</div>
                <div class="col-lg-10 col-md-8">{{ $class->grade->name }}</div>
              </div>

              <div class="row mt-3">
                <div class="col-lg-2 col-md-4 label ">Giới tính học sinh</div>
                <div class="col-lg-10 col-md-8">{{ $class->student_gender->name }}</div>
              </div>

              <div class="row mt-3">
                <div class="col-lg-2 col-md-4 label ">Học lực</div>
                <div class="col-lg-10 col-md-8">{{ $class->student_level->name }}</div>
              </div>

              <div class="row mt-3">
                <div class="col-lg-2 col-md-4 label ">Học lực chi tiết</div>
                <div class="col-lg-10 col-md-8">{{ $class->student_level_detail }}</div>
              </div>

              <div class="row mt-3">
                <div class="col-lg-2 col-md-4 label ">Địa chỉ</div>
                <div class="col-lg-10 col-md-8">
                  {{ $class->commune->name . ', ' . $class->commune->district->name . ' (' . $class->address . ')' }}
                </div>
              </div>

              <div class="row mt-3">
                <div class="col-lg-2 col-md-4 label ">Số buổi học/tuần</div>
                <div class="col-lg-10 col-md-8">{{ $class->shift }}</div>
              </div>

              <div class="row mt-3">
                <div class="col-lg-2 col-md-4 label ">Lương 1 buổi</div>
                <div class="col-lg-10 col-md-8">{{ $class->salary . ',000 VNĐ' }}</div>
              </div>

              <div class="row mt-3">
                <div class="col-lg-2 col-md-4 label ">Phí nhận lớp</div>
                <div class="col-lg-10 col-md-8">
                  {{ $class->fee_percent . '%  =  ' . ($class->fee_percent * $class->salary * $class->shift * 4) / 100 . ',000 VNĐ' }}
                </div>
              </div>

              <div class="row mt-3">
                <div class="col-lg-2 col-md-4 label ">Thông tin thêm</div>
                <div class="col-lg-10 col-md-8">{{ $class->class_detail }}</div>
              </div>

              <div class="row mt-3">
                <div class="col-lg-2 col-md-4 label ">Yêu cầu</div>
                <div class="col-lg-10 col-md-8">{{ $class->tutor_type->name }}</div>
              </div>

              <div class="row mt-3">
                <div class="col-lg-2 col-md-4 label ">Giới tính gia sư</div>
                <div class="col-lg-10 col-md-8">{{ $class->tutor_gender->name }}</div>
              </div>

              <div class="row mt-3">
                <div class="col-lg-2 col-md-4 label ">Yêu cầu khác</div>
                <div class="col-lg-10 col-md-8">{{ $class->tutor_detail }}</div>
              </div>

              <div class="row mt-3">
                <div class="col-lg-2 col-md-4 label ">Nguồn</div>
                <div class="col-lg-10 col-md-8"><a href="{{ $class->source_link }}"
                    target="_blank">{{ $class->source_link }}</a></div>
              </div>

              <div class="row mt-3">
                <div class="col-lg-2 col-md-4 label ">Mã lớp</div>
                <div class="col-lg-10 col-md-8">{{ $class->code }}</div>
              </div>

              {{-- </div> --}}

              {{-- </div><!-- End Bordered Tabs --> --}}

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection
