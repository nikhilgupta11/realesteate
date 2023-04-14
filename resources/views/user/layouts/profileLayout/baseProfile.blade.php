@extends('user/layouts/parts/master')
@section('content')
<div class="togglebtn">
    <a id="sidepanel-toggler1" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img">
            <title>Menu</title>
            <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
        </svg>
    </a> 
</div>
<div id="app-sidepanel1" class='dashboard container'>
    <div id="sidepanel-drop1" class="sidepanel-drop"></div>
    <div class="dashboard-nav">
        <nav class="dashboard-nav-list">
            <a href="{{ route('ProfileUser') }}" class="dashboard-nav-item active">
                <i class="fas fa-tachometer-alt"></i> Profile
            </a>
            <a href="{{ route('viewwishlist') }}" class="dashboard-nav-item">
                <i class="fas fa-tachometer-alt"></i> Wishlist
            </a>

            <a href="{{ route('userPropertyCreate') }}" class="dashboard-nav-item"><i class="fas fa-file-upload"></i> Add Property </a>

            <a href="{{ route('userPropertyList')}}" class="dashboard-nav-item"><i class="fas fa-cogs"></i> Listing Properties </a>
            <a href="{{ route('userEnquiry') }}" class="dashboard-nav-item">
                <i class="fas fa-tachometer-alt"></i> Enquiries
            </a>
            <div class="nav-item-divider"></div>
            <a href="{{ route('user_change_password') }}" class="dashboard-nav-item">
                <i class="fas fa-tachometer-alt"></i> Change Password
            </a>
            <a href="{{ route('customLogout') }}" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> Logout </a>
        </nav>
    </div>
    <div class='dashboard-app'>
        <div class='dashboard-content'>
            <div class="profile-container">
                @yield('baseprofile')
            </div>
        </div>
    </div>
</div>

<script>
    const sidePanelToggler = document.getElementById('sidepanel-toggler1');
    const sidePanel = document.getElementById('app-sidepanel1');
    const sidePanelDrop = document.getElementById('sidepanel-drop1');
    const sidePanelClose = document.getElementById('sidepanel-close1');

    window.addEventListener('load', function() {
        responsiveSidePanel();
    });

    window.addEventListener('resize', function() {
        responsiveSidePanel();
    });


    function responsiveSidePanel() {
        let w = window.innerWidth;
        if (w >= 1200) {
            // if larger 
            //console.log('larger');
            sidePanel.classList.remove('sidepanel-hidden');
            sidePanel.classList.add('sidepanel-visible');

        } else {
            // if smaller
            //console.log('smaller');
            sidePanel.classList.remove('sidepanel-visible');
            sidePanel.classList.add('sidepanel-hidden');
        }
    };

    sidePanelToggler.addEventListener('click', () => {
        if (sidePanel.classList.contains('sidepanel-visible')) {
            console.log('visible');
            sidePanel.classList.remove('sidepanel-visible');
            sidePanel.classList.add('sidepanel-hidden');

        } else {
            console.log('hidden');
            sidePanel.classList.remove('sidepanel-hidden');
            sidePanel.classList.add('sidepanel-visible');
        }
    });



    sidePanelClose.addEventListener('click', (e) => {
        e.preventDefault();
        sidePanelToggler.click();
    });

    sidePanelDrop.addEventListener('click', (e) => {
        sidePanelToggler.click();
    });
</script>

