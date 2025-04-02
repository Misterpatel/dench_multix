@if(in_array($default_page->page_name, ['first','second']))
<section class="our-team-wrapper section-padding" style="display:{{ $meta->home_team_status=='show' ? '' : 'none'}}">
    <div class="container">
        <div class="row align-items-center mb-40">
            <div class="col-12 col-md-6">
                <div class="section-title">
                    <p>Exclusive Members</p>
                    <h1>Meet Our Experience Team Members</h1>
                </div>
            </div>
            <div class="col-12 col-md-6 mt-3 mt-md-0 text-md-right">
                <a href="#" class="theme-btn off-white">View all Member <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>

        <div class="team-members-list row">
            @if (!@empty($teamMembers)) 
            @foreach ($teamMembers as $teamMember)
            <div class="col-12 col-md-6 col-xl-3">
                <div class="single-team-member">
                    <div class="member-img bg-cover bg-center" style="background-image: url('{{asset('storage/app/public/files/team_member/' . $teamMember->photo) }}')">
                    </div>
                    <div class="member-bio">
                        <h4>{{ $teamMember->name }}</h4>
                        <p>{{ $teamMember->designation }}</p>
                    </div>
                    <div class="social-profile">
                        <a href="{{ $teamMember->facebook }}"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ $teamMember->twitter }}"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-behance"></i></a>
                        <a href="{{ $teamMember->youtube }}"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section> 
@endif


@if (in_array($default_page->page_name, ['fourth']))
<section class="our-team-wrapper section-bg-2 section-padding bg-contain" style="background-image: url('assets/img/cta5.png')">
    <div class="container">
        <div class="row align-items-center mb-40">
            <div class="col-12 col-md-7 text-center text-md-left">
                <div class="section-title">
                    <p>Exclusive Members</p>
                    <h1>Meet Our Experience <br> Team Members</h1>
                </div>
            </div>
            <div class="col-12 col-md-5 mt-4 mt-md-0 text-center text-md-right">
                <a href="#3" class="theme-btn">View all Member <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>

        <div class="row">
            @if (!@empty($teamMembers))
            @foreach ($teamMembers as $teamMember)
            <div class="col-12 col-md-6 col-xl-3">
                <div class="single-member-card">
                    <div class="member-img bg-cover bg-center" style="background-image: url('{{asset('storage/app/public/files/team_member/' . $teamMember->photo) }}')">
                    </div>
                    <div class="member-bio">
                        <h4>{{ $teamMember->name }}</h4>
                        <p>{{ $teamMember->designation }}</p>
                    </div>
                    <div class="social-profile">
                        <a href="{{ $teamMember->facebook }}"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ $teamMember->twitter }}"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-behance"></i></a>
                        <a href="{{ $teamMember->youtube }}"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
 @endforeach
            @endif
        </div>
    </div>
</section> 
@endif

@if (in_array($default_page->page_name, ['fivth']))
<section class="our-team-wrapper techex-landing-page">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 text-center">
                <div class="section-title">
                    <a class="theme-btn-sm mb-15" data-aos="fade-up">MEET OUR EXPERT TEAM</a>
                    <h1 data-aos="fade-up" data-aos-delay="100">Meet Our Experience Team Members</h1>
                </div>
            </div>
        </div>

        <div class="row">
            @if (!@empty($teamMembers))
            @foreach ($teamMembers as $teamMember)
            <div class="col-12 col-md-6 col-xl-3" data-aos="fade-up">
                <div class="single-member-card style-2">
                    <div class="member-img bg-cover bg-center" style="background-image: url('{{asset('storage/app/public/files/team_member/' . $teamMember->photo) }}')">
                    </div>
                    <div class="member-bio">
                        <h4>{{ $teamMember->name }}</h4>
                        <p>{{ $teamMember->designation }}</p>
                    </div>
                    <div class="social-profile">
                        <span>Follow on</span>
                        <a href="{{ $teamMember->facebook }}"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ $teamMember->twitter }}"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-behance"></i></a>
                        <a href="{{ $teamMember->youtube }}"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
 @endforeach
            @endif
        </div>
    </div>
</section>
@endif