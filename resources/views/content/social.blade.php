@extends('layouts.master')
@section('content')
@section('styles')
    <link href="{{ asset('') }}vendor/lity-2.4.1/dist/lity.css" rel="stylesheet">
    <link href="{{ asset('') }}fullcalendar/main.css" rel="stylesheet">
    <link href="{{ asset('') }}fullcalendar/fullcalendar-edit.css" rel="stylesheet">
@endsection
<style>
    .width_control {
        height: 220px;
    }

    .text-overflow {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box !important;
        -webkit-line-clamp: 4;
        /* number of lines to show */
        -webkit-box-orient: vertical;
    }
</style>
<!-- INSTAGRAM DAN VIDEO YOUTUBE -->
<div class="city_blog_wrap" style="background:#dbd7d7">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6" style="margin-top:20px;">
                <div class="heding_full" style="margin-top: 20px; margin-bottom:0px;">
                    <div class="section_heading">
                        <h2>Instagram</h2>
                    </div>
                </div>
                <div class="row" id="instagram-content">
                    <div class="col-sm-12 m-1" style="margin-bottom:10px">
                        <div class="row">
                            <div class="col-sm-2">
                                <img id="instagram-profile" style="width:100%;" src="#" alt="">
                            </div>
                            <div class="col-sm-10">
                                <h5 id="instagram-name"></h5>
                                <h6 id="instagram-followers"><span></span> Followers</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6"
                style="padding:0px 20px 20px 20px; background:rgb(174, 236, 179); margin-top:20px;">
                <div class="heding_full" style="margin-top: 20px; margin-bottom:0px;">
                    <div class="section_heading">
                        <h2>Youtube</h2>
                    </div>
                </div>
                <div class="row" id="youtube-content">
                    <div class="col-sm-12 m-1" style="margin-bottom:10px">
                        <div class="row">
                            <div class="col-sm-2">
                                <img id="youtube-profile" style="width:100%;" src="#" alt="">
                            </div>
                            <div class="col-sm-10">
                                <h5 id="youtube-name">Nama Youtube</h5>
                                <h6 id="youtube-subscriber"><span></span> Subscribers</h6>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row" id="youtube-content1" class="mt-5">
		            <div class="col-sm-12 m-1" style="margin-bottom:10px;margin-top:60px;">
                        <div class="row">
                            <div class="col-sm-2">
                                <img id="youtube-profile1" style="width:100%;" src="#" alt="">
                            </div>
                            <div class="col-sm-10">
                                <h5 id="youtube-name1">Nama Youtube</h5>
                                <h6 id="youtube-subscriber1"><span></span> Subscribers</h6>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <a class="twitter-timeline" data-width="100%" data-dnt="true" href="https://twitter.com/bapp_kaltim?ref_src=twsrc%5Etfw" data-tweet-limit="1">Tweets by bapp_kaltim</a> <script async defer src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('vendor/fslightbox.js') }}"></script>
