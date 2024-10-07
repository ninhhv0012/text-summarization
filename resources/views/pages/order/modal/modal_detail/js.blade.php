@push('jscustom')
<script>
    $(document).on('click', '.btn-detail', function(e) {
        e.preventDefault();
        $(".modal-detail").modal({
            'backdrop': 'static',
            'keyboard': false
        });
        $(".detal-product").remove();
        var data = $(this).data('data');
        $('#name').text(data.name);
        $('#description').text(data.description);
        $('#price').text(data.price);
        for (let i = 0; i < data.product.length; i++) {
            $('#tab-detail').append(
                '<tr class="fw-bolder text-gray-700 fs-5 text-end detal-product">' +
                '<td class="d-flex align-items-center pt-6 text-break" id="product" style="text-align:justify;">' +
                data.product[i].name +
                '</td>' +
                '<td class="pt-6" id="color" style="text-align:left;">' + data.product[i].color +
                '</td>' +
                '<td class="pt-6" id="size">' + data.product[i].size +
                '</td>' +
                '<td class="pt-6 text-dark fw-boldest" id="quantity">' + data.product[i].quantity +
                '</td>' +
                '</tr>'
            );
        }
        $('.modal-detail').modal('show');
    });
</script>
@endpush
    