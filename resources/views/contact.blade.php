@extends('layouts.index')

@section('main')
    <main class="container rounded" style="background-color: rgba(225,226,220, 0.9);">
        <section id="contact-us">
            <h1 class="pt-3">
                Get in Touch!
                <div class="horizontal-line mt-2"></div>
            </h1>
            
            <!-- contact info -->
            <div class="container">
                <div class="contact-info">
                    <div class="specific-info">
                        <i class="fas fa-home"></i>
                        <div>
                            <p class="fw-bold">Bengaluru, Karnataka</p>
                            <p class="fw-bold">India</p>
                        </div>
                    </div>
                    <div class="specific-info">
                        <i class="fas fa-phone-alt"></i>
                        <div>
                            <a href="" class="fw-bold">+91 8235518944 </a>
                            <p class="fw-bold">Mon to Fri 9am-6pm</p>
                        </div>
                    </div>
                    <div class="specific-info">
                        <i class="fas fa-envelope-open-text"></i>
                        <div>
                            <a href="mailto:info@UiMonk.co.ke">
                                <p class="title">panditgourav452@gmail.com</p>
                            </a>
                            <p class="fw-bold">Send us your query anytime!</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="contact-form">
                    <form action="" method="">
                        <!-- Name -->
                        <label for="name" class="required-field"><span class="fw-bold">Name</span></label>
                        <input type="text" id="name" placeholder="Write your Name" name="name" value="" required />

                        <!-- Email -->
                        <label for="email" class="required-field"><span class="fw-bold">Email</span></label>
                        <input type="text" id="email" placeholder="Email" name="email" value="" required />

                        <!-- Subject -->
                        <label for="subject" class="required-field"><span class="fw-bold">Subject</span></label>
                        <input type="text" id="Subject" name="subject" placeholder="Subject" value="" required />

                        <!-- Message -->
                        <label for="message" class="required-field"><span class="fw-bold">Message</span></label>
                        <textarea id="message" name="message" placeholder="Write youe Message..." required></textarea>

                        <!-- Button -->
                        {{-- <input type="submit" value="Submit" /> --}}
                        <div class="text-center">
                            <button type="submit" class="button-29 mb-3 mx-auto">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection
