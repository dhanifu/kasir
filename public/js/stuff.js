jQuery(function ($) {

    const table = $('table').DataTable({
        serverSide: true,
        processing: true,
        ajax: {
            url: ajaxUrl,
            type: 'post',
            data: {
                _token: csrf,
            }, error: res => {
                console.log(res)
            }
        },
        columns: [
            { data: 'DT_RowIndex' },
            { data: 'barcode' },
            { data: 'code' },
            { data: 'name' },
            { data: 'stock' },
            { data: 'price' },
            {
                data: 'action',
                orderable: false,
                searchable: false
            }
        ]
    })

})