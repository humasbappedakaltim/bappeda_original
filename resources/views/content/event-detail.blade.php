@extends('layouts.master')
@section('styles')

@endsection
@section('content')
<!-- SAB BANNER START-->
<div class="sab_banner overlay">
    <div class="container">
        <div class="sab_banner_text">
            <h2>event detail</h2>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">event detail</li>
            </ul>
        </div>
    </div>
</div>
<!-- SAB BANNER END-->

<!-- CITY EVENT2 WRAP START-->
<div class="city_event2_wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="sidebar_widget widget2">
                    <!-- EVENT DETAIL START-->
                    <div class="event_detail">
                        <h4 class="sidebar_heading">Venue Detail</h4>
                        <div class="venue_list">
                            <ul>
                                <li>
                                    <h6>Date</h6>
                                    <p>July 12, 2018</p>
                                </li>
                                <li>
                                    <h6>Time:</h6>
                                    <p>08:45 am  - 01:45 pm</p>
                                </li>
                                <li>
                                    <h6>Location:</h6>
                                    <p>12 Depot St, Town Hall Stadium, NYC, USA</p>
                                </li>
                            </ul>
                        </div>
                        <div class="venue_list_map">
                            <h6>Map :</h6>
                            <div id="map-canvas" class="map-canvas"></div>
                        </div>
                    </div>
                    <!-- EVENT DETAIL END-->
                    
                    <!-- EVENT DETAIL START-->
                    <div class="event_detail">
                        <h4 class="sidebar_heading">Organizer</h4>
                        <div class="venue_list">
                            <ul>
                                <li>
                                    <h6>Organizer:</h6>
                                    <p> Mayor, City Councilor</p>
                                </li>
                                <li>
                                    <h6>Category:</h6>
                                    <p>Awareness Program, Culture</p>
                                </li>
                                <li>
                                    <h6>Email:</h6>
                                    <p>info@noreplypro.com</p>
                                </li>
                                <li>
                                    <h6>Phone:</h6>
                                    <p><a href="#">0674 987 665 9</a></p>
                                </li>
                                <li>
                                    <h6>Website:</h6>
                                    <p><a href="#">www.xyz.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- EVENT DETAIL END-->
                    
                    <!-- EVENT DETAIL START-->
                    <div class="event_detail">
                        <h4 class="sidebar_heading">Sponsor</h4>
                        <div class="city_sponsor">
                            <ul>
                                <li>
                                    <a href="#"><img src="images/side-client.png" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="images/side-client1.png" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="images/side-client2.png" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="images/side-client3.png" alt=""></a>
                                </li>
                                <li class="margin0">
                                    <a href="#"><img src="images/side-client4.png" alt=""></a>
                                </li>
                                <li class="margin0">
                                    <a href="#"><img src="images/side-client5.png" alt=""></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- EVENT DETAIL END-->
                </div>
            </div>
            <div class="col-md-9">
                <div class="city_event_detail">
                    <div class="event_detail_text">
                        <figure>
                            <img src="extra-images/event-detail.jpg" alt="">
                        </figure>
                        <h3 class="event_heading">Geary Estate Apartments Bridge</h3>
                        <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi </p>
                        <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. nec sagittis sem nibh id elit.  Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo.</p>
                        <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. </p>
                    </div>
                    <div class="event_detail_counter">
                        <h3 class="event_heading">Event Count Down</h3>
                        <div class="event_counter_list overlay">
                            <ul class="countdown">
                                <li>
                                    <h3 class="days">234</h3>
                                    <p class="">days</p>
                                </li>
                                <li>
                                    <h3 class="hours">440</h3>
                                    <p class="">hours</p>
                                </li>
                                <li>
                                    <h3 class="minutes">310</h3>
                                    <p class="">minutes</p>
                                </li>
                                <li>
                                    <h3 class="seconds">410</h3>
                                    <p class="">seconds</p>
                                </li>
                            </ul>
                        </div>
                        <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</p>
                    </div>
                    <!--CITY HEALTH2 TEXT WRAP START-->
                    <div class="city_health2_text team">
                        <h3 class="event_heading">Event Speakers</h3>
                        <!--SECTION HEADING END-->
                        <div class="city-health2-slider2">
                            <div>
                                <div class="city_senior_team">
                                    <figure class="box">
                                        <div class="box-layer layer-1"></div>
                                        <div class="box-layer layer-2"></div>
                                        <div class="box-layer layer-3"></div>
                                        <img src="extra-images/senir-team-fig.jpg" alt="">
                                    </figure>
                                    <div class="city_senior_team_text">
                                        <span>Minister</span>
                                        <h5>Richard Renouf</h5>
                                        <a href="#">r.renouf@gov.je</a>
                                        <a href="#">01534 482016</a>
                                    </div>
                                </div>
                            </div>	
                            <div>
                                <div class="city_senior_team">
                                    <figure class="box">
                                        <div class="box-layer layer-1"></div>
                                        <div class="box-layer layer-2"></div>
                                        <div class="box-layer layer-3"></div>
                                        <img src="extra-images/senir-team-fig1.jpg" alt="">
                                    </figure>
                                    <div class="city_senior_team_text">
                                        <span>Chief Executive </span>
                                        <h5>Julie Garbutt</h5>
                                        <a href="#">r.renouf@gov.je</a>
                                        <a href="#">01534 482016</a>
                                    </div>
                                </div>
                            </div>	
                            <div>
                                <div class="city_senior_team">
                                    <figure class="box">
                                        <div class="box-layer layer-1"></div>
                                        <div class="box-layer layer-2"></div>
                                        <div class="box-layer layer-3"></div>
                                        <img src="extra-images/senir-team-fig2.jpg" alt="">
                                    </figure>
                                    <div class="city_senior_team_text">
                                        <span>Managing Director</span>
                                        <h5>Richard Renouf</h5>
                                        <a href="#">r.renouf@gov.je</a>
                                        <a href="#">01534 482016</a>
                                    </div>
                                </div>
                            </div>	
                            <div>
                                <div class="city_senior_team">
                                    <figure class="box">
                                        <div class="box-layer layer-1"></div>
                                        <div class="box-layer layer-2"></div>
                                        <div class="box-layer layer-3"></div>
                                        <img src="extra-images/senir-team-fig2.jpg" alt="">
                                    </figure>
                                    <div class="city_senior_team_text">
                                        <span>Managing Director</span>
                                        <h5>Richard Renouf</h5>
                                        <a href="#">r.renouf@gov.je</a>
                                        <a href="#">01534 482016</a>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="city_senior_team">
                                    <figure class="box">
                                        <div class="box-layer layer-1"></div>
                                        <div class="box-layer layer-2"></div>
                                        <div class="box-layer layer-3"></div>
                                        <img src="extra-images/senir-team-fig1.jpg" alt="">
                                    </figure>
                                    <div class="city_senior_team_text">
                                        <span>Managing Director</span>
                                        <h5>Richard Renouf</h5>
                                        <a href="#">r.renouf@gov.je</a>
                                        <a href="#">01534 482016</a>
                                    </div>
                                </div>
                            </div>						
                        </div>	
                    </div>
                    <!--CITY HEALTH2 TEXT WRAP END-->
                    
                    <!--CITY EVENT META START-->
                    <div class="city_event_meta">
                        <div class="city_event_tags">
                            <span>Tags:</span>
                            <span><a href="#">Audio</a> <a href="#">Conferences</a> <a href="#">Family</a></span>
                        </div>
                        <div class="city_top_social">
                            <span>Share:</span>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fa fa-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!--CITY EVENT META END-->
                </div>
                <div class="city_event_detail">
                    <div class="event_booking_form">
                        <h3 class="event_heading">Booking Foam</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="event_booking_field">
                                    <input type="text" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="event_booking_field">
                                    <input type="text" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="event_booking_field">
                                    <input type="text" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="event_booking_field">
                                    <select class="small">
                                        <option data-display="Are You Joining The Event ">Are You Joining The Event </option>
                                        <option value="1">All Event 1</option>
                                        <option value="2">All Event 2</option>
                                        <option value="4">All Event 3</option>
                                        <option value="4">All Event 4</option>
                                        <option value="4">All Event 5</option>
                                        <option value="4">All Event 6</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="event_booking_area">
                                    <textarea>Comments</textarea>
                                </div>
                                <a class="theam_btn btn2" href="#">Submit</a>
                            </div>
                        </div>
                    </div>
                </div>	
                <div class="event2_grid">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="event_grid_list responsive">
                                <div class="event_categories_list overlay">
                                    <div class="event_categories_date">
                                        <h5>07</h5>
                                        <p>Sep 2018</p>
                                    </div>
                                    <div class="event_categories_text">
                                        <h4><span>Big Ideas for Local </span>Cities Economies</h4>
                                        <a href="#"><i class="fa fa-map-marker"></i>10th Floors, Pantero Hotel</a>
                                    </div>
                                </div>
                                <div class="event_btn_center">
                                    <a class="theam_btn btn2 bg-color" href="#">Pervious Event</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="event_grid_list">
                                <div class="event_categories_list overlay">
                                    <div class="event_categories_date">
                                        <h5>07</h5>
                                        <p>Sep 2018</p>
                                    </div>
                                    <div class="event_categories_text">
                                        <h4><span>Big Ideas for Local </span>Cities Economies</h4>
                                        <a href="#"><i class="fa fa-map-marker"></i>10th Floors, Pantero Hotel</a>
                                    </div>
                                </div>
                                <div class="event_btn_center">
                                    <a class="theam_btn btn2 bg-color" href="#">Pervious Event</a>
                                </div>
                            </div>
                        </div>									
                    </div>			
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CITY EVENT2 WRAP END-->
@endsection
@section('scripts')

@endsection