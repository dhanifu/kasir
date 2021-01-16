jQuery(function ($) {

    const table = $('table').DataTable({
        serverSide: true,
        processing: true,
        ajax: {
            url: ajaxUrl,
            type: 'post',
            data: {
                _token: csrf,
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

    const reload = () => table.ajax.reload()

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

    const edit = ({ id, name, code, price, category }) => {
        const modal = $('.modal')
        const form = modal.find('form')[0]
        const url = updateUrl.replace(':id', id)

        reset(form)
        form.action = url

        modal.find('[name=id]').val(id)
        modal.find('[name=code]').val(code)
        modal.find('[name=name]').val(name)
        modal.find('[name=price]').val(price)
        modal.find('[name=category_id]').append(`<option value='${category.id}' selected>${category.name}</option>`)

        modal.modal('show')
    }

    const remove = id => {
        if (confirm("Yakin akan menghapus ini?")) {
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

    $('[name=price]').on('keyup', function () {
        const number = Number(this.value.replace(/\D/g, ''))
        const price = new Intl.NumberFormat().format(number)

        this.value = price
    })

    $('[name=category_id]').select2({
        placeholder: 'Kategori',
        ajax: {
            url: categoryUrl,
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