<script src="{{ asset('') }}vendor/lity-2.4.1/dist/lity.js"></script>
<script src="{{ asset('') }}fullcalendar/main.js"></script>
<script>
    jQuery(document).ready(function($) {
        $(document).ready(function() {
            instagram()
            youtubeBappeda()
            // youtubeKaltimBerdaulat()
        })

        function instagram() {
            var facebookToken = '{{ setting('media-social.api_ig') }}';
            $.ajax({
                    url: 'https://graph.facebook.com/v11.0/17841439622453485?fields=followers_count,profile_picture_url,username,media&access_token=' +
                        facebookToken,
                    type: 'GET'
                })
                .done(function(data) {
                    $('#instagram-profile').attr('src', data.profile_picture_url);
                    $('#instagram-name').html('<a href="https://www.instagram.com/' + data.username +
                        '">@' + data.username + '</a>');
                    $('#instagram-followers > span').html(data.followers_count);
                    for (let index = 0; index < 4; index++) {
                        var id = data.media.data[index].id;

                        $.ajax({
                                url: 'https://graph.facebook.com/v11.0/' + id +
                                    '?fields=media_url,caption,like_count,permalink&access_token=' +
                                    facebookToken,
                                type: 'GET'
                            })
                            .done(function(dataa) {
                                var tag = '<div class="col-md-6 col-sm-6 col-lg-6">' +
                                    '<div class="city_blog_fig">' +
                                    '<a href="' + dataa.permalink + '">' +
                                    '<figure class="box" style="height: 200px;">' +
                                    '<img src="' + dataa.media_url +
                                    '" alt="Image" style="height: inherit; object-fit: cover;">' +
                                    '</figure>' +
                                    '</a>' +
                                    '<div class="city_blog_text">' +
                                    '<i class="fa fa-heart"></i> ' + dataa.like_count + '<br />' +
                                    '<p class="text-overflow">' + dataa.caption + '</p>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';
                                $('#instagram-content').append(tag);
                            })
                            .fail(function(fail) {
                                console.log(fail);
                            });
                    }
                })
                .fail(function(fail) {
                    console.log(fail);
                });
        }

        function youtubeBappeda() {
            var youtubeToken = 'AIzaSyAThV4ZiB8_zFNkuqfZVvyswqnjH98QkTI';
            var youtubeChannelId = 'UC5LF3CO4omiNMSrKOJUuXzQ';
            $.ajax({
                    url: 'https://youtube.googleapis.com/youtube/v3/channels?part=statistics&part=snippet&id=' +
                        youtubeChannelId + '&key=' + youtubeToken,
                    type: 'GET'
                })
                .done(function(data) {
                    $('#youtube-profile').attr('src', data.items[0].snippet.thumbnails.default.url);
                    $('#youtube-name').html('<a href="https://www.youtube.com/channel/' + youtubeChannelId +
                        '">' + data.items[0].snippet.title + '</a>');
                    $('#youtube-subscriber > span').html(data.items[0].statistics.subscriberCount);
                    $.ajax({
                            url: 'https://www.googleapis.com/youtube/v3/search?key=' + youtubeToken +
                                '&channelId=' + youtubeChannelId +
                                '&part=snippet,id&order=date&maxResults=4',
                            type: 'GET'
                        })
                        .done(function(dataa) {
                            var element = dataa.items;
                            for (var i = 0; i < 4;) {
                                if (element[i].id.kind == 'youtube#video') {
                                    var tag =
                                        '<div class="col-lg-6 col-md-6 col-sm-6 m-1" style="margin-bottom: 10px;">' +
                                        '<iframe src="https://www.youtube.com/embed/' + element[i].id
                                        .videoId + '?autoplay=0&mute=1"></iframe><br />' +
                                        '<p>' + element[i].snippet.title + '</p>' +
                                        '</div>';
                                    $('#youtube-content').append(tag);
                                    i++;
                                } else {
                                    break;
                                }

                            }
                        })
                        .fail(function(fail) {
                            console.log(fail);
                        });
                })
                .fail(function(fail) {
                    console.log(fail);
                });
        }

        // function youtubeKaltimBerdaulat() {
        //     console.log("kaltim berdaulat")
        //     var youtubeToken = 'AIzaSyBC5H-f5frracfQppN9B2aYWd-qfZJ0Ggw';
        //     var youtubeChannelId = 'UCW0yOAVXuRWSLt6v7V4Ncug';
        //     $.ajax({
        //         url: 'https://youtube.googleapis.com/youtube/v3/channels?part=statistics&part=snippet&id='+youtubeChannelId+'&key='+youtubeToken,
        //         type: 'GET'
        //     })
        //     .done(function (data) {
        //         $('#youtube-profile1').attr('src', data.items[0].snippet.thumbnails.default.url);
        //         $('#youtube-name1').html('<a href="https://www.youtube.com/channel/'+youtubeChannelId+'">'+data.items[0].snippet.title+'</a>');
        //         $('#youtube-subscriber1 > span').html(data.items[0].statistics.subscriberCount);
        //         $.ajax({
        //             url: 'https://www.googleapis.com/youtube/v3/search?key='+youtubeToken+'&channelId='+youtubeChannelId+'&part=snippet,id&order=date&maxResults=4',
        //             type: 'GET'
        //         })
        //         .done(function (dataa) {
        //             var element = dataa.items;
        //             for(var i=0; i<2 ;) {
        //                 if(element[i].id.kind == 'youtube#video') {
        //                     var tag = '<div class="col-lg-6 col-md-6 col-sm-6 m-1" style="margin-bottom: 10px;">'+
        // 		'<iframe src="https://www.youtube.com/embed/'+element[i].id.videoId+'?autoplay=0&mute=1"></iframe><br />'+
        //                         '<p>'+element[i].snippet.title+'</p>'+
        // 		'</div>';
        //                     $('#youtube-content1').append(tag);
        // 	    i++;
        //                 } else {
        // 	    break;
        // 	}

        //             }
        //         })
        //         .fail(function(fail) {
        //             console.log(fail);
        //         });
        //     })
        //     .fail(function(fail) {
        //         console.log(fail);
        //     });
        // }
    });
</script>
@endsection
