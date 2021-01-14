jQuery(function ($) {

    const table = $('table').DataTable({
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

    const reload = () => table.ajax.reload()

    const success = msg => {
        const alert = $('#alert')
        const modal = $('.modal')

        alert.html(`
            <div class="alert alert-success alert-dismissible">
                ${msg}
                <button class="close" data-dismiss="alert">&times;</button>
            </div>
        `)

        modal.modal('hide')
        reload()
    }

    const error = msg => {
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

    const edit = ({ id, name }) => {
        const modal = $('.modal')
        const form = modal.find('form')[0]
        const url = updateUrl.replace(':id', id)

        reset(form)
        form.action = url

        modal.find('[name=id]').val(id)
        modal.find('[name=name]').val(name)

        modal.modal('show')
    }

    const remove = id => {
        if (confirm('Yakin untuk mengahapus kategori ini?')) {
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
        const action = $(this).data('action')
        const data = table.row($(this).parents('tr')).data()

        switch (action) {
            case 'edit':
                edit(data)
                break
            case 'remove':
                remove(data.id)
                break
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