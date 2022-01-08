@php
$teams = \App\Models\Team::where("status", 1)->limit(3)->get();
@endphp
<section class="faq-area faq-about bg_cover pt-115 pb-120" style="background-image: url(/assets/images/faq-bg.jpg);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center">
                    <span>Get in touch</span>
                    <h3 class="title">Contact Us</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="faq-box-area faq-box-about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="faq-box white-bg">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="faq-accordion">
                                <div class="faq-accordion-content">
                                    <h4 class="title">Talk to Expert</h4>
                                </div>
                                @if($teams && count($teams) > 0)
                                @foreach($teams as $team)
                                <div class="media mb-4">
                                    <img src="{{ $team->image }}" class="mr-3" alt="{{ $team->name }}" style="height: 150px; width:150px; object-fit:contain;">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-2">{{ $team->name ?? '' }}</h5>
                                        <p>{{ $team->designation }}</p>
                                        <a href="tel:{{ $team->mobile }}" class="main-btn mt-2">Call Now</a>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="faq-form">
                                <div class="faq-title">
                                    <h4 class="title">Free Consultation</h4>
                                </div>
                                <form id="contact-form" method="POST">
                                    <p class="alert alert-success" id="success" style="display: none;"></p>
                                    <p class="alert alert-danger" id="error" style="display: none;"></p>
                                    <div class="input-box mt-20">
                                        <input type="text" placeholder="Name" name="name">
                                    </div>
                                    <div class="input-box mt-20">
                                        <input type="email" placeholder="Email" name="email">
                                    </div>
                                    <div class="input-box mt-20">
                                        <textarea name="message" cols="30" rows="10" placeholder="Messages"></textarea>
                                        <button class="main-btn mt-35" type="submit" id="cbtn">Send messages</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('script')
<script>
    $("#contact-form").submit(function(e) {
        e.preventDefault();
        $("#cbtn").html("Sending...");
        $("#cbtn").attr("disabled", "disabled");
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            url: '{{ route("contact") }}',
            data: $(this).serialize(),
            method: "POST",
            success: function(response) {
                if (response.status) {
                    $("#success").show("slow");
                    $("#success").html(response.message);
                    setTimeout(() => {
                        $("#success").hide("slow");
                    }, 5000);
                    $("#cbtn").html("Send Messages");
                    $("#cbtn").removeAttr("disabled");
                    document.querySelector("#contact-form").reset();
                }
            },
            error: function(response) {
                response = response.responseJSON;
                $("#error").show("slow");
                $('#error').html(response.message);
                setTimeout(() => {
                    $("#error").hide("slow");
                }, 5000);
                $("#cbtn").html("Send Messages");
                $("#cbtn").removeAttr("disabled");
            }
        });
    });
</script>
@endpush