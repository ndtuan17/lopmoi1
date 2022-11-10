@extends('layouts.min')

@section('body')
  <style>
    .select {
      width: 400px;
      height: 300px;
      border-radius: 4px;
      background-color: lightblue;
      overflow-y: auto;
    }

    .select .item {
      cursor: pointer;
      border-bottom: 1px solid lightgray;
    }
  </style>


  <div init-data="{{ route('api.districts.index') }}">
  </div>
  <div class="col-sm-4">
    <select class="form-select" init-data="{{ route('api.districts.index') }}" id="select_district"></select>
  </div>

  <br>

  <div class="col-sm-4">
    <select class="form-select" name="commune_id" depend="select_district" holder="district"
      source="{{ route('api.districts.communes.index', ':district') }}"></select>
  </div>

  <br>


  <script>
    // var url = "{{ url('/api/districts') }}";
    // $(document).ready(function() {
    //   var token = $("input[name='_token']").val();
    //   $.ajax({
    //     url: url,
    //     method: 'POST',
    //     data: {
    //       _token: token
    //     },
    //     success: function(data) {
    //       console.log(data);
    //       $.each(data, function(key, value) {
    //         $('.select').append(
    //           "<div class='item' value='" + value.id + "'>" + value.name + "</div>"
    //         )
    //       })

    //       $('.item').each(function(index, div) {
    //         $(div).click(function() {
    //           console.log($(div).attr('value'));
    //           if (!$(div).data('showChild')) {
    //             $(div).data('showChild', true)
    //           } else {
    //             $(div).data('showChild', false)
    //           }
    //           console.log($(div).data('showChild'));
    //           if ($(div).data('showChild')) {
    //             var district_id = $(div).attr('value');
    //             var url = "{{ route('api.districts.communes.index', ':district_id') }}"
    //             url = url.replace(':district_id', district_id);
    //             $.ajax({
    //               url: url,
    //               method: 'POST',
    //               success: function(data) {
    //                 $.each(data, function(key, value) {
    //                   $(div).append(
    //                     "<div class='item'>" + value.name + "</div>"
    //                   )
    //                 })
    //               }
    //             })
    //           }else{
    //             $(div).html('<div>thoi tam the nay</div>')
    //           }
    //         })
    //       })
    //     }
    //   })

    // })
  </script>
@endsection
