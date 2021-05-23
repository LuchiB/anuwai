<script>

    $('.remove-product').on('click', function(e){
    e.preventDefault();
    // const id = $(this).attr('data-id');

    $removeId = $(this).data('remove-product');

    $.alert({
    title: 'Confirm',
    content: 'Delete Product ?',
    type: 'red',
    typeAnimated: true,
    rtl: false,
    closeIcon: true,
    buttons: {
        confirm: {
            text: 'Remove',
            btnClass: 'btn-danger',
            action: function () {
                // $(`form#product-remove${$removeId}`).submit();
                alert($removeId);
            }
        },
        cancel: {
            text: 'Cancel',
            btnClass: 'btn-blue',
            action: function () {
                $.alert('Action Canceled!');
            }
        }
    }
});
    });
</script>