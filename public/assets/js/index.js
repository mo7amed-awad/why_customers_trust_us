let navBar = document.getElementById("navBar");
let footer = document.getElementById("footer");

window.currentLang = window.location.pathname.split('/')[1] || 'ar';

window.changeLanguage = function () {
    const currentLang = window.currentLang;
    const newLang = currentLang === 'en' ? 'ar' : 'en';

    let currentPath = window.location.pathname;
    currentPath = currentPath.replace(/^\/(en|ar)(\/|$)/, '/');

    if (currentPath === '/') {
        currentPath = '';
    }

    const newPath = `/${newLang}${currentPath}`;

    console.log('Current Lang:', currentLang);
    console.log('New Lang:', newLang);
    console.log('New Path:', newPath);

    window.location.href = newPath;
};

const translations = {
    ar: {

        language: "En",
    },
    en: {
        language: "ع",
    }
};

function t(key) {
    return translations[window.currentLang][key] || key;
}

let navBarcontainer = `
<div class=" navContainer " style="z-index:11111">
  <nav class="container  navbar-expand-lg bg-body-tertiary text-black">

    <div class="row align-items-center justify-content-between px-2 ">
      <div class="col-lg-2 col-4">
        <a class="navbar-brand overflow-hidden  text-center  m-0" href="index.html">

          <img class="img-fluid w-auto" src="assets/imgs/home/logo.png" />
        </a>
      </div>
      <div class="col-lg-6 col-2 order-lg-0 order-3">
        <div class=" nav-container">
          <a class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars primary-color fs-3"></i>
          </a>
          <div class="offcanvas offcanvas-start " tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                <a class="navbar-brand   text-center  m-0" href="index.html">

                  <img class="m-0" width="img-fluid w-auto" style="max-width: 85px;" src="assets/imgs/home/logo.png" />
                </a>

              </h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="fa-solid fa-xmark text-black"></i>
              </button>
            </div>

            <div class="offcanvas-body header ">
              <ul
                class="navbar-nav w-100  mb-2 mb-lg-0  align-items-lg-center text-black gap-lg-4 gap-1">

                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.html">
                    <span class="">
Home 
                    </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="aboutUs.html">
                    <span class="">
               About Us
                    </span>
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link " aria-current="page" href="cars.html"><span class="">Cars</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " aria-current="page" href="contactus.html"><span class="">Contact Us
                    </span></a>
                </li>

                <li class="nav-item d-lg-none">
                  <a class="nav-link " aria-current="page" href="login.html"><span class="">تسجيل الدخول
                    </span></a>
                </li>
                <a class="nav-link d-lg-none" aria-current="page" href="register.html"><span class=""> انشاء حساب
                  </span></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-6 d-flex justify-content-end align-items-center gap-4">
        <div class="LanguageMenu d-flex justify-content-end gap-2" role="button" onclick="changeLanguage()" >
          <span class="lan" id="LanguageText">${t('language')}</span>
          <span class="">
            <i class="fa-solid fa-earth-americas"></i>
          </span>
        </div>
             <div class="d-lg-flex d-none justify-content-end  gap-2 " style="flex: 1;">
          <a href="/${window.currentLang}/register" style="flex: 1;"
            class=" text-center text-white bg-primary-color w-100 py-lg-2 py-1 rounded-3 fs-14">
     Sign Up
          </a>
          <a href="login.html" style="flex: 1;"
            class=" text-center bg-white border-color primary-color w-100 py-lg-2 py-1 rounded-3 fs-14">
         login
          </a>

        </div>
        <!-- if the user is IsAuthenticated remove d-none from this -->
        <div class="dropdown-center ">
          <a class="dropdown-toggle d-flex align-items-center gap-2" type="button" data-bs-toggle="dropdown"
            aria-expanded="false" data-bs-auto-close="outside">
            <span>
              <svg width="34" height="35" viewBox="0 0 34 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect y="0.5" width="34" height="34" rx="17" fill="#2969A8" />
                <path
                  d="M20.75 11.5C20.75 12.4946 20.3549 13.4484 19.6517 14.1517C18.9484 14.8549 17.9946 15.25 17 15.25C16.0054 15.25 15.0516 14.8549 14.3484 14.1517C13.6451 13.4484 13.25 12.4946 13.25 11.5C13.25 10.5054 13.6451 9.55161 14.3484 8.84835C15.0516 8.14509 16.0054 7.75 17 7.75C17.9946 7.75 18.9484 8.14509 19.6517 8.84835C20.3549 9.55161 20.75 10.5054 20.75 11.5ZM9.50101 25.618C9.53314 23.6504 10.3373 21.7742 11.7402 20.394C13.143 19.0139 15.0321 18.2405 17 18.2405C18.9679 18.2405 20.857 19.0139 22.2598 20.394C23.6627 21.7742 24.4669 23.6504 24.499 25.618C22.1464 26.6968 19.5882 27.2535 17 27.25C14.324 27.25 11.784 26.666 9.50101 25.618Z"
                  stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              </svg>

            </span>
            <span class="d-flex icon-svg"><svg width="12" height="6" viewBox="0 0 14 8" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M1 1L6.29289 6.29289C6.62623 6.62623 6.79289 6.79289 7 6.79289C7.20711 6.79289 7.37377 6.62623 7.70711 6.29289L13 1"
                  stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </span>
          </a>
          <ul class="dropdown-menu    py-lg-3 py-2 px-4 border-0 shadow-sm"
            style="background-color: rgba(240, 248, 255, 0.856);">
            <li class=" d-flex align-items-center dropdown-item fw-medium py-2">
              <span class="text-black fs-18"><svg width="20" height="22" viewBox="0 0 20 22" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M4.57757 14.4816C3.1628 15.324 -0.546635 17.0441 1.71266 19.1966C2.81631 20.248 4.04549 21 5.59087 21H14.4091C15.9545 21 17.1837 20.248 18.2873 19.1966C20.5466 17.0441 16.8372 15.324 15.4224 14.4816C12.1048 12.5061 7.89519 12.5061 4.57757 14.4816Z"
                    stroke="#2969A8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <path
                    d="M14.5 5.5C14.5 7.98528 12.4853 10 10 10C7.51472 10 5.5 7.98528 5.5 5.5C5.5 3.01472 7.51472 1 10 1C12.4853 1 14.5 3.01472 14.5 5.5Z"
                    stroke="#2969A8" stroke-width="1.5" />
                </svg>
              </span>
              <span class="px-1"><a class="text-black fs-16 text-decoration-none" href="myprofile.html">حسابي</a></span>
            </li>
            <li class=" d-flex align-items-center dropdown-item fw-medium py-2">
              <span class="text-black fs-18"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M2.52992 14.7696C2.31727 16.1636 3.268 17.1312 4.43205 17.6134C8.89481 19.4622 15.1052 19.4622 19.5679 17.6134C20.732 17.1312 21.6827 16.1636 21.4701 14.7696C21.3394 13.9129 20.6932 13.1995 20.2144 12.5029C19.5873 11.5793 19.525 10.5718 19.5249 9.5C19.5249 5.35786 16.1559 2 12 2C7.84413 2 4.47513 5.35786 4.47513 9.5C4.47503 10.5718 4.41272 11.5793 3.78561 12.5029C3.30684 13.1995 2.66061 13.9129 2.52992 14.7696Z"
                    stroke="#2969A8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M8 19C8.45849 20.7252 10.0755 22 12 22C13.9245 22 15.5415 20.7252 16 19" stroke="#2969A8"
                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>


              </span>
              <span class="px-2"><a class="text-black fs-16 text-decoration-none"
                  href="Notifications.html">الاشعارات</a></span>
            </li>

            <li class=" d-flex align-items-center dropdown-item fw-medium py-2">
              <span class=" fs-18"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M8 1.09502C8.45701 1.03241 8.92447 1 9.4 1C14.7019 1 19 5.02944 19 10C19 14.9706 14.7019 19 9.4 19C8.92447 19 8.45701 18.9676 8 18.905"
                    stroke="#2969A8" stroke-width="1.5" stroke-linecap="round" />
                  <path d="M1 10L11 10M1 10C1 9.29977 2.9943 7.99153 3.5 7.5M1 10C1 10.7002 2.9943 12.0085 3.5 12.5"
                    stroke="#2969A8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

              </span>
              <span class="px-2"><a class="text-black fs-16 text-decoration-none" href="">تسجيل الخروج</a></span>
            </li>

          </ul>

        </div>

      </div>
    </div>







  </nav>

</div>
<div class="floatwhatsapp ">
  <i class="fa-brands fa-whatsapp "></i>

</div>
<div class="back-to-top" id="backTop">
  <i class="fa-solid fa-chevron-up"></i>

</div>

`
navBar.innerHTML = navBarcontainer;

