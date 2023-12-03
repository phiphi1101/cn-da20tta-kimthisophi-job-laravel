function removeRow(url, id) {
    if (confirm('Bạn có chắc chắn muốn xoá không?')) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            datatype: 'JSON',
            data: {
                id: id
            },
            url: url,
            success: function (res) {
                location.reload();
            }
        });
    }
}