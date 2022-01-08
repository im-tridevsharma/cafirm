@php
$teams = \App\Models\Team::where("status", 1)->get();
@endphp

@if($teams && count($teams) > 0)
<section class="team-2-area team-about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title section-title-2">
                    <span>Meet Our Team</span>
                    <h3 class="title">Our Creative Team</h3>
                </div>
            </div>
        </div>
        <div class="row team-active">
            @if($teams && count($teams) > 0)
            @foreach($teams as $team)
            <div class="col-lg-4">
                <div class="team-item mt-30 mr-100">
                    <div class="team-thumb">
                        <img src="{{ $team->image }}" alt="{{ $team->name }}">
                    </div>
                    <div class="team-content pl-55">
                        <h5 class="title">{{ $team->name }}</h5>
                        <span>{{ $team->designation }}</span>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endif