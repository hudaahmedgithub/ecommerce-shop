<!-- New Letters ITEMS -->
<div class="newletters">
    <div class="container">
        <div class="newletters-container row">

            <div class="sub-head col-sm-12 col-md-6 col-lg-6">
                <div class="sub-headtxt">
                    <i class="fa fa-paper-plane-o"></i>
                    <h3>Follow Us For News</h3>
                    <p>Be Uptodate with our products and new features</p>
                </div>
            </div>


            <div class="social-icons col-sm-12 col-md-6 col-lg-6">
                <ul>
                    <li><a href="https://www.facebook.com/" title="Face Book">
                            <i class="fa fa-facebook"></i>facbook</a> |
                    </li>
                    <li><a href="https://twitter.com/" title="Twitter">
                            <i class="fa fa-twitter"></i>twitter</a> |
                    </li>
                    <li><a href="https://plus.google.com/u/" title="Google Plus">
                            <i class="fa fa-google-plus"></i>google plus</a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div> <!-- New Letters ITEMS -->





<div class="foot-lists">
    <ul class="text-center">
        @foreach ($categories as $category)
            <li><a href="">{{ $category->name }}</a></li>
        @endforeach
    </ul>
    <div class="payments">
        <img src="{{ url('imgs/payment.png') }}" alt="payments">
    </div>
</div>

<div class="footer">
    <p> &copy;2019 All Rights Reserved. Designed by
        <a class="mysite" href="http://4soft-eg.com">
            4Soft-Eg.com
        </a>.
    </p>
</div>
