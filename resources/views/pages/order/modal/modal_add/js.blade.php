@push('jscustom')
    <script>
        button_remove =
            '<button type="button" class="btn btn-icon btn-flex btn-active-light-primary row-delete w-30px h-30px me-3" data-kt-action="field_remove" >' +
            '<span class = "svg-icon svg-icon-3" >' +
            '<svg xmlns = "http://www.w3.org/2000/svg"width = "24"height = "24"viewBox = "0 0 24 24"fill = "none" >' +
            '<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" >' +
            '</path>' +
            '<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" >' +
            '</path>' +
            '<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" >' +
            '</path>' +
            '</svg>' +
            '</span>' +
            '</button>';
        $(document).ready(function() {
            $("#add_product").click(function() {
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
                    '<input type="number" step=1 min="1" class="form-control form-control-lg form-control-solid" name="quantity_product[]" value="">' +
                    '</td>' +
                    '<td class="text-end" >' +
                    button_remove +
                    '</td> ' +
                    '</tr>')
                $('#kt_modal_add_customer_form').find("option[value='0']").hide();
                $('.row-delete').show();
            });

            
            // click on remove button then remove row from modal and submit form
            $(document.body).on('click', '.row-delete', function(e) {
                e.preventDefault();
                var element = document.getElementById("tab_logic");
                var numberOfChildren = element.getElementsByTagName('tr').length;
                //check form is add or edit
                //get modal-title of form
                var modal_title = $('#kt_modal_add_customer_form').find('.modal-title').text();
                //compare modal-title with 'Add' or 'Edit'
                if (modal_title == 'Add Order') {
                    //if modal-title is 'Add' then remove row
                    if (numberOfChildren > 2) {
                        $('.row-delete').show();
                    } else {
                        $('.row-delete').hide();
                    }
                    $(this).parents('tr').remove();
                } else {
                    
                    $(this).parents('tr').remove();   
                }
            });

        });
    </script>
@endpush
