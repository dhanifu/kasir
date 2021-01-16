jQuery(function ($) {

    const table = $('table').DataTable({
        serverSide: true,
        processing: true,
        ajax: {
            url: ajaxUrl,
            type: 'post',
            data: {
                _token: csrf
            }
        },
        columns: [
            { data: 'DT_RowIndex' },
            { data: 'invoice' },
            { data: 'money' },
            { data: 'date' },
            { data: 'user.name' },
            {
                data: 'action',
                orderable: false,
                searchable: false
            }
        ],
    })

    const reload = () => table.ajax.reload()

    const reloadTable = document.getElementById('reloadTable')
    reloadTable.addEventListener('click', function () {
        reload()
    })

    const success = msg => {
        const alert = $('#alert')
        const modal = $('.modal')

        alert.html(`<div class="alert alert-success alert-dismissible">
			${msg}
			<button class="close" data-dismiss="alert">&times;</button>
		</div>`)

        modal.modal('hide')
        reload()
    }

    const remove = id => {
        if (confirm('Hapus data ini?')) {
            const url = deleteUrl.replace(':id', id)

            $.ajax({
                url: url,
                type: 'post',
                data: {
                    _token: csrf,
                    _method: 'DELETE'
                },
                success: res => success(res.success)
            })
        }
    }

    $('tbody').on('click', 'button', function () {
        const data = table.row($(this).parents('tr')).data()

        remove(data.id)
    })

})