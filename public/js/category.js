jQuery(function ($) {

    const table = $('.table').DataTable({
        serverSide: true,
        processing: true,
        ajax: {
            url: ajaxUrl,
            type: 'post',
            data: {
                _token: csrf
            }, error: response => {
                console.log(response);
            }
        },
        columns: [
            { data: 'DT_RowIndex' },
            { data: 'name' },
            {
                data: 'action',
                orderable: false,
                searchable: false
            }
        ],
        lengthMenu: [[5, 10, 50, -1], [5, 10, 50, 'All']]
    })

})