<style>
    :root {
        --font-family-sans-serif: "Open Sans", -apple-system, BlinkMacSystemFont,
            "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji",
            "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    }

    *,
    *::before,
    *::after {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    html {
        font-family: sans-serif;
        line-height: 1.15;
        -webkit-text-size-adjust: 100%;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    }

    nav {
        display: block;
    }

    body {
        margin: 0;
        font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI",
            Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji",
            "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #515151;
        text-align: left;
        background-color: #e9edf4;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        margin-top: 0;
        margin-bottom: 0.5rem;
    }

    p {
        margin-top: 0;
        margin-bottom: 1rem;
    }

    a {
        color: #3f84fc;
        text-decoration: none;
        background-color: transparent;
    }

    a:hover {
        color: #0458eb;
        text-decoration: underline;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6 {
        font-family: "Nunito", sans-serif;
        margin-bottom: 0.5rem;
        font-weight: 500;
        line-height: 1.2;
    }

    h1,
    .h1 {
        font-size: 2.5rem;
        font-weight: normal;
    }

    .card {
        position: relative;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.125);
        border-radius: 0;
    }

    .card-body {
        -webkit-box-flex: 1;
        -webkit-flex: 1 1 auto;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 1.25rem;
    }

    .card-header {
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        background-color: rgba(0, 0, 0, 0.03);
        border-bottom: 1px solid rgba(0, 0, 0, 0.125);
        text-align: center;
    }

    .card-header h2 {
        text-align: left;
    }

    .togglebtn {
        margin-top: 80px;
        display: none;
    }

    .dashboard {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        min-height: 100vh;
        padding: 0;
        background: white;

    }

    .dashboard.container {
        margin: 32px auto;
    }

    .dashboard-app {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-flex: 2;
        -webkit-flex-grow: 2;
        -ms-flex-positive: 2;
        flex-grow: 2;
        /* margin-top: 84px; */
    }

    @media (max-width: 1200px) {
        .dashboard {
            margin-top: 112px!important;
        }

        .dashboard-app {
            margin-top: 0;
        }
    }

    .dashboard-content {
        -webkit-box-flex: 2;
        -webkit-flex-grow: 2;
        -ms-flex-positive: 2;
        flex-grow: 2;
        padding: 25px;
    }

    .dashboard-nav {
        min-width: 238px;
        /* position: fixed; */
        left: 0;
        top: 0;
        bottom: 0;
        overflow: auto;
        padding: 0;
        background-color: #373193;
    }

    .dashboard-compact .dashboard-nav {
        display: none;
    }

    .dashboard-nav header {
        min-height: 84px;
        padding: 8px 27px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
    }

    .dashboard-nav header .menu-toggle {
        display: none;
        margin-right: auto;
    }

    .dashboard-nav a {
        color: #515151;
    }

    .dashboard-nav a:hover {
        text-decoration: none;
    }

    .dashboard-nav {
        background-color: #4491d3;
    }

    .dashboard-nav a {
        color: #fff;
    }

    .brand-logo {
        font-family: "Nunito", sans-serif;
        font-weight: bold;
        font-size: 20px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        color: #515151;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
    }

    .brand-logo:focus,
    .brand-logo:active,
    .brand-logo:hover {
        color: #dbdbdb;
        text-decoration: none;
    }

    .brand-logo i {
        color: #d2d1d1;
        font-size: 27px;
        margin-right: 10px;
    }

    .dashboard-nav-list {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
    }

    .dashboard-nav-item {
        min-height: 56px;
        padding: 8px 20px 8px 70px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        letter-spacing: 0.02em;
        transition: ease-out 0.5s;
    }

    .dashboard-nav-item i {
        width: 36px;
        font-size: 19px;
        margin-left: -40px;
    }

    .dashboard-nav-item:hover {
        background: rgba(255, 255, 255, 0.15);
    }

    .active {
        background: rgba(0, 0, 0, 0.1);
    }

    .dashboard-nav-dropdown {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
    }

    .dashboard-nav-dropdown.show {
        background: rgba(255, 255, 255, 0.04);
    }

    .dashboard-nav-dropdown.show>.dashboard-nav-dropdown-toggle {
        font-weight: bold;
    }

    .dashboard-nav-dropdown.show>.dashboard-nav-dropdown-toggle:after {
        -webkit-transform: none;
        -o-transform: none;
        transform: none;
    }

    .dashboard-nav-dropdown.show>.dashboard-nav-dropdown-menu {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
    }

    .dashboard-nav-dropdown-toggle:after {
        content: "";
        margin-left: auto;
        display: inline-block;
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 5px solid rgba(81, 81, 81, 0.8);
        -webkit-transform: rotate(90deg);
        -o-transform: rotate(90deg);
        transform: rotate(90deg);
    }

    .dashboard-nav .dashboard-nav-dropdown-toggle:after {
        border-top-color: rgba(255, 255, 255, 0.72);
    }

    .dashboard-nav-dropdown-menu {
        display: none;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
    }

    .dashboard-nav-dropdown-item {
        min-height: 40px;
        padding: 8px 20px 8px 70px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        transition: ease-out 0.5s;
    }

    .dashboard-nav-dropdown-item:hover {
        background: rgba(255, 255, 255, 0.04);
    }

    .menu-toggle {
        position: relative;
        width: 42px;
        height: 42px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        color: #443ea2;
    }

    .menu-toggle:hover,
    .menu-toggle:active,
    .menu-toggle:focus {
        text-decoration: none;
        color: #875de5;
    }

    .menu-toggle i {
        font-size: 20px;
    }

    .dashboard-toolbar {
        min-height: 84px;
        background-color: #dfdfdf;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        padding: 8px 27px;
        position: fixed;
        top: 0;
        right: 0;
        left: 0;
        z-index: 1000;
    }

    .nav-item-divider {
        height: 1px;
        margin: 1rem 0;
        overflow: hidden;
        background-color: rgba(236, 238, 239, 0.3);
    }

    @media (min-width: 992px) {
        /* .dashboard-app {
            margin-left: 238px;
        } */

        .dashboard-compact .dashboard-app {
            margin-left: 0;
        }
    }


    @media (max-width: 768px) {
        .dashboard-content {
            padding: 15px 0px;
        }
    }

    @media (max-width: 992px) {
        .dashboard {
            margin-top: 0!important;
        }

        .togglebtn {
            display: block;
        }

        .sidepanel-toggler {
            padding: 8px;
            color: #4491d3;
            display: block
        }

        .dashboard-nav {
            display: none;
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            z-index: 1070;
        }

        .dashboard-app {
            margin-top: 20px;
        }

        .dashboard.sidepanel-visible .dashboard-nav {
            width: 238px;
            display: block;
            top: 80px;
        }

        .dashboard-nav.mobile-show {
            display: block;
        }

        .sidepanel-visible .sidepanel-drop {
            position: fixed;
            display: block;
            min-height: 100vh;
            height: 100%;
            width: 100%;
            min-width: 100vw;
            left: 0;
            top: 0;
            background: rgba(0, 0, 0, 0.35);
            Z-index: 1000;
        }
    }

    @media (max-width: 992px) {
        .dashboard-nav header .menu-toggle {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
        }
    }

    @media (min-width: 992px) {
        .dashboard-toolbar {
            left: 238px;
        }

        .dashboard-compact .dashboard-toolbar {
            left: 0;
        }
    }
</style>

<script>
    const mobileScreen = window.matchMedia("(max-width: 990px )");
    $(document).ready(function() {
        $(".dashboard-nav-dropdown-toggle").click(function() {
            $(this).closest(".dashboard-nav-dropdown")
                .toggleClass("show")
                .find(".dashboard-nav-dropdown")
                .removeClass("show");
            $(this).parent()
                .siblings()
                .removeClass("show");
        });
        $(".menu-toggle").click(function() {
            if (mobileScreen.matches) {
                $(".dashboard-nav").toggleClass("mobile-show");
            } else {
                $(".dashboard").toggleClass("dashboard-compact");
            }
        });
    });
</script>
@endsection('content')