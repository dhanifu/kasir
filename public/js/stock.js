jQuery(function ($) {

    const table = $('table').DataTable({
        serverSide: true,
        processing: true,
        ajax: {
            url: ajaxUrl,
            type: 'post',
            data: { _token: csrf },
            error: res => {
                console.log(res)
            }
        },
        columns: [
            { data: 'DT_RowIndex' },
            { data: 'stuff.name' },
            { data: 'type' },
            { data: 'total' },
            { data: 'date' },
            {
                data: 'action',
                orderable: false,
                searchable: false
            }
        ],
        lengthMenu: [[5, 10, 50, -1], [5, 10, 50, 'All']]
    })

    const reload = () => table.ajax.reload()

    const success = msg => {
        const alert = $('#alert')
        const modal = $('.modal')

        alert.html(`
            <div class="alert alert-success alert-dismissable">
                ${msg}
                <button class="close" data-dismiss="alert">&times;</button>
            </div>
        `)

        modal.modal('hide')
        reload()
    }

    const error = (errors, form) => {
        $.each(errors, (name, msg) => {
            const input = $(form).find(`[name=${name}]`)
            input.addClass('is-invalid')
            input.next('.invalid-feedback').html(msg)
        })
    }

    const reset = form => {
        const inputs = $(form).find('.is-invalid')

        $.each(inputs, (key, input) => {
            $(input).removeClass('is-invalid')
        })

        form.reset()
    }

    const remove = id => {
        if (confirm("Yakin untuk menghapus data ini?")) {
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
        const id = table.row($(this).parents('tr')).data().id
        remove(id)
    })

    $('[name=stuff_id]').select2({
        placeholder: 'Barang',
        ajax: {
            url: stuffUrl,
            type: 'post',
            data: params => ({
                name: params.term,
                _token: csrf
            }),
            processResults: res => ({
                results: res
            }),
            cache: true
        }
    })

    $('form').submit(function (e) {
        e.preventDefault()

        $.ajax({
            url: this.action,
            method: this.method,
            data: $(this).serialize(),
            success: res => {
                success(res.success)
                reset(this)
            },
            error: err => {
                const errors = err.responseJSON.errors
                error(errors, this)
            }
        })
    })

})