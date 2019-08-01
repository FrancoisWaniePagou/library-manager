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

    // displaying hidden field for specif document type
    let documentType = '';
    $('.radio_group_document_type input').click(function(e){

        documentType = $(this).attr('id');

        if(documentType !== 'dictionnary')
            $('.block_book_field').css('display', 'block');

        if(documentType == 'dictionnary'){
            $('.block_dictionnary_field').css('display', 'block');
            $('.block_book_field, .block_roman_field, .block_review_field, .block_guide_field').css('display', 'none');
        }else if(documentType == 'roman'){
            $('.block_roman_field').css('display', 'block');
            $('.block_dictionnary_field, .block_review_field, .block_guide_field').css('display', 'none');
        }else if(documentType == 'review'){
            $('.block_review_field').css('display', 'block');
            $('.block_dictionnary_field, .block_roman_field, .block_guide_field').css('display', 'none');
        }else if(documentType == 'guide'){
            $('.block_guide_field').css('display', 'block');
            $('.block_dictionnary_field, .block_review_field, .block_roman_field').css('display', 'none');
        }

        console.log(documentType);
    });
});