$(function(){
//    $('body').on('click', 'a', function(){
//        goTo(this.href);
//
//        return false;
//    });
//
//    var currentHref = document.location.href;
//    setInterval(function(){
//        if (currentHref !== document.location.href) {
//            goTo(document.location.href);
//            currentHref = document.location.href;
//        }
//    }, 300);
});


function goTo(_url) {
    $.ajax({
        url: _url,
        success: function(r){
            $('#content').html(r);
            history.pushState(null, null, _url);
        }
    });
}
//$(function () {
//    $('body').on('click', 'a', function () {
//        var _url = this.href;
//        $.ajax({
//            url: _url,
//            success: function (r) {
//                  history.pushState(null,null,_url);
//                $('#content').html(r);
//            }
//        });
//
//        return false;
//    });
//});
//
//
//window.onpopstate = function(event) {
//    var _url =location.href
//  $.ajax({
//            url: _url,
//            success: function (r) {
//                $('#content').html(r);
//            }
//        });
//};