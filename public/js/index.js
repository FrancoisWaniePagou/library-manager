$(document).ready(function () {
    $('.delete_btn').click(function(e){
        $(this).addClass('selected');
        e.preventDefault();

        if(confirm('Would you really delete this library?')){
            $('.selected .delete_form').submit();
        }else{
            $(this).removeClass('selected');
            return false;
        }
    });
});