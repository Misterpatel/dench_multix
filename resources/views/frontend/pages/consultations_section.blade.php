@if(in_array($default_page->page_name, ['second','six']))
<section class="consultations-wrapper section-padding bg-contain pb-0" style="background-image: url('assets/img/circle-bg-2.png');display:{{$home->home_contactAbout_status=='show' ? '' : 'none'}}">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 col-xl-5">
                <h1>{{ $home->home_contactAbout_title ?? ''}}</h1>
                <p class="mt-3">{{ $home->home_contactAbout_subtitle ?? ''}}</p>

                <div class="call-consultation mt-30 mb-40">
                    <div class="icon">
                        <i class="fal fa-phone-plus"></i>
                    </div>
                    <div class="content">
                        <span>Phone Number</span>
                        <h5><a href="tel:+{{ $home->home_contactAbout_phone ?? '#'}}">+{{ $home->home_contactAbout_phone ?? '7854878545'}}</a></h5>
                    </div>
                </div> 
            </div>

            <div class="col-12 col-lg-6 col-xl-6 offset-xl-1">
                <div class="consultations-form text-white">
                    <p>let’s talk with us</p>
                    <h1>Free Consultations</h1>
                    <form action="#" id="frontendContactForm" method="post"> 
                        <input type="text" name="name" id="name" placeholder="Full Name Here">
                        <input type="email" name="email" id="email" placeholder="Email Address">
                        <input type="text" name="subject" id="subject" placeholder="Enter Subject">
                        <textarea name="message" id="message" placeholder="Write Message"></textarea>
                        <button class="theme-btn frontendContactbtn" type="submit">Get Free Quote <i class="fas fa-arrow-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@if(in_array($default_page->page_name, ['third']))
<section class="about-us-wrapper section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6 col-12">
                <div class="section-title style-3 mb-30">
                    <span>about</span>
                    <p>About Company</p>
                    <h1>Get’s IT Solutions For <br>
                        Expert Consultants</h1>
                </div>
                
                <div class="about-icon-box">
                    <div class="icon">
                        <i class="fal fa-users"></i>
                    </div>
                    <div class="content">
                        <h3>Professinoal Consultants</h3>
                        <p>Quis autem vel eum iure reprehenderit 
                            quin voluptate velit esse quam</p>
                    </div>
                </div>

                <div class="about-icon-box">
                    <div class="icon">
                        <i class="fal fa-desktop"></i>
                    </div>
                    <div class="content">
                        <h3>Digital IT Solutions</h3>
                        <p>Quis autem vel eum iure reprehenderit 
                            quin voluptate velit esse quam</p>
                    </div>
                </div> 

            </div>

            <div class="col-lg-6 col-xl-6 col-12 offset-xl-1">
                <div class="consultations-form style-2 bg-cover" style="background-image: url('assets/img/cs-form-bg.jpg')">
                    <p>let’s talk with us</p>
                    <h1>Free Consultations</h1>
                    <form action="#" id="frontendContactForm" method="post"> 
                        <input type="text" name="name" id="name" placeholder="Full Name Here">
                        <input type="email" name="email" id="email" placeholder="Email Address">
                        <input type="text" name="subject" id="subject" placeholder="Enter Subject">
                        <textarea name="message" id="message" placeholder="Write Message"></textarea>
                        <button class="theme-btn frontendContactbtn" type="submit">Get Free Quote <i class="fas fa-arrow-right"></i></button>
                    </form>
                </div>
            </div>  
        </div>
    </div>
</section>  
@endif