<script>
    let search_table = null;
    let filter_table = null;
    var dt = $("#kt_customers_table").DataTable({
        searchDelay: 500,
        processing: true,
        serverSide: true,
        ordering: false,
        ajax: {
            url: "{{ route('money.show', '') }}" + "/get-datatable",
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
                data: 'number'
            },
            {
                data: 'created_at'
            },
            {
                data: 'id'
            },
        ],
        columnDefs: [{
                targets: 0,
                className: 'text-center',
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                },

            },
            {
                targets: 1,
                className: 'text-center',
                render: function(data, type, row) {
                    return data;
                },
            },

            {
                targets: 2,
                className: 'text-center',
                render: function(data, type, row) {
                    return data;
                },
            },
            {
                targets: 3,
                className: 'text-center',
                render: function(data, type, row) {
                    return data;
                },
            },

            {
                targets: 4,
                orderable: false,
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
                        '  <span href="#" class="menu-link px-3" name="btn-delete" data-id="' + row.id +
                        '">' +
                        '  Delete' +
                        ' </span>' +
                        '</div>' +
                        ' <!--end::Menu item-->' +
                        ' </div>' +
                        '<!--end::Menu-->';
                },
            },

        ]

    });

    dt.on('draw', function() {
        KTMenu.createInstances();
    });
    // Modal Description

    // dt.dataTable.ext.errMode = 'none';

    $("#add_modal").on('click', function() {

        form_reset();
        let form = $('#kt_modal_add_customer_form');

        $('#kt_modal_add_customer_form h2').text('Add a bill');
        $('#kt_modal_add_customer_cancel').show();
        $('#form_user').hide();
        $('#refresh').hide();
        $("#kt_modal_add_customer").modal('show');
    });

    //Modal edit



    $(document).on('click', 'span[name=btn-edit]', function() {
        form_reset();
        let data = $(this).data('data');

        $('#kt_modal_add_customer_form #text_img').text('Choose new image');
        $('#kt_modal_add_customer_form h2').text('Edit Design');
        let name = data.name;
        let description = data.description;
        $('#form_user').show();
        $('#id').val(data.id);
        $('#name').val(data.name);
        $('#description').val(data.description);
        $('#status').val(data.status);
        if (data.user_id != null) {
            let user_id = data.users.id;
            let name_user = data.users.name;
            $('#name_user').val(data.users.name);
            $('#user_id').val(data.users.id);
        }

        $('#blah').css('display', 'block');
        $('#blah').attr('src', '{{ route('image', '') }}/' + data.image);
        let image = data.image;
        if (data.image == null) {
            $('#blah').attr("src", "");
        }
        $('#refresh').show();
        $('#refresh').attr('data-name', name);
        $('#refresh').attr('data-description', description);
        $('#refresh').attr('data-image', image);
        $('#refresh').attr('data-user-id', user_id);
        $('#refresh').attr('data-name-user', name_user);

        $('#kt_modal_add_customer_cancel').hide();

        $('#kt_modal_add_customer').modal('show');
    });
    $('#btn-clear-id').on('click', function() {
        $('#user_id').val('');
        $('#name_user').val('');
    });

    $("#kt_modal_add_customer_form").on("submit", function(e) {
        e.preventDefault();
        $('#kt_modal_add_customer_submit').attr("disabled","disabled")
        let data = $(this).serialize();
        type = 'POST',
        url = '{{route('money.store') }}';
        id = $('#kt_modal_add_customer_form input[name=id]').val();

        if (parseInt(id)) {
            type = 'PUT';
            url = '{{route('money.update', '') }}' + '/' + id;
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
                $("#spinner-div").hide();
                setTimeout(function() {
                    $('#kt_modal_add_customer_submit').removeAttr("disabled");
                }, 100)

            }
        }, 200);
    });


    $('#kt_modal_add_customer_close').on('click', function() {
        $('#show_des').hide();
        $('#kt_modal_add_customer_submit').prop('disabled', false);
        $('#blah').attr("src", "");
        $('.modal-footer').show();
        $('.modal-body').show();
        $('#kt_modal_add_customer_form').css('height', 'auto');
        form_reset();

        $("#kt_modal_add_customer").modal('hide');
    });
    $(' #kt_modal_add_customer_cancel').on('click', function() {
        $('#kt_modal_add_customer_submit').prop('disabled', false);
        if ($('#id').val() == '') {
            $('#blah').attr("src", "");
        }
        form_reset()
    });
    $(' #refresh').on('click', function() {
        $('#name').val($(this).attr("data-name"));
        $('#description').val($(this).attr("data-description"));
        $('#user_id').val($(this).attr("data-user-id"));
        $('#name_user').val($(this).attr("data-name-user"));
        $('#kt_modal_add_customer_submit').removeAttr("disabled");
        $('#image').val('');
        if ($(this).attr("data-image") == null) {
            $('#blah').attr("src", "");
        } else {
            $('#blah').attr("src", '{{ route('image', '') }}/' + $(this).attr("data-image"));
        }

    });

    function form_reset() {
        $("#kt_modal_add_customer").modal({
            'backdrop': 'static',
            'keyboard': true
        });

        $("#kt_modal_add_customer_form").trigger("reset");
    }
    $(document).on('click', 'span[name=btn-delete]', function() {
        let id = $(this).data('id');

        Swal.fire({
            text: "Are you sure you want to delete this Design?",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Yes, delete!",
            cancelButtonText: "No, cancel",
            customClass: {
                confirmButton: "btn fw-bold btn-danger",
                cancelButton: "btn fw-bold btn-active-light-primary"
            }
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: '{{ route('money.destroy', '') }}/' + id,
                    type: 'DELETE',
                    dataType: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        notification(data.type, data.title, data.content);
                        dt.ajax.reload(null, false);
                    },
                    error: function(data) {
                        notification('warning', 'Warning!',
                            'Have trouble, try again later.');
                    }
                });
            }
        });
    });
    // Take a new design
    $(document).on('click', 'span[name=btn-take]', function() {
        let id = $(this).data('id');

        Swal.fire({
            text: "Are you sure you want to take this design?",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Yes, Take!",
            cancelButtonText: "No, cancel",
            customClass: {
                confirmButton: "btn fw-bold btn-success",
                cancelButton: "btn fw-bold btn-active-light-primary"
            }
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: '{{ route('receive', ['','']) }}/'+ id + '/{{Auth::user()->id}}',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        notification(data.type, data.title, data.content);
                        dt.ajax.reload(null, false);
                    },
                    error: function(data) {
                        notification('warning', 'Warning!',
                            'Have trouble, try again later.');
                    }
                });
            }
        });
    });

    $("#search_table").on('change', function() {
        let data = $(this).val();
        search_table = data;
        dt.ajax.reload(null, false);
    })
    $("input[type='file']").on("change", function() {

        if ($('#image').get(0).files.length === 0) {
            $('#blah').attr("src", "");
            $('#kt_modal_add_customer_submit').prop('disabled', false);
        } else {

            var extension = $('#image').val().replace(/^.*\./, '');

            if (extension != 'jpg' && extension != 'png') {

                notification('error', 'Error', 'Please select image file');
                $('#kt_modal_add_customer_submit').prop('disabled', true);
                $('#blah').attr("src", "");
            } else {
                if (this.files[0].size > 20000000) {
                    notification('warning', 'Warning!', 'File size must be less than 20MB, Try again later.');
                    $('#blah').attr("src", "");
                    $('#kt_modal_add_customer_submit').prop('disabled', true);
                } else {

                    $('#blah').css('display', 'block');
                    $('#blah').attr("src", URL.createObjectURL(this.files[0]));
                    $('#kt_modal_add_customer_submit').prop('disabled', false);

                }
            }
        }
        if (($('#refresh').attr("data-image") != null) && ($('#image').val() == '')) {
            $('#blah').attr("src", '{{ route('image', '') }}/' + $('#refresh').attr("data-image"));
        }
    });
    // Show more/ Show less

    function AddReadMore(data) {
        // '<p class="add-read-more show-less-content">'  +      data + '</p>'
        var carLmt = 50;
        var readMoreTxt = " ...Read more";
        var readLessTxt = " Read less";
        if (data.length > carLmt) {
            var firstSet = data.substring(0, carLmt);
            var secdHalf = data.substring(carLmt, data.length);
            return "<p class='add-read-more show-less-content'>" + firstSet + "<span class='second-section'>" +
                secdHalf + "</span><span class='read-more text-dark'  title='Click to Show More'>" + readMoreTxt +
                "</span><span class='read-less text-dark' title='Click to Show Less'>" + readLessTxt + "</span></p>";
        }
        return "<p class='add-read-more'>" + data + "</p>";
    }
    $(document).on("click", ".read-more,.read-less", function() {
        $(this).closest(".add-read-more").toggleClass("show-less-content show-more-content");
    });
    // Search
    $("#search_table").on('change', function() {
        let data = $(this).val();
        search_table = data;
        // console.log(data);
        dt.ajax.reload(null, false);

    }) 
</script>
