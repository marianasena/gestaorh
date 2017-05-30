/**
 * Created by mariana.sena on 29/05/2017.
 */

$('.list-group-item > input[type=checkbox]').click(function(){
    $(this).parent().toggleClass('active');
});

