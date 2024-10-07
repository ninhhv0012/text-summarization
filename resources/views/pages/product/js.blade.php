<script>
    // Private functions

    var dt = $("#kt_customers_table").DataTable({
        serverSide: true,
        processing: true,
        // order: [[ 4, "desc" ]],
        ordering: false,
        ajax: {
            url: "{{ route('product.show', 'get-list') }}",
            type: 'GET'
        },
        columns: [
            // {
            //     data: 'id',
            //     orderable: false,
            //     // searchable: false,
            //     render: function(data, type, row, meta) {
            //         return '<div class="form-check form-check-sm form-check-custom form-check-solid">\n' +
            //             '<input class="form-check-input" id="check" type="checkbox" value="' + data +
            //             '"/>\n' +
            //             '</div>';
            //     }
            // },
            {
                data: null,
                orderable: false,
                searchable: false,
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                },
            },
            {
                data: 'order.name',
                orderable: false,
                searchable: false,
                render: function(data, type, row, meta) {
                    if (data == null) {
                        return '';
                    }
                    return data;
                },
            },
            {
                data: 'name',
                className: 'text-center',
                orderable: true,
                render: function(data, type, row, meta) {
                    return data;
                }
            },
            {
                data: 'color',
                className: 'text-center',
                render: function(data, type, row, meta) {
                    return data;
                }
            },
            {
                data: 'size',
                className: 'text-center',
                render: function(data, type, row, meta) {
                    return data;
                }
            },
            {
                data: 'quantity',
                className: 'text-center',
                render: function(data, type, row, meta) {
                    return data;
                }
            },
            {
                data: null,
                className: 'text-end',
                searchable: false,
                render: function(data, type, row, meta) {
                    return '<a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">' +
                        'Actions' +
                        '<span class="svg-icon svg-icon-5 m-0">' +
                        '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">' +
                        ' <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">' +
                        '<polygon points="0 0 24 0 24 24 0 24"></polygon>' +
                        '<path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>' +
                        '</g>' +
                        '</svg>' +
                        '</span>' +
                        ' </a>' +
                        ' <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">' +
                        '  <div class="menu-item px-3">' +
                        '<span class="menu-link px-3 btn-edit" data-data=\'' + JSON.stringify(row) +
                        '\'>' +
                        '   Edit' +
                        ' </span>' +
                        '</div>' +
                        '<div class="menu-item px-3">' +
                        '  <span href="#" class="menu-link px-3 btn-delete" data-id="' + row.id + '">' +
                        '  Delete' +
                        ' </span>' +
                        '</div>' +
                        ' </div>';

                }
            }
        ],
    });

    dt.on('draw', function() {
        KTMenu.createInstances();
    });
    $('#kt_modal_add_customer_close').on('click', function() {
        $('#kt_modal_add_customer').modal('hide');
    });
    $(' #kt_modal_add_customer_cancel').on('click', function() {
        form_reset();
    });

    function form_reset() {
        $("#kt_modal_add_customer").modal({
            'backdrop': 'static',
            'keyboard': false
        });
        $("#kt_modal_add_customer_form").trigger("reset");
    }
    //button-add
    $(document).on('click', '.btn-add', function(e) {
        e.preventDefault();
        form_reset();
        let modal = $('#kt_modal_add_customer_form');
        modal.find('.modal-title').text('Add product');
        modal.find("input[name='id']").val('');
        modal.trigger('reset');
        $('#kt_modal_add_customer').modal('show');
    });

    //button-edit
    $(document).on('click', '.btn-edit', function(e) {
        console.log('edit');
        e.preventDefault();
        form_reset();
        let data = $(this).data('data');
        let modal = $('#kt_modal_add_customer_form');
        modal.find('.modal-title').text('Edit Product');
        modal.find("input[name='id']").val(data.id);
        modal.find("input[name='name']").val(data.name);
        modal.find("input[name='price']").val(data.price);
        $('#kt_modal_add_customer').modal('show');
    });

    //button-submit
    $('#kt_modal_add_customer_form').on('submit', function(e) {
        $('#kt_modal_add_customer_submit').attr("disabled", "disabled")
        e.preventDefault();
        let data = $(this).serialize(),
            type = 'POST',
            url = "{{ route('product.store') }}",
            id = $("form#kt_modal_add_customer_form input[name='id']").val();
        if (parseInt(id)) {
            type = 'PUT';
            url = url + '/' + id;
        }
        $.ajax({
            url: url,
            type: type,
            data: data,
            success: function(data) {
                $('#kt_modal_add_customer_submit').attr('data-kt-indicator', 'off');
                setTimeout(function() {
                    $('#kt_modal_add_customer_submit').removeAttr("disabled");
                }, 100)
                notification(data.type, data.title, data.content);
                if (data.type == 'success') {
                    dt.ajax.reload(null, true);
                    $('#kt_modal_add_customer_form').trigger('reset');
                    $('#kt_modal_add_customer').modal('hide');
                }
            },
            error: function(data) {
                $('.alert-danger').html('');
                $.each(data.responseJSON.errors, function(key, value) {
                    $('.alert-danger').show();
                    $('.alert-danger').append('<strong><li>' + value + '</li></strong>');
                });
            }
        });
    });

    //button-delete
    $(document).on('click', '.btn-delete', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        Swal.fire({
            text: "Are you sure you want to delete this product ?",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Yes, delete!",
            cancelButtonText: "No, cancel",
            customClass: {
                confirmButton: "btn fw-bold btn-danger",
                cancelButton: "btn fw-bold btn-active-light-primary",
            }
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: "{{ route('product.destroy', '') }}" + '/' + id,
                    type: 'DELETE',
                    success: function(data) {
                        notification(data.type, data.title, data.content);
                        if (data.type == 'success') {
                            dt.ajax.reload(null, false);
                        }
                    },
                    error: function(data) {
                        console.log('error');
                    }
                });
            }
        });
    });

    // search
    const filterSearch = document.querySelector('[data-kt-customer-table-filter="search"]');
    filterSearch.addEventListener('keyup', function(e) {
        dt.search(e.target.value).draw();
    });

    function AddReadMore(data) {
        var carLmt = 50;
        var readMoreTxt = " ...Read more";
        var readLessTxt = " Read less";
        if (data.length > carLmt) {
            var firstSet = data.substring(0, carLmt);
            var secdHalf = data.substring(carLmt, data.length);
            return "<p class='add-read-more show-less-content'>" + firstSet + "<span class='second-section'>" +
                secdHalf + "</span><span class='read-more text-dark column-beaty'  title='Click to Show More'>" +
                readMoreTxt +
                "</span><span class='read-less text-dark column-beaty' title='Click to Show Less'>" + readLessTxt +
                "</span></p>";
        }
        return "<p class='add-read-more column-beaty'>" + data + "</p>";
    }
    $(document).on("click", ".read-more,.read-less", function() {
        $(this).closest(".add-read-more").toggleClass("show-less-content show-more-content");
    });
    // // Toggle delete selected toolbar
    // var toggleToolbars = function() {
    //     // Define variables
    //     const container = document.querySelector('#kt_customers_table');
    //     const toolbarBase = document.querySelector('[data-kt-customer-table-toolbar="base"]');
    //     const toolbarSelected = document.querySelector('[data-kt-customer-table-toolbar="selected"]');
    //     const selectedCount = document.querySelector('[data-kt-customer-table-select="selected_count"]');

    //     // Select refreshed checkbox DOM elements
    //     const allCheckboxes = container.querySelectorAll('tbody [type="checkbox"]');

    //     // Detect checkboxes state & count
    //     let checkedState = false;
    //     let count = 0;

    //     // Count checked boxes
    //     allCheckboxes.forEach(c => {
    //         if (c.checked) {
    //             checkedState = true;
    //             count++;
    //         }
    //     });

    //     // Toggle toolbars
    //     if (checkedState) {
    //         selectedCount.innerHTML = count;
    //         toolbarBase.classList.add('d-none');
    //         toolbarSelected.classList.remove('d-none');
    //     } else {
    //         toolbarBase.classList.remove('d-none');
    //         toolbarSelected.classList.add('d-none');
    //     }
    // }

    // // Delete selected rows
    // const container = document.querySelector('#kt_customers_table');
    // const checkboxes = container.querySelectorAll('[type="checkbox"]');

    // // Select elements
    // const deleteSelected = document.querySelector('[data-kt-customer-table-select="delete_selected"]');
    // checkboxes.forEach(c => {
    //     // Checkbox on click event
    //     c.addEventListener('click', function() {
    //         // c.preventDefault();
    //         setTimeout(function() {
    //             toggleToolbars();
    //         }, 50);
    //     });
    // });
</script>
