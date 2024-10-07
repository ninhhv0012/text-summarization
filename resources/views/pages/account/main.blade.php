@extends('layout.header')
@section('breadcrumb')
    <div class="page-title d-flex flex-column me-5">
        <!--begin::Title-->
        <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">Account Management</h1>
        <!--end::Title-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 pt-1">
            <!--begin::Item-->
            <li class="breadcrumb-item text-muted">
                <a href="../../demo8/dist/index.html" class="text-muted text-hover-primary">Home</a>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-dark">Account Management</li>
            <!--end::Item-->
        </ul>
        <!--end::Breadcrumb-->
    </div>
@endsection
@extends('layout.index')
@section('title')
    Account Management
@endsection
@section('css')
    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css"/>
    @include('pages.account.css')
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-1-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                          transform="rotate(45 17.0365 15.1223)" fill="black"/>
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="black"/>
                                </svg>
                            </span>
                                <!--end::Svg Icon-->
                                <input type="text" id="search_table"
                                       class="form-control form-control-solid w-250px ps-15"
                                       placeholder="Search Account"/>
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-1-->

                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                <!--begin::Filter-->
                                <button class="btn btn-light-primary me-3 btn-showfilter" data-kt-menu-trigger="click"
                                        data-kt-menu-placement="bottom-end">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                                fill="black"/>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Filter
                                </button>
                                <!--begin::Menu 1-->

                                <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px modal-filter"
                                     data-kt-menu="true"
                                     id="kt-toolbar-filter">
                                    <!--begin::Header-->
                                    <div class="px-7 py-5">
                                        <div class="fs-4 text-dark fw-bolder">Filter Options</div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Separator-->
                                    <div class="separator border-gray-200"></div>
                                    <!--end::Separator-->
                                    <!--begin::Content-->
                                    <form id="filter_form">
                                        <div class="px-7 py-5">
                                            <!--begin::Input group-->
                                            <div class="mb-10">
                                                <!--begin::Label-->
                                                <label class="form-label fs-5 fw-bold mb-3">Type:</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select id="filter_table"
                                                        class="form-select form-select-solid fw-bolder select-type">
                                                    <option
                                                        class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5"
                                                        value="all">All
                                                    </option>
                                                    <option
                                                        class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5"
                                                        value="0">Google
                                                    </option>
                                                    <option
                                                        class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5"
                                                        value="1">Facebook
                                                    </option>
                                                    <option
                                                        class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5"
                                                        value="2">Amazon
                                                    </option>
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->

                                            <div class="mb-10">
                                                <!--begin::Label-->
                                                <label class="form-label fs-5 fw-bold mb-3">Status:</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select id="filter_status"
                                                        class="form-select form-select-solid fw-bolder ">
                                                    <option
                                                        class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5"
                                                        value="all">All
                                                    </option>

                                                <option
                                                    class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5"
                                                    value="0">New
                                                </option>
                                                <option
                                                    class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5"
                                                    value="1">Error
                                                </option>
                                                <option
                                                    class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5"
                                                    value="2">Used
                                                </option>


                                                </select>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Actions-->
                                            <div class="d-flex justify-content-end">
                                                <button class="btn-reset btn btn-light btn-active-light-primary me-2">
                                                    Reset
                                                </button>
                                                <button id="filter_submit" class="btn btn-primary btn-filter"
                                                        data-kt-menu-dismiss="true"
                                                        data-kt-account-table-filter="filter">Apply
                                                </button>
                                            </div>
                                            <!--end::Actions-->
                                        </div>
                                    </form>
                                    <!--end::Content-->
                                </div>
                                <!--end::Menu 1-->
                                <!--end::Filter-->
                                <!--begin::Add customer-->
                                <button type="button" class="btn btn-primary" id="add_modal">Add Account</button>

                                <!--end::Add customer-->
                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Group actions-->
                            <div class="d-flex justify-content-end align-items-center d-none"
                                 data-kt-customer-table-toolbar="selected">
                                <div class="fw-bolder me-5">
                                    <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected
                                </div>
                                <button type="button" class="btn btn-danger"
                                        data-kt-customer-table-select="delete_selected">Delete Selected
                                </button>
                            </div>
                            <!--end::Group actions-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                            <!--begin::Table head-->
                            <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-50px">STT</th>
                                <th class="min-w-125px">Type</th>
                                <th class="min-w-125px">Username</th>
                                <th class="min-w-125px min-w-[5remn] text-align: center;">Status</th>
                                <th class="min-w-125px">Created at</th>
                                <th class="text-end min-w-70px">Actions</th>
                            </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
                <!--begin::Modals-->
                @include('pages.account.modal')
                @include('pages.account.modal_show')

                <!--begin::Modal - Customers - Add-->
                <!--end::Modal - Customers - Add-->
                <!--end::Modals-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
@endsection
@push('jscustom')
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    @include('pages.account.js')
@endpush
