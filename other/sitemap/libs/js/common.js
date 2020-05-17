/*
 * 2018 NiNaCoder
 * @author: NiNaCoder <ninacoder2510@gmail.com>
 * © 2018 NiNaCoder https://ninacoder.com
 * International Registered Trademark & Property of NiNaCoder
 */

function youtube(keyword) {
    var yt_url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q=' + encodeURIComponent(keyword.replace(/[^a-zA-Z ]/g, " ")) + '&type=video&maxResults=20&key=' + youtbe_api_key;
    $.ajax({
        type: "GET",
        url: yt_url,
        dataType: "jsonp",
        success: function (response) {
            if (response.items) {
                var _html = '';
                var last = '';
                for (var i = 0; i < 8; i++) {
                    _html += '<div class="swiper-slide"><a href="javascript:void(0)" onclick="PlayVideo(\''+response.items[i].id.videoId+'\');">\n' +
                        '<div class="video-img" style="background-image: url('+response.items[i].snippet.thumbnails.medium.url+')"></div>\n' +
                        '<div class="video-title">'+response.items[i].snippet.title+'</div>\n' +
                        '</a></div>';
                }
                if (_html) {
                    $(".swiper-wrapper").html(_html);
                    $(".fn-tab-videos").removeClass('none');
                    var swiper = new Swiper(".swiper-container", {
                        slidesPerView: "auto",
                        paginationClickable: !0,
                        spaceBetween: 0,
                        watchSlidesProgress: !0,
                        watchSlidesVisibility: !0,
                        navigation: {
                            nextEl: '.swiper-arrow-right',
                            prevEl: '.swiper-arrow-left',
                        }
                    });
                }else{
                    $("#similar_video_box").remove();
                }
            }
        }
    });
}
function PlayVideo(url) {
    $("#videoplayer").removeClass('none');
    var playerWidth = $("#videoplayer").width();
    var playerHeight;
    playerHeight = playerWidth * 56 / 100;
    $('#videoplayer').html('<iframe width="100%" height="' + playerHeight + '" src="https://www.youtube.com/embed/' + url + '?&autoplay=1&rel=0" frameborder="0" allowfullscreen></iframe>');
}

function check_search() {
    if (document.getElementById("search_keyword").value == "" || document.getElementById("search_keyword").value == "Enter artist, song name or keyword.") {
        alert("Enter artist, song name or keyword.");
        return false;
    } else document.forms["_lyricsSearch"].submit();
}

function uni_focus_textsearch(strInputDefaultValue) {
    var strCurrentValue = document.getElementById('search_keyword').value;
    if (strCurrentValue == strInputDefaultValue) {
        document.getElementById('search_keyword').value = '';
    } else if (strCurrentValue == '') {
        document.getElementById('search_keyword').value = strInputDefaultValue;
    }
    return true;
}

$("#tabService").live("click", function(){
    $(".fn-tab-panel-service").removeClass("none");
    $(".fn-tab-panel-share").addClass("none");
});
$("#tabShare").live("click", function(){
    $(".fn-tab-panel-share").removeClass("none");
    $(".fn-tab-panel-service").addClass("none");
});
$(".fn-closetab").live("click", function(){
    $(".fn-tab-panel-share").addClass("none");
    $(".fn-tab-panel-service").addClass("none");
});