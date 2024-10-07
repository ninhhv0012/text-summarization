
<div class="modal fade" id="kt_modal_add_customer" tabindex="-1">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form" action="{{ route('money.index') }}" id="kt_modal_add_customer_form"
                enctype="multipart/form-data" method="post">
                @csrf
                <!--begin::Modal header-->
                <input type="hidden" name="id" id="id" value="" />
                <div class="modal-header" id="kt_modal_add_customer_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Add a bill</h2>
                  
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div id="kt_modal_add_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
                    
                    <!--end::Close-->
                </div>
                <div class="text-left text_des">
                    <span id="show_des"> </span>
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">
                    <div class="alert alert-danger rounded border-warning border border-dashed mb-9 p-6"
                        style="display:none">
                        <ul></ul>
                    </div>
                    <!--begin::Scroll-->
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="text_n required fs-6 fw-bold mb-2">Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" id="name" placeholder=""
                                name="name" />
                            <!--end::Input-->
                        </div>
                    </div>
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="text_n required fs-6 fw-bold mb-2">Number</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" id="number" placeholder="" name="number" oninput="formatNumber(this)" data-value="" />
                        </div>
                      

                    </div>
                   
                    <!--end::Modal body-->
                    <!--begin::Modal footer-->
                    <div class="modal-footer flex-center">
                        <!--begin::Button-->
                        <button type="reset" id="kt_modal_add_customer_cancel"
                            class="btn btn-light me-3">Reset</button>
                        <span  id="refresh"
                        class="btn btn-light me-3 refesh">Refresh</span>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary" data-kt-users-modal-action="submit">
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


@push('jscustom')
<script>
    function formatNumber(input) {
        var value = input.value.replace(/,/g, '');

// Định dạng lại số tiền với dấu phân cách hàng nghìn
var formattedValue = parseFloat(value).toLocaleString('en-US');

// Gán giá trị đã định dạng lại vào ô input
input.value = formattedValue;
    }
    </script>
@endpush
