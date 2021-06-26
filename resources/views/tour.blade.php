@extends('layouts.app-body')

@section('content')
		<!-- Tour Detail-->
		<section class="blog_area single-post-area section-padding">
            <div class="container">
               <div class="row">
                  <div class="col-lg-9 posts-list">
                     <div class="single-post">
                        <div class="p-heading">
                            <div class="p-title">
                                <h1>Salta &amp; Jujuy: Best of Northwestern Argentina</h1>
                            </div>
                                <div class="main-review">
                                <span class="m-stars" id="tour-stars">
                                            <!--Star Rating-->
                                    <span class="s-holder">
                                        <i data-alt="1" class="icon-star-on" title="Excellent"></i>
                                        <i data-alt="2" class="icon-star-on" title="Excellent"></i>
                                        <i data-alt="3" class="icon-star-on" title="Excellent"></i>
                                        <i data-alt="4" class="icon-star-on" title="Excellent"></i>
                                        <i data-alt="5" class="icon-star-on" title="Excellent"></i>
                                    </span>
                                    <i>5.0</i>
                                </span>
                                <span class="r-based">{{ trans('messages.base_on') }}<a href="javascript:void(0)" id="scroll-to-reviews"> 3 {{ trans('messages.reviews') }}</a></span>
                            </div>
                        </div>
                        <div class="blog_details">
                            <div class="feature-img">
                                <div class="mySlides">
                                    <div class="numbertext">1 / 3</div>
                                    <img class="img-fluid" src="{{ asset('assets/images/destinations/h.jpg') }}" alt="">
                                </div>
                                <div class="mySlides">
                                    <div class="numbertext">2 / 3</div>
                                    <img class="img-fluid" src="{{ asset('assets/images/destinations/hanoi.jpg') }}" alt="">
                                </div>
                                <div class="mySlides">
                                    <div class="numbertext">3 / 3</div>
                                    <img class="img-fluid" src="{{ asset('assets/images/destinations/sapa.jpg') }}" alt="">
                                </div>
                                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                <a class="next" onclick="plusSlides(1)">&#10095;</a>
                            </div>
                            <h1 style="color:#fff;"></h1>
                            <div class="row">
                                <div class="col-xxs-12 col-xs-6 mt">
                                    <div class="col-xxs-12 col-xs-6 mt">
                                        <div class="input-field">
                                            <label for="destination">{{ trans('messages.status') }}:</label>
                                            <h1 style="font-size: 16px;">{{ trans('messages.instant') }}</h1>
                                        </div>
                                    </div>
                                    <div class="col-xxs-12 col-xs-6 mt">
                                        <div class="input-field">
                                            <label for="destination">{{ trans('messages.duration') }}:</label>
                                            <h1 style="font-size: 16px;">4 {{ trans('messages.days') }}</h1>
                                        </div>
                                    </div>
                                    <div class="col-xxs-12 col-xs-6 mt">
                                        <div class="input-field">
                                            <label for="destination">{{ trans('messages.max_group') }}:</label>
                                            <h1 style="font-size: 16px;">30 {{ trans('messages.people') }}</h1>
                                        </div>
                                    </div>
                                    <div class="col-xxs-12 col-xs-6 mt">
                                        <div class="input-field">
                                            <label for="destination">{{ trans('messages.age') }}:</label>
                                            <h1 style="font-size: 16px;">3+ {{ trans('messages.yearsold') }}</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxs-12 col-xs-6 mt">
                                    <div class="offer offer-radius offer-danger">
                                            <div class="offer-content">
                                                <h3 class="lead">
                                                {{ trans('messages.from') }}
                                                </h3>
                                                <h1>
                                                    US$ 620
                                                </h1>
                                        </div>
                                        <div class="bookbtn">
                                            <a href="book_tour.html" class="a-btn">
                                                <span>{{ trans('messages.book_now') }}</span>
                                            </a>

                                        </div>

                                </div>
                                </div>
                            </div>
                           <div class="quote-wrapper">
                              <div class="quotes">
                                 MCSE boot camps have its supporters and its detractors. Some people do not understand why you
                                 should have to spend money on boot camp when you can get the MCSE study materials yourself at
                                 a fraction of the camp price. However, who has the willpower to actually sit through a
                                 self-imposed MCSE training.
                              </div>
                           </div>
                           <h1>{{ trans('messages.itinerary') }}</h1>
                           <p>
                              MCSE boot camps have its supporters and its detractors. Some people do not understand why you
                              should have to spend money on boot camp when you can get the MCSE study materials yourself at a
                              fraction of the camp price. However, who has the willpower
                           </p>
                           <p>
                              MCSE boot camps have its supporters and its detractors. Some people do not understand why you
                              should have to spend money on boot camp when you can get the MCSE study materials yourself at a
                              fraction of the camp price. However, who has the willpower to actually sit through a
                              self-imposed MCSE training. who has the willpower to actually
                           </p>
                        </div>
                     </div>

                     <div class="blog-author">
                     </div>
                     <div class="comments-area">
                        <h4>05 {{ trans('messages.comments') }}</h4>
                        <div class="comment-list">
                           <div class="single-comment justify-content-between d-flex">
                              <div class="user justify-content-between d-flex">
                                 <div class="thumb">
                                    <img src="{{ asset('assets/images/comment/comment_1.png') }}" alt="">
                                 </div>
                                 <div class="desc">
                                    <p class="comment">
                                       Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                                       Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                                    </p>
                                    <div class="d-flex justify-content-between">
                                       <div class="d-flex align-items-center">
                                          <h5>
                                             <a href="#">Emilly Blunt</a>
                                          </h5>
                                          <p class="date">December 4, 2017 at 3:12 pm </p>
                                       </div>
                                       <div class="reply-btn">
                                          <a href="#" class="btn-reply text-uppercase">{{ trans('messages.reply') }}</a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="comment-list">
                           <div class="single-comment justify-content-between d-flex">
                              <div class="user justify-content-between d-flex">
                                 <div class="thumb">
                                    <img src="{{ asset('assets/images/comment/comment_2.png') }}" alt="">
                                 </div>
                                 <div class="desc">
                                    <p class="comment">
                                       Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                                       Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                                    </p>
                                    <div class="d-flex justify-content-between">
                                       <div class="d-flex align-items-center">
                                          <h5>
                                             <a href="#">Emilly Blunt</a>
                                          </h5>
                                          <p class="date">December 4, 2017 at 3:12 pm </p>
                                       </div>
                                       <div class="reply-btn">
                                          <a href="#" class="btn-reply text-uppercase">{{ trans('messages.reply') }}</a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="comment-list">
                           <div class="single-comment justify-content-between d-flex">
                              <div class="user justify-content-between d-flex">
                                 <div class="thumb">
                                    <img src="{{ asset('assets/images/comment/comment_3.png') }}" alt="">
                                 </div>
                                 <div class="desc">
                                    <p class="comment">
                                       Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                                       Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                                    </p>
                                    <div class="d-flex justify-content-between">
                                       <div class="d-flex align-items-center">
                                          <h5>
                                             <a href="#">Emilly Blunt</a>
                                          </h5>
                                          <p class="date">December 4, 2017 at 3:12 pm </p>
                                       </div>
                                       <div class="reply-btn">
                                          <a href="#" class="btn-reply text-uppercase">{{ trans('messages.reply') }}</a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3">
                     <div class="blog_right_sidebar">

                        <aside class="single_sidebar_widget post_category_widget">
                           <h4 class="widget_title">{{ trans('messages.customer_support') }}</h4>
                           <ul class="list cat-list">
                              <li>
                                    <p>{{ trans('messages.hotline') }}: +84905123456</p>
                              </li>
                              <li>
                                    <p>Email: tour@gmail.com</p>
                              </li>
                              <li>
                                    <p>{{ trans('messages.address') }}: 14 Ly Thuong Kiet, Hai Chau, Da Nang</p>
                              </li>
                           </ul>
                        </aside>

                        <aside class="single_sidebar_widget newsletter_widget">
                           <h4 class="widget_title">{{ trans('messages.why_us') }}</h4>
                                <li>
                                    <p>{{ trans('messages.r1') }}</p>
                                </li>
                                <li>
                                    <p>{{ trans('messages.r2') }}</p>
                                </li>
                                <li>
                                    <p>{{ trans('messages.r3') }}</p>
                                </li>
                                <li>
                                    <p>{{ trans('messages.r4') }}</p>
                                </li>
                                <li>
                                    <p>{{ trans('messages.r5') }}</p>
                                </li>
                        </aside>
                     </div>
                  </div>
               </div>
            </div>
         </section>
@endsection
