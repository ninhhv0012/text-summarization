@extends('layout.header')
@section('breadcrumb')
<div class="page-title d-flex flex-column me-5" >
    <!--begin::Title-->
    <p class="d-flex flex-column text-dark fw-bolder fs-3 mb-0" style="font-size: 30px !important; font-family: initial;"> TRÍCH CHỌN VĂN BẢN</p>
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

        <!--end::Item-->
    </ul>
    <!--end::Breadcrumb-->
</div>
@endsection
@extends('layout.index')
@section('title')
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

                        @if (isset($id))
                         <input type="hidden" name="id" value="{{$id}}">
                        @endif

                        <div class="fv-row mb-7" style="margin-top: 20px;">
                            <textarea class="form-control form-control-solid" rows="12" name="text" placeholder="Nhập văn bản....">{{ isset($text) ? $text : "" }}</textarea>
                        </div>
                        {{-- end input text erea --}}
                        {{-- button submit --}}
                        <div class="d-flex justify-content-end" style="justify-content:center !important">
                            @if($device->code == 'tung2024')
                            <button type="submit" class="btn btn-primary" >Xử lý văn bản</button>
                            @endif
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
                <!--begin::Card body-->
                @if(isset($summarizedText))
                <div class="card-body pt-0" style="margin-bottom: -28px !important;">
                    <div class="fv-row mb-7">
                        <textarea class="form-control form-control-solid" rows="2" name="text">{{$summarizedText}}</textarea>
                    </div>
                </div>
                @else
                <div class="card-body pt-0"  style="margin-bottom: -28px !important;">
                    <div class="fv-row mb-7">
                        <textarea class="form-control form-control-solid" rows="1" name="text" placeholder="Kết quả trích chọn văn bản..." disabled></textarea>
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
