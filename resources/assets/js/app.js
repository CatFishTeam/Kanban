
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(document).on('click','.user', function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/addUserToKanban',
        type: 'POST',
        data : {
            id : $(this).data('id'),
            kanbanId : $('.kanbanId').data('id')
        },
        dataType: 'JSON',
        success: function (data){
            alert(data)
        },
        error: function(e) {
            console.log(e.responseText);
        }
    });
    $(this).fadeOut();
});