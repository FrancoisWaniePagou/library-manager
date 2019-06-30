$(document).ready(function () {
    $('.delete_btn').click(function(e){
        e.preventDefault();
        $('#delete-form').submit();
    } );
});