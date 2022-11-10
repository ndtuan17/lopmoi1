function submitForm(id) {
    var form = document.querySelector('#' + id);
    form.submit();
}
console.log('in tnd js');

$(document).ready(function () {
    //init-source
    $('select[init-data]').each(function (index, select) {
        var url = $(select).attr('init-data');
        $.ajax({
            url: url,
            method: 'POST',
            success: function (data) {
                $(select).html(
                    '<option></option>'
                );
                $.each(data, function (key, value) {
                    $(select).append(
                        '<option value="' + value.id + '">' + value.name + '</option>'
                    )
                })
            }
        })
    })


    //depend-source
    $('select[depend]').each(function (index, select) {

        var depend_id = $(select).attr('depend');

        // updateDownSelect($(select), $('#' + depend_id));
        // $('#' + depend_id).change(updateDownSelect($(select), $('#' + depend_id)));
        $('#' + depend_id).change(function () {
            var value_depend = $(this).val();
            var url = $(select).attr('source');
            url = url.replace(':' + $(select).attr('holder'), value_depend)
            $.ajax({
                url: url,
                method: 'POST',
                success: function (data) {
                    $(select).html('');
                    $.each(data, function (key, value) {
                        $(select).append(
                            '<option value="' + value.id + '">' + value.name + '</option>'
                        )
                    })
                }
            })
        })
    })

    //div-has-init-data
    $('div[init-data]').each(function (index, div) {
        div = $(div);
        div.html('');
        var url = div.attr('init-data');
        console.log(url);
        $.ajax({
            url: url,
            method: 'POST',
            success: function (data) {
                $.each(data, function (key, value) {
                    div.append(
                        '<div class="form-check form-check-inline">' +
                        '<input class="form-check-input" type="checkbox" id="abc' + key + '" value="' + value.id + '">' +
                        '<label class="form-check-label" for="abc' + key + '">' + value.name + '</label>' +
                        '</div>'
                    )
                })
            }
        })
    })
})

// function updateDownSelect(downSelect, upSelect) {
//     console.log(downSelect);
//     console.log(upSelect);
//     var value_depend = upSelect.val();
//     var url = downSelect.attr('source');
//     url = url.replace(':' + downSelect.attr('holder'), value_depend);
//     $.ajax({
//         url: url,
//         method: 'POST',
//         success: function (data) {
//             downSelect.html('');
//             $.each(data, function (key, value) {
//                 downSelect.append(
//                     '<option value="' + value.id + '">' + value.name + '</option>'
//                 )
//             })
//         }
//     })
// }