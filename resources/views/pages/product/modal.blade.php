<div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form" id="kt_modal_add_customer_form">
                @csrf
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_customer_header">
                    <!--begin::Modal title-->
                    <h2 class="modal-title"></h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->

                    <div id="kt_modal_add_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary btn-close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                    rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div id="tab_logic">
                    <div class="modal-body py-10 px-lg-17">
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
                            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#kt_modal_add_customer_header"
                            data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
                            <input type="hidden" name="id" value="">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-bold mb-2">Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    name="name" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-bold mb-2">Price</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" class="form-control form-control-solid" placeholder=""
                                    name="price" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Modal body-->

                </div>
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="reset" id="kt_modal_add_customer_cancel" class="btn btn-light me-3">Reset</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Modal footer-->

            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
{{-- @push('jscustom')
    <script>
        $(document).ready(function() {
            var i = 1;
            $("#add_order").click(function() {
                i++;
                $('#tab_logic').append(
                    '<div class="modal-body py-10 px-lg-17 indexadd">' +
                    '<div class="row">' +
                    '<div class="col-6">' +
                    '<h2 class="fw-bolder index" i>Order ' + i + '</h2>' +
                    '</div>' +
                    '<div class="col-6">' +
                    '<div id="DeleteQuestionWrapper">' +
                    '<a class="btn btn-danger row-delete" id="DeleteQuestion' + i + '">' +
                    'Delete order' +
                    '</a>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true">\n' +
                    '<input type="hidden" name="id[]" value="">\n' +
                    '<div class="fv-row mb-7">\n' +
                    '<label class="required fs-6 fw-bold mb-2">Name</label>\n' +
                    '<input type="text" class="form-control form-control-solid" placeholder="" name="name[]" />\n' +
                    '</div>' +
                    '<div class="fv-row mb-15">' +
                    '<label class="fs-6 fw-bold mb-2">Description</label>' +
                    '<input type="text" class="form-control form-control-solid" placeholder="" name="description[]" />' +
                    '</div>' +
                    '<div class="fv-row mb-7"> ' +
                    '<label class="fs-6 fw-bold mb-2">Price</label>' +
                    '<input type="number" class="form-control form-control-solid" placeholder="" name="price[]" />' +
                    '</div>' +
                    '</div>' +
                    '</div>');
                console.log(i);
                
            });
            $(document.body).on('click', '.row-delete', function(e) {
                e.preventDefault();
                $(this).parent('div').parent('div').parent('div').parent('div').remove();
                --i;
                var x = $(".index").length;
                console.log("so class index: " + x);
                for (var j = 0; j < x; j++) {
                    if (j == 0) {
                        $(".index").eq(j).text("Order 1");
                    } else {
                        $(".index").eq(j).text("Order " + (j + 1));
                    }
                }
                console.log(i);
            });
        });
    </script>
@endpush --}}
