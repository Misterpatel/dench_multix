@php
$sliders = App\Models\Slider::where('status', '1')->get();
@endphp

<div class="master-slider ms-skin-default" id="masterslider">
    @foreach($sliders as $slider)
    <div class="ms-slide slide-1" data-delay="9">
        <div class="slide-pattern"></div>

        <img src="{{ asset('storage/app/public/files/Slider/'.$slider->photo) }}" 
             data-src="{{ asset('storage/app/public/files/Slider/'.$slider->photo) }}" 
             alt="" />

        @if(!empty($slider->heading))
            <h3 class="ms-layer text35" style="top: 250px; left:230px;" data-type="text" data-delay="1000"
                data-ease="easeOutExpo" data-duration="1230" data-effect="top(250)">
                {{ $slider->heading }}
            </h3>
        @endif

        @if(!empty($slider->content))
            <h3 class="ms-layer text36" style="top: 320px; left:230px;" data-type="text" data-delay="1500"
                data-ease="easeOutExpo" data-duration="1230" data-effect="top(250)">
                {{ $slider->content }}
            </h3>
        @endif

        @if(!empty($slider->heading) || !empty($slider->content))
            <a href="{{ route('about') }}" class="ms-layer sbut14" style="left: 230px; top: 380px;" data-type="text"
                data-delay="2000" data-ease="easeOutExpo" data-duration="1200" data-effect="top(250)">
                Read more
            </a>
        @endif

    </div>
    @endforeach
</div>
