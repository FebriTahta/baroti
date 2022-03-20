<footer id="footer-4" class="bg-color-01 footer division">
    <div class="container">

        <?php
            $profile = App\Models\Profile::first();
            $about   = App\Models\About::first();   
            $contact   = App\Models\Contact::first();
            $button = App\Models\Linkbutton::all();
        ?>
        <!-- FOOTER CONTENT -->
        <div class="row">


            <!-- FOOTER INFO -->
            <div class="col-md-5 col-lg-4">
                <div class="footer-info mb-40">

                    <!-- For Retina Ready displays take a image with double the amount of pixels that your image will be 
                    displayed (e.g 408 x 120  pixels) -->
                    <img src="{{asset('img_profile/'.$profile->image_header)}}" width="204" height="60" alt="footer-logo">

                    <!-- Text -->	
                    <p class="txt-color-05 mt-20">Bantal Aroma Terapy yang menggunakan bahan-bahan alami sebagai base pembuatannya.
                    </p>

                </div>	
            </div>	


            <!-- FOOTER CONTACTS -->
            <div class="col-md-4 col-lg-3 col-xl-3">
                <div class="footer-contacts mb-40">
                
                    <!-- Title -->
                    <h6 class="h6-lg txt-color-01">Let's Talk</h6>

                    <!-- Address -->
                    <p class="txt-color-05">Alamat :</p> 
                    <p class="txt-color-05">{!!$contact->alamat!!}</p>

                    <!-- Footer Contacts -->
                    <div class="txt-color-05 mt-15">
 
                        <!-- Email -->
                        <p class="foo-email">E:mail <a href="mailto:{{$contact->email}}">{{$contact->email}}</a> (click)</p>

                        <!-- Phone -->
                        <p>Phone : {{$contact->telp}}</p>

                    </div>

                </div>
            </div>


            <!-- FOOTER LINKS -->
            <div class="col-md-3 col-lg-2">
                <div class="footer-links mb-40">
                
                    <!-- Title -->
                    <h6 class="h6-lg txt-color-01">Quick Links</h6>

                    <!-- Footer Links -->
                    <ul class="txt-color-05 clearfix">
                        <li><p><a href="/">Home</a></p></li>	
                        <li><p><a href="{{route('fe.about')}}">About Us</a></p></li>	
                        <li><p><a href="{{route('fe.product')}}">Product</a></p></li>
                        <li><p><a href="{{route('fe.contact')}}">Contact</a></p></li>	
                    </ul>

                </div>
            </div>


            <!-- FOOTER IMAGES -->
            <div class="col-md-12 col-lg-3">
                <div class="footer-img mb-40">

                    <!-- Title -->
                    <h6 class="h6-lg txt-color-01">Media & Product Link</h6>

                    <!-- Instagram Images -->
                    <ul class="txt-color-05 clearfix">
                        @foreach ($button  as $button)
                        <li><p><a href="{{$button->link}}">{{$button->name}}</a></p></li>	
                        @endforeach
                    </ul>
                    <ul class="text-center clearfix">
                        
                        
                        
                        
                        {{-- <li><a href="#" target="_blank"><img class="insta-img" src="images/instagram/img-01.jpg" alt="insta-img"></a></li>
                        <li><a href="#" target="_blank"><img class="insta-img" src="images/instagram/img-02.jpg" alt="insta-img"></a></li>
                        <li><a href="#" target="_blank"><img class="insta-img" src="images/instagram/img-03.jpg" alt="insta-img"></a></li>
                        <li><a href="#" target="_blank"><img class="insta-img" src="images/instagram/img-04.jpg" alt="insta-img"></a></li>
                        <li><a href="#" target="_blank"><img class="insta-img" src="images/instagram/img-05.jpg" alt="insta-img"></a></li>
                        <li><a href="#" target="_blank"><img class="insta-img" src="images/instagram/img-06.jpg" alt="insta-img"></a></li>	 --}}
                    </ul>
                                            
                </div>
            </div>	<!-- END FOOTER IMAGES -->


        </div>	  <!-- END FOOTER CONTENT -->


        <!-- BOTTOM FOOTER -->
        <div class="bottom-footer txt-color-05">
            <div class="row d-flex align-items-center">


                <!-- FOOTER COPYRIGHT -->
                <div class="col-lg-6">
                    <div class="footer-copyright">
                        <p>&copy; 2022 BaRoTi</p>
                    </div>
                </div>


                <!-- BOTTOM FOOTER LINKS -->
                <?php $btn = App\Models\Linkbutton::all();?>
                <div class="col-lg-6">
                    <ul class="bottom-footer-list text-right clearfix">
                        @foreach ($btn as $item)
                        <li><p class="first-list-link"><a href="{{$item->link}}"><i class="fab fa-facebook-f"></i> {{$item->name}}</a></p></li>	
                        @endforeach
                    </ul>
                </div>


            </div>  <!-- End row -->
        </div>	<!-- END BOTTOM FOOTER -->


    </div>	   <!-- End container -->										
</footer>	<!-- END FOOTER-4 -->

</div> <!-- END PAGE CONTENT -->




<!-- EXTERNAL SCRIPTS
============================================= -->
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/modernizr.custom.js') }}"></script>
<script src="{{ asset('js/jquery.easing.js') }}"></script>
<script src="{{ asset('js/jquery.appear.js') }}"></script>
<script src="{{ asset('js/jquery.scrollto.js') }}"></script>
<script src="{{ asset('js/menu.js') }}"></script>
<script src="{{ asset('js/materialize.js') }}"></script>
<script src="{{ asset('js/tweenmax.min.js') }}"></script>
<script src="{{ asset('js/slideshow.js') }}"></script>
<script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('js/jquery.flexslider.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/hero-form.js') }}"></script>
<script src="{{ asset('js/contact-form.js') }}"></script>
<script src="{{ asset('js/comment-form.js') }}"></script>
<script src="{{ asset('js/booking-form.js') }}"></script>
<script src="{{ asset('js/jquery.datetimepicker.full.js') }}"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>	
<!-- Custom Script -->
<script src="{{ asset('js/custom.js') }}"></script>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!-- [if lt IE 9]>
<script src="js/html5shiv.js" type="text/javascript"></script>
<script src="js/respond.min.js" type="text/javascript"></script>
<![endif] -->

<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->
<!--
<script>
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-XXXXX-X']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
            '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();
</script>
-->




</body>



</html>
