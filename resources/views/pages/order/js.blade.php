<script>
    // Private functions
    let search_table = '';
    var dt = $("#kt_customers_table").DataTable({
        serverSide: true,
        processing: true,
        // order: [[ 4, "desc" ]],
        ordering: false,
        ajax: {
            url: "{{ route('order.show', 'get-list') }}",
            type: 'GET',
            data: function(d) {
                d.search_table = search_table;
            }
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
                data: 'name',
                className: 'text-center test',
                orderable: true,
                render: function(data, type, row, meta) {
                    return '<a  class="text-dark fw-bolder text-hover-primary fs-6 btn-detail text-break" data-bs-toggle="modal" data-bs-target="#kt_modal_detail" data-data=\'' +
                        JSON.stringify(row) +
                        '\'>' + data + '</a>';
                }
            },
            {
                data: 'description',
                className: 'text-center test',
                render: function(data, type, row, meta) {
                    if (data == null) {
                        return '';
                    } else {
                        return AddReadMore(data);
                    }
                }
            },
            {
                data: 'product',
                className: 'text-center test',
                render: function(data, type, row, meta) {
                    if (row.product.length == 0) {
                        return '';
                    }
                    var html = '';
                    row.product.forEach(element => {
                        html +=
                            '<table>' +
                            '<thead>' +
                            '<tr>' +
                            '<th class="min-w-125px" style="display:none"></th>' +
                            '<th class="min-w-125px" style="display:none"></th>' +
                            '</tr>' +
                            '</thead>' +
                            '<tbody class="fw-bold text-gray-600">' +
                            '<tr>' +
                            '<td class="text-break min-w-125px">' + element.name +
                            '</td>' +
                            '<td class="text-center min-w-125px" style="width: 50%;">' + element
                            .quantity + '</td>' +
                            '</tr>' +
                            '</tbody>' +
                            '</table>';
                    });
                    return html;

                },
            },
            {
                data: 'price',
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
    // last child div of td tag remove class line


    dt.on('draw', function() {
        KTMenu.createInstances();
    });

    function form_reset() {
        $("#kt_modal_add_customer").modal({
            'backdrop': 'static',
            'keyboard': false
        });
        $("#kt_modal_add_customer").keypress(function(e) {
            console.log(e.which);
            if (e.which == 13) {
                e.preventDefault();
                $('#kt_modal_add_customer_submit').trigger('click');
            }
        });
        $('.other').remove();
        $("#kt_modal_add_customer_form").trigger("reset");

    }
    // button close modal add
    $('.btn-close').on('click', function() {
        form_reset();
        $('#kt_modal_add_customer').modal('hide');
        // $('.modal-detail').modal('hide');
    });

    // button close modal detail
    $('.btn-close-modal-detail').on('click', function() {
        $('.modal-detail').modal('hide');
        // $('.modal-detail').modal('hide');
    });

    // button reset
    $('.btn-reset').on('click', function(e) {
        e.preventDefault();
        $("#kt_modal_add_customer_form").trigger("reset");
        document.querySelectorAll("tbody#tab_logic tr").forEach(x => {
            // get td tag and set value to empty
            x.querySelectorAll('td').forEach(y => {
                y.querySelectorAll('input').forEach(z => {
                    z.value = '';
                });
                y.querySelectorAll('select').forEach(z => {
                    z.value = '0';
                });
            });
        });
    });

    $('.btn-refresh').on('click', function(e) {
        e.preventDefault();
        $('.other').remove();
        modal = $('#kt_modal_add_customer_form');
        modal.find("input[name='name']").val($(this).attr('data-name'));
        modal.find("textarea[name='description']").val($(this).attr('data-description'));
        modal.find("input[name='price']").val($(this).attr('data-price'));
        for (let i = 0; i < $(this).attr('data-product_length'); i++) {
            $('#tab_logic').append(
                '<tr class = "odd other">' +
                '<input type = "hidden" name = "id_product[]" value="' + $(this).attr('data-id_product' +
                    i) + '" >' +
                '<td>' +
                '<input type = "text" class = "form-control form-control-solid" name = "name_product[]" value="' +
                $(this).attr('data-name_product' + i) + '" >' +
                '</td>' +
                '<td>' +
                '<input type="text" class="form-control form-control-solid" name="color_product[]" value="' +
                $(this).attr('data-color_product' + i) + '">' +
                '</td>' +
                '<td>' +
                '<select class="form-control form-control-lg form-control-solid" name="size_product[]">' +
                '<option value="0">Choose</option>' +
                '<option value = "S" ' + ($(this).attr('data-size_product' + i) == 'S' ? 'selected' : '') +
                '>S</option>' +
                '<option value = "M" ' + ($(this).attr('data-size_product' + i) == 'M' ? 'selected' : '') +
                '>M</option>' +
                '<option value = "L" ' + ($(this).attr('data-size_product' + i) == 'L' ? 'selected' : '') +
                '>L</option>' +
                '<option value = "XL" ' + ($(this).attr('data-size_product' + i) == 'XL' ? 'selected' :
                    '') + '>XL</option>' +
                '<option value = "XXL" ' + ($(this).attr('data-size_product' + i) == 'XXL' ? 'selected' :
                    '') + '>XXL</option>' +
                '</select>' +
                '</td>' +
                '<td>' +
                '<input type="number" step="1" min="1" class="form-control form-control-lg form-control-solid" name="quantity_product[]" value="' +
                $(this).attr('data-quantity_product' + i) + '">' +
                '</td>' +
                '<td class="text-end" >' +
                button_remove +
                '</td> ' +
                '</tr>'
            );
        }
    })

    //button-add
    $(document).on('click', '.btn-add', function(e) {
        e.preventDefault();
        form_reset();
        let modal = $('#kt_modal_add_customer_form');
        modal.find('#product').show();
        modal.find('.modal-title').text('Add Order');
        modal.find("input[name='id']").val('');
        modal.find("input[name='id_product[]']").val('');
        modal.trigger('reset');
        modal.find("option[value='0']").hide();
        $('#tab_logic').append(
            '<tr class = "odd other">' +
            '<input type = "hidden" name = "id_product[]" value = "" >' +
            '<td>' +
            '<input type = "text" class = "form-control form-control-solid" name = "name_product[]" value = "" >' +
            '</td>' +
            '<td>' +
            '<input type="text" class="form-control form-control-solid" name="color_product[]" value="">' +
            '</td>' +
            '<td>' +
            '<select class="form-control form-control-lg form-control-solid" name="size_product[]">' +
            '<option value="0">Choose</option>' +
            '<option value="S">S</option>' +
            '<option value="M">M</option>' +
            '<option value="L">L</option>' +
            '<option value="XL">XL</option>' +
            '<option value="XXL">XXL</option>' +
            '</select>' +
            '</td>' +
            '<td>' +
            '<input type="number" step="1" min="1" class="form-control form-control-lg form-control-solid" name="quantity_product[]" value="">' +
            '</td>' +
            '<td class="text-end" >' +
            button_remove +
            '</td> ' +
            '</tr>');
        $('#kt_modal_add_customer_form').find("option[value='0']").hide();
        $('.row-delete').hide();
        $('.btn-reset').show();
        $('.btn-refresh').hide();
        $('#kt_modal_add_customer').modal('show');
    });

    //button-edit
    $(document).on('click', '.btn-edit', function(e) {
        e.preventDefault();
        form_reset();
        let data = $(this).data('data');
        console.log('data', data);
        let modal = $('#kt_modal_add_customer_form');
        modal.find('.modal-title').text('Edit Order');
        modal.find("input[name='id']").val(data.id);
        modal.find("input[name='name']").val(data.name);
        modal.find("textarea[name='description']").val(data.description);
        modal.find("input[name='price']").val(data.price);
        if (data.product.length > 0) {
            for (let i = 0; i < data.product.length; i++) {
                $('#tab_logic').append(
                    '<tr class = "odd other" id = ' + data.product[i].id + '>' +
                    '<input type = "hidden" name = "id_product[]" value = "' + data.product[i].id +
                    '" >' +
                    '<td>' +
                    '<input type = "text" class = "form-control form-control-solid" name = "name_product[]" value ="' +
                    data.product[i].name + '" >' +
                    '</td>' +
                    '<td>' +
                    '<input type="text" class="form-control form-control-solid" name="color_product[]" value="' +
                    data.product[i].color + '">' +
                    '</td>' +
                    '<td>' +
                    '<select class="form-control form-control-lg form-control-solid" name="size_product[]">' +
                    '<option value="0">Choose</option>' +
                    '<option value = "S" ' + (data.product[i].size == 'S' ? 'selected' : '') +
                    '>S</option>' +
                    '<option value = "M" ' + (data.product[i].size == 'M' ? 'selected' : '') +
                    '>M</option>' +
                    '<option value = "L" ' + (data.product[i].size == 'L' ? 'selected' : '') +
                    '>L</option>' +
                    '<option value = "XL" ' + (data.product[i].size == 'XL' ? 'selected' : '') +
                    '>XL</option>' +
                    '<option value = "XXL" ' + (data.product[i].size == 'XXL' ? 'selected' : '') +
                    '>XXL</option>' +
                    '</select>' +
                    '</td>' +
                    '<td>' +
                    '<input type="number" step=1 min="1" class="form-control form-control-solid" name="quantity_product[]" value="' +
                    data.product[i].quantity + '">' +
                    '</td>' +
                    '<td class="text-end" >' +
                    '<button type="button" class="btn btn-icon btn-flex btn-active-light-primary row-delete w-30px h-30px me-3" data-id="' +
                    data.product[i].id + '" data-kt-action="field_remove" >' +
                    '<span class = "svg-icon svg-icon-3" >' +
                    '<svg xmlns = "http://www.w3.org/2000/svg"width = "24"height = "24"viewBox = "0 0 24 24"fill = "none" >' +
                    '<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" >' +
                    '</path>' +
                    '<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" >' +
                    '</path>' +
                    '<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" >' +
                    '</path>' +
                    '</svg> ' +
                    '</span> ' +
                    '</button>' +
                    '</td> ' +
                    '</tr>')
            }
        } else {}
        modal.find("option[value='0']").hide();
        $('.btn-reset').hide();
        $('.btn-refresh').show();
        $('.btn-refresh').attr('data-name', data.name);
        $('.btn-refresh').attr('data-description', data.description);
        $('.btn-refresh').attr('data-price', data.price);
        $('.btn-refresh').attr('data-product_length', data.product.length);
        for (let i = 0; i < data.product.length; i++) {
            $('.btn-refresh').attr('data-id_product' + i, data.product[i].id);
            $('.btn-refresh').attr('data-name_product' + i, data.product[i].name);
            $('.btn-refresh').attr('data-color_product' + i, data.product[i].color);
            $('.btn-refresh').attr('data-size_product' + i, data.product[i].size);
            $('.btn-refresh').attr('data-quantity_product' + i, data.product[i].quantity);
        }
        $('#kt_modal_add_customer').modal('show');
    });

    //button-submit
    $('#kt_modal_add_customer_form').on('submit', function(e) {
        //check tr tag exist in table or not
        var y = document.getElementById("tab_logic").getElementsByTagName("tr").length;
        console.log(y);
        $('#kt_modal_add_customer_submit').attr("disabled", "disabled")
        e.preventDefault();
        if (y >= 1) {
            let data = $(this).serialize(),
                type = 'POST',
                url = "{{ route('order.store') }}",
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
                    setTimeout(function() {
                        $('#kt_modal_add_customer_submit').removeAttr("disabled");
                    }, 100)
                    notification(data.type, data.title, data.content);
                    if (data.type == 'success') {
                        dt.ajax.reload(null, true);
                        form_reset()
                        $('#kt_modal_add_customer').modal('hide');
                    }
                },
                error: function(data) {
                    $('#kt_modal_add_customer_submit').attr('data-kt-indicator', 'off');
                    setTimeout(function() {
                        $('#kt_modal_add_customer_submit').removeAttr("disabled");
                    }, 100)
                    notification('error', 'Error', 'Something went wrong');
                }
            });
        } else {
            e.preventDefault();
            notification('error', 'Error', 'Please add product');
            setTimeout(function() {
                $('#kt_modal_add_customer_submit').removeAttr("disabled");
            }, 100)
        }
    });

    //button-delete
    $(document).on('click', '.btn-delete', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        Swal.fire({
            text: "Are you sure you want to delete this order ?",
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
                    url: "{{ route('order.destroy', '') }}" + '/' + id,
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


    function AddReadMore(data) {
        var carLmt = 50;
        var readMoreTxt = " ...Read more";
        var readLessTxt = " Read less";
        if (data.length > carLmt) {
            var firstSet = data.substring(0, carLmt);
            var secdHalf = data.substring(carLmt, data.length);
            return "<span class='add-read-more show-less-content text-break column-beaty'>" + firstSet +
                "<span class='second-section column-beaty'  >" +
                secdHalf + "</span><span class='read-more text-dark'  title='Click to Show More'>" +
                readMoreTxt +
                "</span><span class='read-less text-dark' title='Click to Show Less'>" + readLessTxt +
                "</span></span>";
        }
        return "<span class='add-read-more '>" + data + "</span>";
    }
    $(document).on("click", ".read-more,.read-less", function() {
        $(this).closest(".add-read-more").toggleClass("show-less-content show-more-content");
    });
    $(".search_table").on('change', function() {
        let data = $(this).val();
        search_table = data;
        console.log(search_table);
        dt.ajax.reload();
    })
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
