$(function () {

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    });

    // REMOVE CART ITEM
    $('.remove-cart').click(function(e){
        e.preventDefault();

        $removeId = $(this).data('remove-cart');
        $.alert({
            title: 'Confirm',
            content: 'Remove Product ?',
            type: 'red',
            typeAnimated: true,
            rtl: false,
            closeIcon: true,
            buttons: {
                confirm: {
                    text: 'Remove',
                    btnClass: 'btn-danger',
                    action: function () {
                        $(`form#remove-cart-${$removeId}`).submit();
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
    // END

    // RDELETE USER
  // DELETE PRODUCT
  $('.delete-user').on('click', function(e){
    e.preventDefault();
    // const id = $(this).attr('data-id');

    $userId = $(this).data('delete-user');

    $.alert({
    title: 'Confirm',
    content: 'Delete User ?',
    type: 'red',
    typeAnimated: true,
    rtl: false,
    closeIcon: true,
    buttons: {
        confirm: {
            text: 'Remove',
            btnClass: 'btn-danger',
            action: function () {
                $(`form#delete-user-${$userId}`).submit();
                // alert($userId);
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
//   END
    // END

    // RDELETE CATEGORY
    $('.delete-category').click(function(e){
        e.preventDefault();

        $catId = $(this).data('delete-category');
        $.alert({
            title: 'Confirm',
            content: 'Delete Category ?',
            type: 'red',
            typeAnimated: true,
            rtl: false,
            closeIcon: true,
            buttons: {
                confirm: {
                    text: 'Remove',
                    btnClass: 'btn-danger',
                    action: function () {
                        $(`form#delete-category-${$catId}`).submit();
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
    // END

// DELETE PRODUCT
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
                    $(`form#remove-product-${$removeId}`).submit();
                    // alert($removeId);
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
//   END

    $('.save-for-later').click(function(e){
        e.preventDefault();

        $saveId = $(this).data('save-for-later');

        $(`form#save-for-later-${$saveId}`).submit();
    });

    $('.move-to-cart').click(function(e){
        e.preventDefault();

        $moveId = $(this).data('move-to-cart');

        $(`form#move-to-cart-${$moveId}`).submit();
    });

    $('.remove-save-for-later').click(function(e){
        e.preventDefault();

        $removeId = $(this).data('remove-save-for-later');

        $(`form#remove-save-for-later-${$removeId}`).submit();
    });

    // $('.ui.checkbox').checkbox();
    $('.ui.dropdown').dropdown();

    $('.message .close')
        .on('click', function () {
            $(this)
                .closest('.message')
                .transition('fade');
        });

    // Change Cart Quanitity
    $('.quantity').change(function(e){
        e.preventDefault();

        var id = $(this).data('id');
        var quantity = $(this).val();

        $.ajax({
            url: `/cart/${id}`,
            method: 'PATCH',
            data: {quantity: quantity},
            dataType: 'JSON'
        })
        .then(response => {
            if(response) {
                location.reload();
            }
        })
        .catch(error => {
            location.reload();
        });
    });
    // END---------------->
});





    