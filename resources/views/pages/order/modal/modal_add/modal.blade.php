<div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <!--begin::Modal content-->
        <div class="modal-content rounded" data-select2-id="select2-data-74-ng3j">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary btn-close" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                transform="rotate(45 7.41422 6)" fill="black"></rect>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15" data-select2-id="select2-data-73-tn3s">
                <!--begin:Form-->
                <form id="kt_modal_add_customer_form" class="form fv-plugins-bootstrap5 fv-plugins-framework">
                    <!--begin::Heading-->

                    <!--begin::Pricing-->
                    <div class="card card-flush pt-3 mb-5 mb-lg-10">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2 class="fw-bolder modal-title">Order</h2>
                            </div>
                            <!--begin::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <input type="hidden" name="id">
                        <div class="card-body pt-0">
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
                            <div class="d-flex flex-column mb-8">
                                <label class="fs-6 fw-bold mb-2">Description</label>
                                <textarea class="form-control form-control-solid" rows="3" name="description" placeholder="Type Description"></textarea>
                            </div>
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-bold mb-2">Price</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" step=0.01 min="0" class="form-control form-control-solid"
                                    placeholder="" name="price" />
                                <!--end::Input-->
                            </div>
                        </div>
                        <!--end::Card body-->
                    </div>

                    <!--end::Pricing-->
                    <!--begin::Payment method-->

                    <!--end::Payment method-->
                    <!--begin::Card-->
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
                        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_customer_header"
                        data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px"
                        style="">
                        <div class="card card-flush pt-3 mb-5 mb-lg-10" id="product">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2 class="fw-bolder">Product</h2>
                                </div>
                                <!--begin::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Custom fields-->
                                <div class="d-flex flex-column mb-15 fv-row">
                                    <!--begin::Label-->
                                    <!--end::Label-->
                                    <!--begin::Table wrapper-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <div id="kt_create_new_custom_fields_wrapper"
                                            class="dataTables_wrapper dt-bootstrap4 no-footer">
                                            <div class="table-responsive">
                                                <table id="kt_create_new_custom_fields"
                                                    class="table align-middle table-row-dashed fw-bold fs-6 gy-5 dataTable no-footer">
                                                    <!--begin::Table head-->
                                                    <thead>
                                                        <tr
                                                            class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                                            <th class="pt-0 sorting_disabled required" rowspan="1"
                                                                colspan="1" style="width: 180.734px;">Name</th>
                                                            <th class="pt-0 sorting_disabled required" rowspan="1"
                                                                colspan="1" style="width: 181.469px;">Color</th>
                                                            <th class="pt-0 sorting_disabled required" rowspan="1"
                                                                colspan="1" style="width: 181.469px;">Size</th>
                                                            <th class="pt-0 sorting_disabled required" rowspan="1"
                                                                colspan="1" style="width: 181.469px;">Quantity</th>
                                                            {{-- <th class="pt-0 text-end sorting_disabled" rowspan="1"
                                                            colspan="1" style="width: 53.5469px;">Remove</th> --}}
                                                        </tr>
                                                    </thead>
                                                    <!--end::Table head-->
                                                    <!--begin::Table body-->
                                                    <tbody id="tab_logic">
                                                        {{-- <tr class="odd">
                                                            <input type="hidden" name="id_product[]" value="">
                                                            <td>
                                                                <input type="text"
                                                                    class="form-control form-control-solid"
                                                                    name="name_product[]" value="">
                                                            </td>
                                                            <td>
                                                                <input type="text"
                                                                    class="form-control form-control-solid"
                                                                    name="color_product[]" value="">
                                                            </td>
                                                            <td>
                                                                <select
                                                                    class="form-control form-control-lg form-control-solid"
                                                                    name="size_product[]">
                                                                    <option value="0">Choose</option>
                                                                    <option value="S">S</option>
                                                                    <option value="M">M</option>
                                                                    <option value="L">L</option>
                                                                    <option value="XL">XL</option>
                                                                    <option value="XXL">XXL</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="number" step=1 min="1"
                                                                    class="form-control form-control-lg form-control-solid"
                                                                    name="quantity_product[]" value="">
                                                            </td>
                                                            <td class="text-end">
                                                                <button type="button"
                                                                    class="btn btn-icon btn-flex btn-active-light-primary w-30px h-30px me-3 row-delete"
                                                                    data-kt-action="field_remove">
                                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                                    <span class="svg-icon svg-icon-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none">
                                                                            <path
                                                                                d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                                                fill="black"></path>
                                                                            <path opacity="0.5"
                                                                                d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                                                fill="black"></path>
                                                                            <path opacity="0.5"
                                                                                d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                                                fill="black"></path>
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </button>
                                                            </td>
                                                        </tr> --}}
                                                    </tbody>
                                                    <!--end::Table body-->
                                                </table>
                                            </div>
                                            <div class="row">
                                                <div
                                                    class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                                                </div>
                                                <div
                                                    class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                                </div>
                                            </div>
                                        </div>
                                        <!--end:Table-->
                                    </div>
                                    <!--end::Table wrapper-->
                                    <!--begin::Add custom field-->
                                    <button type="button" class="btn btn-light-primary me-auto" id="add_product">Add
                                        Product</button>
                                    <!--end::Add custom field-->
                                </div>
                                <!--end::Custom fields-->
                            </div>
                            <!--end::Card body-->
                        </div>
                    </div>
                    <!--end::Card-->
                    <div class="text-center">
                        <button class="btn btn-light me-3 btn-reset" id="kt_modal_add_customer_cancel">Reset</button>
                        <button class="btn btn-light me-3 btn-refresh">Refresh</button>
                        <button id="kt_modal_add_customer_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                        </button>
                    </div>
                </form>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->
        </div>
    </div>
</div>
{{-- Modal Detail --}}
@include('pages.order.modal.modal_add.js')
