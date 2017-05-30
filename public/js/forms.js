/**
 * Created by mariana.sena on 29/05/2017.
 */

$('.list-group-item > input[type=checkbox]').click(function(){
    $(this).parent().toggleClass('active');
});

/*
* Auto select em edit
* */
$('select[data-value]').each(function(){
    $(this).children('option[value="'+$(this).attr('data-value')+'"]').prop('selected',true)
});