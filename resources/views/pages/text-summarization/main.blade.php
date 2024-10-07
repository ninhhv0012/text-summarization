@extends('layout.header')
@section('breadcrumb')
<div class="page-title d-flex flex-column me-5">
    <!--begin::Title-->
    <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">Tóm tắt Văn bản</h1>
    <!--end::Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 pt-1">
        <!--begin::Item-->

        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-200 w-5px h-2px"></span>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-dark">Tóm tắt Văn bản</li>
        <!--end::Item-->
    </ul>
    <!--end::Breadcrumb-->
</div>
@endsection
@extends('layout.index')
@section('title')
Tóm tắt Văn bản
@endsection
@section('css')
<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@include('pages.text-summarization.css')
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
                @if ($errors->any())
                    <div id="error-message" class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <form action="{{route('text.summarize')}}" method="post">

                        @csrf
                       {{-- input text erea --}}


                        <div class="fv-row mb-7">
                            <label class="fs-6 fw-bold mb-2">Nhập văn bản</label>
                            <textarea class="form-control form-control-solid" rows="10" name="text">{{ isset($text) ? $text : "ok la" }}</textarea>
                        </div>
                        {{-- end input text erea --}}
                        {{-- button submit --}}
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Tóm tắt</button>
                        </div>
                        {{-- end button submit --}}

                    </form>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
            <!--Area to show the result of summary-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0">
                    <h3 class="card-title
                    fw-bolder text-dark">Kết quả tóm tắt</h3>
                </div>
                <!--begin::Card body-->
                @if(isset($summarizedText))
                <div class="card-body pt-0">
                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-bold mb-2">Văn bản tóm tắt</label>
                        <textarea class="form-control form-control-solid" rows="5" name="text">{{$summarizedText}}</textarea>
                    </div>
                </div>
                @endif
                <!--end::Card body-->
            </div>

            <!--end::Modals-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
@endsection
@push('jscustom')
<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script>
    // Wait for the DOM to be fully loaded
    document.addEventListener('DOMContentLoaded', function () {
        // Check if the error message element exists
        var errorMessage = document.getElementById('error-message');

        if (errorMessage) {
            // Set a timeout to hide the error message after 3 seconds
            setTimeout(function () {
                errorMessage.style.display = 'none';
            }, 1000); // 3000 milliseconds = 3 seconds
        }
    });
</script>

<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
@endpush