// $(document).ready(() => {
// $(window).scroll(function () {
// let windowScroll = $(window).scrollTop();
// if (windowScroll > 130) {
// $("#backTop").fadeIn(10).css("display", "flex");

// }
// else {
// $("#backTop").fadeOut(500)

// }
// })
// $("#backTop").click(function () {
// $("html,body").animate({ scrollTop: 0 }, 300)
// })
// });



let FooterContainer = `   <footer class=" ">


    <div class="container  py-lg-5 py-3">
      <div class="row justify-content-between" data-aos="fade-up">
        <div class="col-lg-3 col-sm-9 col-11 text-white  align-items-start gap-3 pb-md-1 pb-3">
          <a class="navbar-brand1 py-3 text-center  m-0" href="index-ar.html">
            <img class="w-auto" src="assets/imgs/home/logo.png" />
          </a>
             <p class="py-lg-4 py-2">DRB Arabia – وجهتك الأولى لتجربة تخييم استثنائية تجمع بين الطبيعة والفخامة. نوفر مخيمات وخدمات متكاملة تجعل رحلتك ذكرى لا تُنسى.</p>

          <h4 class="">follow us
          </h4>
          <ul class="social d-flex px-0">

            <li>
              <a target="_blank" href="https://x.com/sat7aapp"><i class="fab fa-twitter icon"></i></a>
            </li>
            <li>
              <a target="_blank" href="https://www.tiktok.com/@sat7a.app"><i class="fa-brands fa-tiktok icon">
                </i></a>
            </li>
            <li>
              <a target="_blank" href="https://www.instagram.com/sat7a.app"><i class="fa-brands fa-linkedin icon">
                </i></a>
            </li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 ">
          <h4 class="">Site Map
          </h4>
                    <ul class="p-0 fs-6 mb-0">
            <li class="py-1 col-6">
              <a href="index.html">
                Home
              </a>
            </li>
            <li class="py-1">
              <a href="aboutUs.html">
               About Us
              </a>
            </li>
            <li class="py-1">
              <a href="cars.html">
              Cars
              </a>
            </li>
            <li class="py-1">
              <a href="index.html">
               Contact Us
              </a>
            </li>


          </ul>

        </div>
      
         <div class="col-lg-2 col-md-4 col-sm-6 ">
          <h4 class="">Our Policies
          </h4>
                    <ul class="p-0 fs-6 mb-0">
            <li class="py-1 ">
              <a href="terms.html">
                Terms & Condition
              </a>
            </li>
            <li class="py-1">
              <a href="Policy.html">
              Privacy Policy
              </a>
            </li>
            <li class="py-1">
              <a href="faqs.html">
              FAQs
              </a>
            </li>
          </ul>

        </div>
         <div class="col-lg-3 col-md-12 ">
      <h4 class="mb-0 fw-semibold"> Contact
      </h4>

<ul class="p-0 fs-6 py-2">

        <li class="py-lg-1 py-2">
          <a href="tel:+97302961700"  class="d-flex align-items-center gap-3" target="_blank">
            <span>
<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M9.50246 4.25722C9.19873 3.4979 8.46332 3 7.64551 3H4.89474C3.8483 3 3 3.8481 3 4.89453C3 13.7892 10.2108 21 19.1055 21C20.1519 21 21 20.1516 21 19.1052L21.0005 16.354C21.0005 15.5361 20.5027 14.8009 19.7434 14.4971L17.1069 13.4429C16.4249 13.1701 15.6483 13.2929 15.0839 13.7632L14.4035 14.3307C13.6089 14.9929 12.4396 14.9402 11.7082 14.2088L9.79222 12.2911C9.06079 11.5596 9.00673 10.3913 9.66895 9.59668L10.2363 8.9163C10.7066 8.35195 10.8305 7.57516 10.5577 6.89309L9.50246 4.25722Z" stroke="black" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
</svg>

            </span>
            <span class="text-black">+973 02961700</span>
          </a>
        </li>
        <li class="py-lg-1 py-2">
          <a href="mailto:info@solutioners.com" class="d-flex align-items-center gap-3" target="_blank">
            <span>
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M14.1667 17.0832H5.83332C3.33332 17.0832 1.66666 15.8332 1.66666 12.9165V7.08317C1.66666 4.1665 3.33332 2.9165 5.83332 2.9165H14.1667C16.6667 2.9165 18.3333 4.1665 18.3333 7.08317V12.9165C18.3333 15.8332 16.6667 17.0832 14.1667 17.0832Z"
                  stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                  stroke-linejoin="round"></path>
                <path d="M14.1667 7.5L11.5583 9.58333C10.7 10.2667 9.29167 10.2667 8.43334 9.58333L5.83334 7.5"
                  stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                  stroke-linejoin="round"></path>
              </svg>

            </span>
            <span class="text-black pt-1">info@solutioners.com</span>
          </a>
        </li>
        <li class="py-lg-1 py-2">
                <a href="https://maps.app.goo.gl/WBLB5w2nFc1kxicU9" class="d-flex gap-2 align-items-center" target="_blank">
                  <span>
                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M2.80518 1.55545L18.6143 6.4198C19.4766 6.68511 19.5746 7.86635 18.7677 8.26981L12.0673 11.6199C11.8738 11.7167 11.7168 11.8736 11.62 12.0672L8.27004 18.7671C7.86658 19.5741 6.68555 19.4762 6.42024 18.614L1.55544 2.80486C1.31935 2.03759 2.0379 1.31937 2.80518 1.55545Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>

                  </span>
                  <span class=""> Khobar, Saudi Arabia.</span>
                </a>
              </li>
      </ul>

    </div>
      </div>
    </div>

    <div class="container py-3">

      <div class="row justify-content-center  text-black-50 py-2 gy-3 fw-medium border-top">
        <div class=" col-lg-8 col-md-6  col-12    emcan text-center">
            <span class="text-black fw-light">
              Copyright © 2025 Scoop Car All rights reserved. Powered by 
              <a style="color:black;opacity: 1; font-size:inherit" class='fw-semibold' target="_blank"
                href="https://emcan-group.com/en">
                Emcan Solutions</a>
  
            </span>
  
  
  
        </div>
  
  
  
  
      </div>

    </div>
  </footer>

`
footer.innerHTML = FooterContainer;





document.addEventListener("DOMContentLoaded", function () {
const offcanvasLinks = document.querySelectorAll(".offcanvas a");
const offcanvas = document.querySelector(".offcanvas");

offcanvasLinks.forEach((link) => {
link.addEventListener("click", function () {
const offcanvasInstance = bootstrap.Offcanvas.getInstance(offcanvas);
if (offcanvasInstance) {
offcanvasInstance.hide();
}
});
});
});

$(document).ready(() => {
$(window).scroll(function () {
let windowScroll = $(window).scrollTop();
if (windowScroll > 130) {
$("#backTop").fadeIn(10).css("display","flex");


}
else {
$("#backTop").fadeOut(500)

}
})
$("#backTop").click(function () {
$("html,body").animate({ scrollTop: 0 }, 300)
})
});
window.addEventListener('load', function() {
if (typeof AOS !== 'undefined') {
AOS.init({
once: true
});
}
});