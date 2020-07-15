@extends('layouts.app')

@section('content')
    <div class="science">
        <div class="image">
            <img src="{{ asset('public/image/science_s2.png') }}" class="frequency"/>
        </div>
        <section>
            <div class="h-100">
                <div class="row h-100 text-light text-center">
                    <div class="col-12 m-auto">
                        <h1 class="text-light" style="padding-bottom: 60px;">What is Magus?</h1>
                        <p>Magus Subliminals are user-friendly and effective audio self-development audio products
                            <br>that affects the user in safe, secure, positive, optimal and healthy ways
                        </p>
                        <div class="col-12 mx-auto">
                            <p>Magus Subliminals are professionally-made subliminals audios <br>
                              using standardard processes that are intricate and detailed in nature.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            {{-- <div class="container py-5"> --}}
                <div class="row m-auto text-center pt-5">
                    <div class="col-12">
                        <h1>About the logo</h1>
                    </div>
                </div>
                <div class="row" style="padding-bottom: 12%">
                    <div class="col-md-6 col-12 text-center">
                        <div class="row">
                            <div class="col-12">
                                <img src="{{ asset('public/image/deer.png') }}" alt="" class="img-fluid" width="250" height="250">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">"The Deer"</label>
                                <p>The Deer symbolizes spiritual purity and authority. The deer moves and walks in the life with a graceful and
                                    peaceful manner even while moving at full speed. This represents the idea that Magus Audio induces fast result while
                                    having peaceful and calming effect to the listener.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 text-center">
                        <div class="row">
                            <div class="col-12">
                                <img src="{{ asset('public/image/color.png') }}" alt="" class="img-fluid" width="250" height="250">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">The Color</label>
                                <p>The color Blue have a positive effect on mind and body. Blue represents depth, trust, loyalty, sincerity wisdom,
                                  confidence, stability, faith, heaven and intelligence.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- </div> --}}
        </section>
        <section>
            {{-- <div class="container p-5"> --}}
                <div class="row m-auto text-center py-5">
                    <div class="col-12">
                        <h1>What are Subliminal Audio?</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 text-center">
                        <div>
                            <label for="">Subliminal</label>
                            <p>means below the threshold of conscious perception.</p>
                        </div>
                        <div>
                            <label for="">Subliminal Audios</label>
                            <p>are recorded messages that are encoded in audio format that affects the subconscious mind
                              while bypassing the conscious mind entirely.
                            </p>  
                            <p>In this regard, subliminal audios can be used as
                              <b>Automatic Self-Development Tools</b> that will influence the listener's mind that changes the 
                              thoughts, patterns, behaviors, and actions. 
                            </p>  
                            <p>And this is the specialty of <b>Magus Audios</b>. 
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="row">
                            <div class="col-12">
                                <img src="{{ asset('public/image/science_s3_phone.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            {{-- </div> --}}
        </section>
        <section>
            {{-- <div class="container p-5"> --}}
                <div class="row m-auto text-center py-5">
                    <div class="col-12">
                        <h1>The Science of How Magus Subliminal Audio Works</h1>
                    </div>
                </div>
            {{-- </div> --}}
            <div class="container p-5">
                <div class="row text-center">
                    <div class="col-md-4 col-12">
                        <img src="{{ asset('public/image/science_s4_input.png') }}" alt="" class="img-fluid" width="150" height="150"><br>
                        <label for="">Input</label>
                        <p style="padding-left: 30px; padding-right: 30px;">-As the listener plays the audio, the messages bypasses the conscious mind and goes through the 
                          subconscious mind of the listener. 
                        </p>
                        <p style="padding-left: 30px; padding-right: 30px;">-Subliminal messages are stored in the subconscious mind to be processed.</p>
                    </div>
                    <div class="col-md-4 col-12">
                        <img src="{{ asset('public/image/science_s4_process.png') }}" alt="" class="img-fluid" width="150" height="150"><br>
                        <label for="">The Process</label>
                        <p style="padding-left: 30px; padding-right: 30px;">-Subliminal messages are processed fully on a subconscious level with or without the awareness of the listener.</p>
                        <p style="padding-left: 30px; padding-right: 30px;">-During processing, the messages are decoded by the subconscious mind and assimilated on a subconscious level.</p>
                        <p style="padding-left: 30px; padding-right: 30px;">-During the assimilation phase, the subconscious mind "reacts" to the message whether to "resist" or "accept" the changes.</p>
                        <p style="padding-left: 30px; padding-right: 30px;">-The thought is then assimilated on a person level. This is the standard way of how the mind changes.</p>
                    </div>
                    <div class="col-md-4 col-12">
                        <img src="{{ asset('public/image/science_s4_output.png') }}" alt="" class="img-fluid" width="150" height="150"><br>
                        <label for="">Output</label>
                        <p style="padding-left: 30px; padding-right: 30px;">-When the subconscious mind changes, conscious behavior and thinking changes as well.</p>
                        <p style="padding-left: 30px; padding-right: 30px;">-New thoughts are generated based on the new state of the subconscious mindz</p>
                    </div>
                </div>
                <div class="row py-5">
                    <div class="col-12 text-center">
                        <a href="javascript:void(0)">Click here  to know more about the Science & Creation Process of Subliminal Audio by Magus</a>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="h-100" style="padding-left: 60px;padding-right: 60px;">
                <div class="row h-100 text-light">
                    <div class="col-md-8 col-12 my-auto text-center order-md-1 order-2">
                        <h2>Magus for Everyone</h2>
                        <h1 class="text-light">Magus for Calmness and Peace</h1>
                        <p>Remove all stress and tensions in life and feast on peace and serenity</p>
                    </div>
                    <div class="col-lg-4 col-12 my-auto text-center order-md-2 order-1">
                        <div class="card m-5 mb-0 bg-transparent border-0">
                        <img src="{{ asset('public/image/science_s5_phone.png') }}" class="img-fluid">
                        </div> 
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection