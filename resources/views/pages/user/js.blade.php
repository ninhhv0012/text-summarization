<script>

    let search_table = null;
    let filter_table = null;
    var dt = $("#kt_customers_table").DataTable({
        searchDelay: 500,
        processing: true,
        serverSide: true,
        ordering: false,
        ajax: {
            url: "{{ route('users.show', '') }}" + "/get-datatable",
            data: function(d) {
                d.search_table = search_table
                d.filter_table = filter_table

            }
        },
        columns: [{
                data: null
            },
            {
                data: 'name'
            },
            {
                data: 'email'
            },
            {
                data: 'isAdmin'
            },
            {
                data: 'id'
            },
        ],
        columnDefs: [{
                targets: 0,
                orderable: false,
                searchable: false,
                className: 'text-center',
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                },

            },
            {
                targets: 1,
                orderable: true,
                searchable: true,
                className: 'text-center',
                render: function(data, type, row) {
                    return data;
                },
            },
            {
                targets: 2,
                orderable: true,
                className: 'text-center',
                render: function(data, type, row) {
                    return data;
                },
            },
            {
                targets: 3,
                searchable: false  ,
                orderable: true,
                className: 'text-center',
                render: function(data, type, row) {
                    return data == 1 ? 'Admin' : 'Employee';

                },
            },

            {
                targets: 4,
                orderable: false,
                searchable: false,
                className: 'text-center',
                render: function(data, type, row) {
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
                        '<!--begin::Menu-->' +
                        '<!--begin::Menu-->' +
                        ' <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">' +
                        ' <!--begin::Menu item-->' +
                        '  <div class="menu-item px-3">' +
                        '<span name="btn-edit" class="menu-link px-3" data-data=\'' + JSON.stringify(
                            row) +
                        '\'>' +
                        '   Edit' +
                        ' </span>' +
                        '</div>' +
                        '<!--end::Menu item-->' +

                        '  <!--begin::Menu item-->' +
                        '<div class="menu-item px-3">' +
                        '  <span href="#" class="menu-link px-3" name="btn-delete" data-id="' + row.id + '">' +
                        '  Delete' +
                        ' </span>' +
                        '</div>' +
                        ' <!--end::Menu item-->' +
                        ' </div>' +
                        '<!--end::Menu-->';
                },
            },

        ],
    });

    dt.on('draw', function() {
        KTMenu.createInstances();
    });

    $("#add_modal").on('click', function() {
        form_reset();
        $('.show_password').attr('type', 'password');
        $('.password').show();
        let form = $('#kt_modal_add_customer_form');
        form.find('input[name=id]').val('');
        $('#kt_modal_add_customer_form h2').text('Add user');
        $("#kt_modal_add_customer").modal('show');
    });

    //Modal edit
    $(document).on('click', 'span[name=btn-edit]', function() {
        form_reset();
        let data = $(this).data('data');

        $('#kt_modal_add_customer_form h2').text('Edit user');
        let form = $('#kt_modal_add_customer_form');
        form.find('input[name=id]').val(data.id);
        form.find('input[name=name]').val(data.name);
        form.find('input[name=email]').val(data.email);
        form.find('select[name=isAdmin]').val(data.isAdmin);
        $('.password').hide();

        $('#kt_modal_add_customer').modal('show');
    });
    $("#kt_modal_add_customer_form").on("submit", function(e) {
        $('#kt_modal_add_customer_submit').attr("disabled","disabled")
        e.preventDefault();
        let data = $(this).serialize();
        type = 'POST',
        url = '{{ route('users.store') }}';
        id = $('#kt_modal_add_customer_form input[name=id]').val();
        if (parseInt(id)) {
            type = 'PUT';
            url = '{{ route('users.update', '') }}' + '/' + id;
        }

        $.ajax({
            url: url,
            method: type,
            data: data,
            success: function(data) {
                setTimeout(function() {
                    $('#kt_modal_add_customer_submit').removeAttr("disabled");
                }, 100)
                notification(data.type, data.title, data.content);
                if (data.type === "success") {
                    dt.ajax.reload(null, false);
                    $('#kt_modal_add_customer').modal('hide');

                }
        },

        error: function(data) {
            let errors = data.responseJSON.errors;
            $.each(errors, function(key, value) {
                notification('error', 'Error', value);
            });


          // notification(data.type, data.title, data.content);



        },
        complete: function() {
            // $('#kt_modal_add_modal_submit').attr("data-kt-indicator", "off");

            setTimeout(function() {
                    $('#kt_modal_add_customer_submit').removeAttr("disabled");
                }, 100)
        }
        });
    });


    $('#kt_modal_add_customer_close').on('click', function() {
        form_reset();
        $("#kt_modal_add_customer").modal('hide');
    });
    $(' #kt_modal_add_customer_cancel').on('click', function() {
        $('.show_password').attr('type', 'password');
        form_reset()
    });


    function form_reset() {
        $("#kt_modal_add_customer").modal({
            'backdrop': 'static',
            'keyboard': false
        });
        $("#kt_modal_add_customer_form").trigger("reset");
    }
    $(document).on('click', 'span[name=btn-delete]', function () {
        let id = $(this).data('id');

        Swal.fire({
            text: "Are you sure you want to delete this user?",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Yes, delete!",
            cancelButtonText: "No, cancel",
            customClass: {
                confirmButton: "btn fw-bold btn-danger",
                cancelButton: "btn fw-bold btn-active-light-primary"
            }
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url : '{{ route('users.destroy',"") }}/' + id,
                    type: 'DELETE',
                    dataType: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function (data) {
                        notification(data.type, data.title, data.content);
                        dt.ajax.reload(null, false);
                    },
                    error: function (data) {
                        notification('warning', 'Warning!', 'Have trouble, try again later.');
                    }
                });
            }
        });
    });
    // Search
    $("#search_table").on('change', function() {
        let data = $(this).val();
        search_table = data;
        console.log(search_table);

        dt.ajax.reload();
    })
    $(".btn-showfilter").on('click',function (e){
        e.preventDefault();
        $("modal-filter").show();

    })

    // filter
    $(".btn-showfilter").on('click',function (e){
        e.preventDefault();
        $("modal-filter").show();

    })
    $(".btn-filter").on('click', function(e) {
        e.preventDefault();

        let data_activation = $("#filter_table").val();
        // console.log(data);
        filter_table = data_activation;

    
        console.log(filter_table);

        dt.ajax.reload();
    })

    $(".btn-reset").on('click', function (e) {
        e.preventDefault();
        $("#filter_form").trigger('reset');


        dt.ajax.reload();
    })
</script>
