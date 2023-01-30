@extends('layout')

@section('content')

    <!-- START SECTION UI ELEMENT -->
    <section class="ui-element">
        <div class="container">
            <section class="headings-2 pt-0 hee bg-white">
                <div class="pro-wrapper">
                    <div class="detail-wrapper-body">
                        <div class="listing-title-bar">
                            <div class="text-heading text-left">
                                <p><a href="index.html">Home </a> &nbsp;/&nbsp; <span>UI Elements</span></p>
                            </div>
                            <h3>UI Elements</h3>
                        </div>
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-6 col-md-6 mb70">
                    <h5 class="uppercase mb40">Accordions</h5>
                    <ul class="accordion accordion-1 one-open">
                        <li class="active">
                            <div class="title">
                                <span>Simple Panels</span>
                            </div>
                            <div class="content">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                            </div>
                        </li>
                        <li>
                            <div class="title">
                                <span>Toggle Information</span>
                            </div>
                            <div class="content">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                            </div>
                        </li>
                        <li>
                            <div class="title">
                                <span>Nice Touch</span>
                            </div>
                            <div class="content">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                            </div>
                        </li>
                    </ul>
                    <!--end of accordion-->
                </div>
                <div class="col-lg-6 col-md-6 mb70">
                    <h5 class="uppercase mb40">Tabs</h5>
                    <div class="tabbed-content button-tabs">
                        <ul class="tabs">
                            <li class="active">
                                <div class="tab-title">
                                    <span>Tab 1</span>
                                </div>
                                <div class="tab-content">
                                    <p>
                                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores.
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="tab-title">
                                    <span>Tab 2</span>
                                </div>
                                <div class="tab-content">
                                    <p>
                                        Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="tab-title">
                                    <span>Tab 3</span>
                                </div>
                                <div class="tab-content">
                                    <p>
                                        At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est.
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="tab-title">
                                    <span>Tab 4</span>
                                </div>
                                <div class="tab-content">
                                    <p>
                                        Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!--end of button tabs-->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 mb70">
                    <h5 class="uppercase mb40">Table</h5>
                    <table class="basic-table">
                        <tr>
                            <th>Column 1</th>
                            <th>Column 2</th>
                        </tr>
                        <tr>
                            <td data-label="Column 1">Item</td>
                            <td data-label="Column 2">Description</td>
                        </tr>
                        <tr>
                            <td data-label="Column 1">Item</td>
                            <td data-label="Column 2">Description</td>
                        </tr>
                        <tr>
                            <td data-label="Column 1">Item</td>
                            <td data-label="Column 2">Description</td>
                        </tr>
                        <tr>
                            <td data-label="Column 1">Item</td>
                            <td data-label="Column 2">Description</td>
                        </tr>
                    </table>
                    <!--end of table-->
                </div>
                <div class="col-lg-6 col-md-6 mb70">
                    <h5 class="uppercase mb40">Notifications</h5>
                    <div class="notification error closeable">
                        <p><span>Error!</span> Please fill in all the fields required.</p>
                        <a class="close" href="#"></a>
                    </div>

                    <div class="notification success closeable">
                        <p><span>Success!</span> You did it, now relax and enjoy it.</p>
                        <a class="close" href="#"></a>
                    </div>

                    <div class="notification warning closeable">
                        <p><span>Warning!</span> Change this and that and try again.</p>
                        <a class="close" href="#"></a>
                    </div>

                    <div class="notification notice closeable">
                        <p><span>Notice!</span> Please edit the information below.</p>
                        <a class="close" href="#"></a>
                    </div>
                    <!--end of notifications-->
                </div>
            </div>
            <div class="row ui-buttons mb70">
                <div class="col-lg-12 col-md-12">
                    <h5 class="uppercase mb40">Buttons</h5>
                    <div class="d-inline-flex justify-content-center align-items-center flex-wrap group-20 mb40">
                        <button class="btn btn-primary ml-0">Primary</button>
                        <button class="btn btn-secondary">Secondary</button>
                        <button class="btn btn-warning">Warning</button>
                        <button class="btn btn-danger">Danger</button>
                        <button class="btn btn-dark">Dark</button>
                        <button class="btn btn-outline btn-primary">Outlined</button>
                        <button class="link link-secondary">Link</button>
                    </div>
                    <h4 class="mb-4 effect">Hover Effects</h4>
                    <div class="d-inline-flex justify-content-center align-items-center flex-wrap group-20">
                        <button class="btn btn-primary btn-anis ml-0">Primary</button>
                        <button class="btn btn-secondary btn-anis">Secondary</button>
                        <button class="btn btn-warning btn-anis">Warning</button>
                        <button class="btn btn-danger btn-anis">Danger</button>
                        <button class="btn btn-dark btn-anis">Dark</button>
                    </div>
                    <div class="d-inline-flex justify-content-center align-items-center flex-wrap group-20 mb40">
                        <button class="btn btn-outline btn-primary btn-anis ml-0">Primary</button>
                        <button class="btn btn-outline btn-secondary btn-anis">Secondary</button>
                        <button class="btn btn-outline btn-warning btn-anis">Warning</button>
                        <button class="btn btn-outline btn-danger btn-anis">Danger</button>
                        <button class="btn btn-outline btn-dark btn-anis">Dark</button>
                    </div>
                    <h4 class="mb-4 effect">Button with icon</h4>
                    <div class="mt-0">
                        <div class="d-inline-flex justify-content-center align-items-center flex-wrap group-20">
                            <button class="btn btn-lg btn-primary ml-0"><i class="fas fa-check"></i><span>Button</span></button>
                            <button class="btn btn-primary"><i class="fas fa-check"></i><span>Button</span></button>
                            <button class="btn btn-sm btn-primary"><i class="fas fa-check"></i><span>Button</span></button>
                            <button class="link link-secondary"><i class="fas fa-check"></i> Button</button>
                        </div>
                    </div>
                    <div class="mt-0">
                        <div class="d-inline-flex justify-content-center align-items-center flex-wrap group-20">
                            <button class="btn btn-lg btn-primary ml-0"><span>Button</span><i class="fas fa-check"></i></button>
                            <button class="btn btn-primary"><span>Button</span><i class="fas fa-check"></i></button>
                            <button class="btn btn-sm btn-primary"><span>Button</span><i class="fas fa-check"></i></button>
                            <button class="link link-secondary">Button <i class="fas fa-check"></i></button>
                        </div>
                    </div>
                </div>
                <!--end of buttons-->
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 mb70 formelements">
                    <h5 class="uppercase mb40">Form Elements (Tex Inputs)</h5>
                    <input type="text" placeholder="Input with Placeholder" />
                    <input type="password" placeholder="Password Input" />
                    <textarea placeholder="Textarea" rows="3"></textarea>
                    <div class="input-with-label text-left">
                        <span>Input With Outer Label:</span>
                        <input type="text" />
                    </div>
                    <!--end of form elements-->
                </div>
                <div class="col-lg-6 col-md-6">
                    <h5 class="uppercase mb40">Form Elements (Options Inputs)</h5>
                    <div class="select-option">
                        <i class="ti-angle-down"></i>
                        <select>
                            <option selected value="Default">Select An Option</option>
                            <option value="Small">Small</option>
                            <option value="Medium">Medium</option>
                            <option value="Larger">Large</option>
                        </select>
                    </div>
                    <!--end select-->
                    <form class="mb24">
                        <span>Would you like to hear about checkboxes?</span>
                        <div class="checkbox-option pull-right">
                            <div class="inner"></div>
                            <input type="checkbox" name="checkbox" value="Checkbox" />
                        </div>
                    </form>
                    <hr>
                    <form>
                        <h4>Sign-up to mailing list?</h4>
                        <div class="the-check-list">
                            <div class="radio-option checked mr-2">
                                <div class="inner"></div>
                                <input type="radio" name="radio" value="radio1" />
                            </div>
                            <span class="mt-1">Yes</span>
                        </div>
                        <div class="the-check-list">
                            <div class="radio-option mr-2">
                                <div class="inner"></div>
                                <input type="radio" name="radio" value="radio1" />
                            </div>
                            <span class="mt-1">No</span>
                        </div>
                        <div class="the-check-list">
                            <div class="radio-option mr-2">
                                <div class="inner"></div>
                                <input type="radio" name="radio" value="radio1" />
                            </div>
                            <span class="mt-1">Maybe</span>
                        </div>
                    </form>
                    <div class="form-elemts">
                        <input type="submit" value="Submit Button" />
                    </div>
                </div>
            </div>
            <div class="row ui-buttons mb70">
                <div class="col-lg-6 col-md-6 theskills">
                    <h5 class="uppercase mb40">Progress Bars</h5>
                    <div class="skills">
                        <div class="row">
                            <div class="col-12">
                                <h3>Property for Sale</h3>
                                <div id="bar1" class="barfiller">
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                    <span class="fill" data-percentage="95"></span>
                                </div>
                                <h3>Property for Rent</h3>
                                <div id="bar2" class="barfiller">
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                    <span class="fill" data-percentage="90"></span>
                                </div>
                                <h3>Tax Solution</h3>
                                <div id="bar3" class="barfiller">
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                    <span class="fill" data-percentage="85"></span>
                                </div>
                                <h3>Business Plan</h3>
                                <div id="bar4" class="barfiller">
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                    <span class="fill" data-percentage="80"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 countdown">
                    <h5 class="uppercase mb40">Countdowns</h5>
                    <div class="countdown-boxed" data-countdown='{"to":"2019-12-31"}'>
                        <div class="countdown-block countdown-block-days">
                            <div class="countdown-wrap">
                                <div class="countdown-counter" data-counter-days="">00</div>
                                <div class="countdown-title">days</div>
                            </div>
                        </div>
                        <div class="countdown-block countdown-block-hours">
                            <div class="countdown-wrap">
                                <div class="countdown-counter" data-counter-hours="">00</div>
                                <div class="countdown-title">hours</div>
                            </div>
                        </div>
                        <div class="countdown-block countdown-block-minutes">
                            <div class="countdown-wrap">
                                <div class="countdown-counter" data-counter-minutes="">00</div>
                                <div class="countdown-title">minutes</div>
                            </div>
                        </div>
                        <div class="countdown-block countdown-block-seconds">
                            <div class="countdown-wrap">
                                <div class="countdown-counter" data-counter-seconds="">00</div>
                                <div class="countdown-title">seconds</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 main-search-field-2 bg-white mt-5">
                        <div class="range-slider bg-white">
                            <h4 class="mb-4 effect">Range Slider</h4>
                            <input type="text" disabled class="slider_amount m-t-lg-30 m-t-xs-0 m-t-sm-10">
                            <div class="slider-range"></div>
                        </div>
                    </div>
                </div>
                <!--end of Countdowns-->
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 mb70">
                    <h5 class="uppercase mb40">Typography</h5>
                    <p class="h1 mb-5">h1. Bootstrap heading</p>
                    <p class="h3 mb-5">h3. Bootstrap heading</p>
                    <p class="h5">h5. Bootstrap heading</p>
                    <!--end of table-->
                </div>
                <div class="col-lg-6 col-md-6 mb70">
                    <h5 class="uppercase mb40">Typography</h5>
                    <p class="h2 mb-5">h2. Bootstrap heading</p>
                    <p class="h4 mb-5">h4. Bootstrap heading</p>
                    <p class="h6">h6. Bootstrap heading</p>
                    <!--end of typography-->
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION UI ELEMENT -->

    <!-- START FOOTER -->
    <footer class="first-footer">
        <div class="top-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="netabout">
                            <a href="index.html" class="logo">
                                <img src="{{ asset('assets/images/logo-footer.svg') }}" alt="netcom">
                            </a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum incidunt architecto soluta laboriosam, perspiciatis, aspernatur officiis esse.</p>
                        </div>
                        <div class="contactus">
                            <ul>
                                <li>
                                    <div class="info">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <p class="in-p">95 South Park Avenue, USA</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="info">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        <p class="in-p">+456 875 369 208</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="info">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                        <p class="in-p ti">support@findhouses.com</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="navigation">
                            <h3>Navigation</h3>
                            <div class="nav-footer">
                                <ul>
                                    <li><a href="index.html">Home One</a></li>
                                    <li><a href="properties-right-sidebar.html">Properties Right</a></li>
                                    <li><a href="properties-full-list.html">Properties List</a></li>
                                    <li><a href="properties-details.html">Property Details</a></li>
                                    <li class="no-mgb"><a href="agents-listing-grid.html">Agents Listing</a></li>
                                </ul>
                                <ul class="nav-right">
                                    <li><a href="agent-details.html">Agents Details</a></li>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="blog.html">Blog Default</a></li>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                    <li class="no-mgb"><a href="contact-us.html">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget">
                            <h3>Twitter Feeds</h3>
                            <div class="twitter-widget contuct">
                                <div class="twitter-area">
                                    <div class="single-item">
                                        <div class="icon-holder">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </div>
                                        <div class="text">
                                            <h5><a href="#">@findhouses</a> all share them with me baby said inspet.</h5>
                                            <h4>about 5 days ago</h4>
                                        </div>
                                    </div>
                                    <div class="single-item">
                                        <div class="icon-holder">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </div>
                                        <div class="text">
                                            <h5><a href="#">@findhouses</a> all share them with me baby said inspet.</h5>
                                            <h4>about 5 days ago</h4>
                                        </div>
                                    </div>
                                    <div class="single-item">
                                        <div class="icon-holder">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </div>
                                        <div class="text">
                                            <h5><a href="#">@findhouses</a> all share them with me baby said inspet.</h5>
                                            <h4>about 5 days ago</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="newsletters">
                            <h3>Newsletters</h3>
                            <p>Sign Up for Our Newsletter to get Latest Updates and Offers. Subscribe to receive news in your inbox.</p>
                        </div>
                        <form class="bloq-email mailchimp form-inline" method="post">
                            <label for="subscribeEmail" class="error"></label>
                            <div class="email">
                                <input type="email" id="subscribeEmail" name="EMAIL" placeholder="Enter Your Email">
                                <input type="submit" value="Subscribe">
                                <p class="subscription-success"></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="second-footer">
            <div class="container">
                <p>2021 © Copyright - All Rights Reserved.</p>
                <ul class="netsocials">
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </footer>

    <a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
    <!-- END FOOTER -->

    <!--register form -->
    <div class="login-and-register-form modal">
        <div class="main-overlay"></div>
        <div class="main-register-holder">
            <div class="main-register fl-wrap">
                <div class="close-reg"><i class="fa fa-times"></i></div>
                <h3>Welcome to <span>Find<strong>Houses</strong></span></h3>
                <div class="soc-log fl-wrap">
                    <p>Login</p>
                    <a href="#" class="facebook-log"><i class="fa fa-facebook-official"></i>Log in with Facebook</a>
                    <a href="#" class="twitter-log"><i class="fa fa-twitter"></i> Log in with Twitter</a>
                </div>
                <div class="log-separator fl-wrap"><span>Or</span></div>
                <div id="tabs-container">
                    <ul class="tabs-menu">
                        <li class="current"><a href="#tab-1">Login</a></li>
                        <li><a href="#tab-2">Register</a></li>
                    </ul>
                    <div class="tab">
                        <div id="tab-1" class="tab-contents">
                            <div class="custom-form">
                                <form method="post" name="registerform">
                                    <label>Username or Email Address * </label>
                                    <input name="email" type="text" onClick="this.select()" value="">
                                    <label>Password * </label>
                                    <input name="password" type="password" onClick="this.select()" value="">
                                    <button type="submit" class="log-submit-btn"><span>Log In</span></button>
                                    <div class="clearfix"></div>
                                    <div class="filter-tags">
                                        <input id="check-a" type="checkbox" name="check">
                                        <label for="check-a">Remember me</label>
                                    </div>
                                </form>
                                <div class="lost_password">
                                    <a href="#">Lost Your Password?</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab">
                            <div id="tab-2" class="tab-contents">
                                <div class="custom-form">
                                    <form method="post" name="registerform" class="main-register-form" id="main-register-form2">
                                        <label>First Name * </label>
                                        <input name="name" type="text" onClick="this.select()" value="">
                                        <label>Second Name *</label>
                                        <input name="name2" type="text" onClick="this.select()" value="">
                                        <label>Email Address *</label>
                                        <input name="email" type="text" onClick="this.select()" value="">
                                        <label>Password *</label>
                                        <input name="password" type="password" onClick="this.select()" value="">
                                        <button type="submit" class="log-submit-btn"><span>Register</span></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--register form end -->

@endsection
