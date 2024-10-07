
<div class="modal fade" id="kt_modal_add_customer" tabindex="-1">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form" action="{{ route('designs.index') }}" id="kt_modal_add_customer_form"
                enctype="multipart/form-data" method="post">
                @csrf
                <!--begin::Modal header-->
                <input type="hidden" name="id" id="id" value="" />
                <div class="modal-header" id="kt_modal_add_customer_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Add a design</h2>
                  
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
                    @if (Auth::user()->isAdmin == 1)
                    <div id="form_status" class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" >
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class=" fs-6 fw-bold mb-2">Status</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-select form-select-solid " id="status"   name="status">
                                <option value="0" data-select2-id="select2-data-12-5h3e">New</option>
                                <option value="1" data-select2-id="select2-data-12-5h3e">Processing</option>
                                <option value="2" data-select2-id="select2-data-12-5h3e">Finish</option>
                                <option value="3" data-select2-id="select2-data-12-5h3e">Redesign</option>
                                <option value="4" data-select2-id="select2-data-76-8clf">Complete</option>
                        
                            </select>
                            <!--end::Input-->
                        </div>
                    </div>
                    <div id="form_user" class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" >
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class=" fs-6 fw-bold mb-2">Staff</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input  class="form-control form-control-solid id_user" type="text" id="name_user"  placeholder="Null" disabled="disabled"> 
                            <input type="hidden" id="user_id" name="user_id" value="" class="id_user">
                            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility" id="btn-clear-id">
                                <i class="bi bi-x fs-2" style="    padding-right: 24px;"></i>
                        
                            </span>                            <!--end::Input-->
                        </div>
                    </div>
                    @endif
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class=" fs-6 fw-bold mb-2">Description</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <textarea class="form-control form-control-solid" rows="3" id="description" name="description" placeholder="Description" style="height: 164px;"></textarea>
                            <!--end::Input-->
                        </div>
                    </div>
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class=" fs-6 fw-bold mb-2 text_n" id="text_img">Image</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="file" class="form-control form-control-solid" id="image" name="image"
                                onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"  accept=".png,.jpg"/>
                            <br>
                            <img id="blah" width="500px" />
                            <!--end::Input-->
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
        $(document).ready(function() {
            $('#check').click(function() {

                $(this).is(':checked') ? $('.show_password').attr('type', 'text') : $('.show_password')
                    .attr('type', 'password');
            });
        });
    </script>
@endpush
