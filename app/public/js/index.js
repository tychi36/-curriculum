$(function(){
    $('.comment_edit').on('click',function(){
        let edit = $(this).parent().parent().parent().next().next();   
        $(edit).toggleClass('hidden');
        
    });

    $('.likes_button').on('click',function(){
        $('#like').removeClass('hidden');
        $('#post').addClass('hidden');
        $('.likes_button').css({
            'color': '#000'
        });
        $('.posts_button').css({
            'color': '#CCCCCC'
        });

    });
    $('.posts_button').on('click',function(){
        $('#post').removeClass('hidden');
        $('#like').addClass('hidden');
        $('.posts_button').css({
            'color': '#000'
        });
        $('.likes_button').css({
            'color': '#CCCCCC'
        });

    });
    $('.posts_button').on('click',function(){
        if($(this).hasclass('not_show')){

        }else{
            $(this).addClass('.not_show');
        }
    });


});