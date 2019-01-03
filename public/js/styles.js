//左侧点击事件
$(function(){
    $('.sub_menu').find('.leaf_menu').click(function(){
        $(this).parents('.menu_box').find('li').removeClass('on');
        $(this).addClass('on');
    });
});

//左侧点击弹开子菜单
$(function(){

    $('.menu_box').find('ul').find('li').eq(0).find('.sub_menu').show();
    $('.menu_box').find('ul').find('li').find('h3').click(function(){
        $(this).parent('li').find('.sub_menu').slideToggle();
    });
    $(".sub_menu").hide();
});