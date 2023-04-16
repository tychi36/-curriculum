$(function(){
    $('.comment_edit').on('click',function(){
        $('#comment_edit').toggleClass('open');
    });

    $('.likes_button').on('click',function(){
        $('#like').removeClass('hidden');
        $('#post').addClass('hidden');

    });
    $('.posts_button').on('click',function(){
        $('#post').removeClass('hidden');
        $('#like').addClass('hidden');

    });
});