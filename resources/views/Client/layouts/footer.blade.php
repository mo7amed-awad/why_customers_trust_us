<footer class="py-5 bg-secondary">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-md-12 col-lg-4">
                <a href="{{ route('client.home') }}">
                    <div class="mb-3 py-2">
                        <img src="{{ asset('assets/images/logo-white.png') }}" class="img-fluid" alt=""
                            width="">
                    </div>
                </a>

                <p class="text-white lh-160 fw-400">
                    {!! nl2br(setting('desc_' . lang())) !!}
                </p>


            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-12 col-lg-3 mt-5 mt-lg-0 d-flex flex-column">
                        <div class="mb-2">
                            <h5 class="text-white fw-600">{{ __('trans.sitemap') }}</h5>
                        </div>
                        <ul class="list-unstyled m-0 p-0">
                            <li class="py-2">
                                <a class="text-white text-decoration-none link-hover fw-400"
                                    href="{{ route('client.home') }}">{{ __('trans.home') }}</a>
                            </li>
                            <li class="py-2">
                                <a class="text-white text-decoration-none link-hover fw-400"
                                    href="{{ route('client.home') }}#about">{{ __('trans.about_us') }}</a>
                            </li>
                            <li class="py-2">
                                <a class="text-white text-decoration-none link-hover fw-400"
                                    href="{{ route('client.services') }}">{{ __('trans.Our Services') }}</a>
                            </li>
                            <li class="py-2">
                                <a class="text-white text-decoration-none link-hover fw-400"
                                    href="{{ route('client.home') }}#contact">{{ __('trans.contact_us') }}</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-12 col-lg-5 mt-5 mt-lg-0">
                        <div class="mb-4">
                            <h5 class="text-white fw-600">{{ __('trans.contact_us') }}</h5>
                        </div>
                        <div class="">
                            <ul class="list-unstyled m-0 p-0">
                                <li class="d-flex gap-2 py-2 link-hover">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                            viewBox="0 0 24 25" fill="none">
                                            <path
                                                d="M9.50246 4.75722C9.19873 3.9979 8.46332 3.5 7.64551 3.5H4.89474C3.8483 3.5 3 4.3481 3 5.39453C3 14.2892 10.2108 21.5 19.1055 21.5C20.1519 21.5 21 20.6516 21 19.6052L21.0005 16.854C21.0005 16.0361 20.5027 15.3009 19.7434 14.9971L17.1069 13.9429C16.4249 13.6701 15.6483 13.7929 15.0839 14.2632L14.4035 14.8307C13.6089 15.4929 12.4396 15.4402 11.7082 14.7088L9.79222 12.7911C9.06079 12.0596 9.00673 10.8913 9.66895 10.0967L10.2363 9.4163C10.7066 8.85195 10.8305 8.07516 10.5577 7.39309L9.50246 4.75722Z"
                                                stroke="white" stroke-width="1.8" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </svg>

                                    </span>
                                    <a class="text-decoration-none text-white mb-1" href="tel:{{ setting('phone') }}"
                                        dir="ltr">
                                        {{ setting('phone') }}
                                    </a>
                                </li>
                                <li class="d-flex gap-2 py-2 link-hover">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                            viewBox="0 0 24 25" fill="none">
                                            <path
                                                d="M4 6.5L10.1076 11.1123L10.1097 11.114C10.7878 11.6113 11.1271 11.8601 11.4988 11.9562C11.8272 12.0412 12.1725 12.0412 12.501 11.9562C12.8729 11.86 13.2132 11.6105 13.8926 11.1123C13.8926 11.1123 17.8101 8.10594 20 6.5M3 16.3002V8.7002C3 7.58009 3 7.01962 3.21799 6.5918C3.40973 6.21547 3.71547 5.90973 4.0918 5.71799C4.51962 5.5 5.08009 5.5 6.2002 5.5H17.8002C18.9203 5.5 19.4796 5.5 19.9074 5.71799C20.2837 5.90973 20.5905 6.21547 20.7822 6.5918C21 7.0192 21 7.57899 21 8.69691V16.3036C21 17.4215 21 17.9805 20.7822 18.4079C20.5905 18.7842 20.2837 19.0905 19.9074 19.2822C19.48 19.5 18.921 19.5 17.8031 19.5H6.19691C5.07899 19.5 4.5192 19.5 4.0918 19.2822C3.71547 19.0905 3.40973 18.7842 3.21799 18.4079C3 17.9801 3 17.4203 3 16.3002Z"
                                                stroke="white" stroke-width="1.8" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                    <a class="text-decoration-none text-white" href="mailto:{{ setting('email') }}"
                                        dir="">
                                        {{ setting('email') }}
                                    </a>
                                </li>
                                <li class="d-flex gap-2 py-2 link-hover">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M4.80518 3.55545L20.6143 8.4198C21.4766 8.68511 21.5746 9.86635 20.7677 10.2698L14.0673 13.6199C13.8738 13.7167 13.7168 13.8736 13.62 14.0672L10.27 20.7671C9.86658 21.5741 8.68555 21.4762 8.42024 20.614L3.55544 4.80486C3.31935 4.03759 4.0379 3.31937 4.80518 3.55545Z"
                                                stroke="white" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </svg>
                                    </span>

                                    <a class="text-decoration-none text-white" href="">
                                        {!! nl2br(setting('location_' . lang())) !!}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-4 mt-5 mt-lg-0">
                        <div class="mb-4">
                            <h5 class="text-white fw-600">{{ __('trans.social_networks') }}</h5>
                        </div>
                        <div class="d-flex mb-4 mb-md-4">
                            <ul class="list-unstyled mb-0 mt-0 m-0 p-0 gap-3 d-flex flex-nowrap">
                                <li>
                                    <a href="{{ setting('x') }}" class="text-decoration-none" target="_blank"
                                        rel="noopener noreferrer">
                                        <span
                                            class="text-white fs-5 border-0 social-icons rounded-circle rounded-2 link-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                                viewBox="0 0 21 21" fill="none">
                                                <path
                                                    d="M2.62512 18.3751L9.22996 11.7703M18.3751 2.62512L11.7703 9.22996M11.7703 9.22996L7.00012 2.62512H2.62512L9.22996 11.7703M11.7703 9.22996L18.3751 18.3751H14.0001L9.22996 11.7703"
                                                    stroke="#CD2E29" stroke-width="1.3125" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </span></a>
                                </li>
                                <li>
                                    <a href="{{ setting('tiktok') }}" class="text-decoration-none" target="_blank"
                                        rel="noopener noreferrer">
                                        <span
                                            class="text-white fs-5 border-0 social-icons rounded-circle rounded-2 link-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                                viewBox="0 0 21 21" fill="none">
                                                <path
                                                    d="M2.18738 10.4998C2.18738 6.58121 2.18738 4.62193 3.40472 3.40459C4.62205 2.18726 6.58133 2.18726 10.4999 2.18726C14.4184 2.18726 16.3777 2.18726 17.595 3.40459C18.8124 4.62193 18.8124 6.58121 18.8124 10.4998C18.8124 14.4183 18.8124 16.3776 17.595 17.5949C16.3777 18.8123 14.4184 18.8123 10.4999 18.8123C6.58133 18.8123 4.62205 18.8123 3.40472 17.5949C2.18738 16.3776 2.18738 14.4183 2.18738 10.4998Z"
                                                    stroke="#CD2E29" stroke-width="1.3125" stroke-linejoin="round" />
                                                <path
                                                    d="M9.09439 10.3053C9.45318 10.3567 9.78563 10.1074 9.83696 9.74863C9.88828 9.38985 9.63903 9.05739 9.28024 9.00607L9.18732 9.65571L9.09439 10.3053ZM15.3123 8.96845C15.6748 8.96845 15.9686 8.67463 15.9686 8.3122C15.9686 7.94976 15.6748 7.65595 15.3123 7.65595V8.3122V8.96845ZM12.4686 5.24969C12.4686 4.88726 12.1748 4.59344 11.8123 4.59344C11.4499 4.59344 11.1561 4.88726 11.1561 5.24969H11.8123H12.4686ZM11.8123 12.6872H11.1561C11.1561 14.0161 10.0788 15.0934 8.74982 15.0934V15.7497V16.4059C10.8036 16.4059 12.4686 14.741 12.4686 12.6872H11.8123ZM8.74982 15.7497V15.0934C7.42088 15.0934 6.34357 14.0161 6.34357 12.6872H5.68732H5.03107C5.03107 14.741 6.69601 16.4059 8.74982 16.4059V15.7497ZM5.68732 12.6872H6.34357C6.34357 11.3583 7.42088 10.2809 8.74982 10.2809V9.6247V8.96845C6.69601 8.96845 5.03107 10.6334 5.03107 12.6872H5.68732ZM8.74982 9.6247V10.2809C8.86717 10.2809 8.98219 10.2893 9.09439 10.3053L9.18732 9.65571L9.28024 9.00607C9.10667 8.98124 8.92954 8.96845 8.74982 8.96845V9.6247ZM15.3123 8.3122V7.65595C14.6346 7.65595 13.9056 7.37665 13.3487 6.91152C12.7924 6.44686 12.4686 5.852 12.4686 5.24969H11.8123H11.1561C11.1561 6.33876 11.7366 7.27515 12.5074 7.9189C13.2776 8.56218 14.2987 8.96845 15.3123 8.96845V8.3122ZM11.8123 5.24969H11.1561V12.6872H11.8123H12.4686V5.24969H11.8123Z"
                                                    fill="#CD2E29" />
                                            </svg>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ setting('facebook') }}" class="text-decoration-none" target="_blank"
                                        rel="noopener noreferrer">
                                        <span
                                            class="text-white fs-5 border-0 social-icons rounded-circle rounded-2 link-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                                viewBox="0 0 21 21" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.40921 9.04191C4.55368 9.04191 4.37512 9.20978 4.37512 10.0141V11.4725C4.37512 12.2768 4.55367 12.4447 5.40921 12.4447H7.47739V18.278C7.47739 19.0824 7.65595 19.2502 8.51149 19.2502H10.5797C11.4352 19.2502 11.6138 19.0824 11.6138 18.278V12.4447H13.936C14.5849 12.4447 14.7521 12.3261 14.9303 11.7396L15.3735 10.2812C15.6789 9.27643 15.4907 9.04191 14.3792 9.04191H11.6138V6.61136C11.6138 6.07441 12.0767 5.63913 12.6478 5.63913H15.591C16.4466 5.63913 16.6251 5.47126 16.6251 4.66691V2.72247C16.6251 1.91811 16.4466 1.75024 15.591 1.75024H12.6478C9.79229 1.75024 7.47739 3.92664 7.47739 6.61136V9.04191H5.40921Z"
                                                    stroke="#CD2E29" stroke-width="1.3125" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ setting('snapchat') }}" class="text-decoration-none" target="_blank"
                                        rel="noopener noreferrer">
                                        <span
                                            class="text-white fs-5 border-0 social-icons rounded-circle rounded-2 link-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                                viewBox="0 0 21 21" fill="none">
                                                <path
                                                    d="M5.75398 6.497C5.75398 3.87564 7.87901 1.75061 10.5004 1.75061C13.1217 1.75061 15.2468 3.87564 15.2468 6.497C15.2468 10.6513 15.4538 12.728 19.2504 14.3895C17.3059 14.8756 16.8198 15.3617 16.3337 17.3062C12.9309 17.3062 12.4448 19.2506 10.5004 19.2506C8.55592 19.2506 8.06981 17.3062 4.66703 17.3062C4.18092 15.3617 3.69481 14.8756 1.75037 14.3895C5.54689 12.728 5.75398 10.6513 5.75398 6.497Z"
                                                    stroke="#CD2E29" stroke-width="1.3125" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M1.75037 14.001C5.09598 12.1785 5.09598 10.4575 2.58677 7.87604"
                                                    stroke="#CD2E29" stroke-width="1.3125" stroke-linecap="round" />
                                                <path d="M19.2504 14.001C15.9048 12.1785 15.9048 10.4575 18.414 7.87604"
                                                    stroke="#CD2E29" stroke-width="1.3125" stroke-linecap="round" />
                                            </svg>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="text-white" style="border-top: 1px solid #f6f6f6 !important"></div>
    </div>

    <div class="container">
        <div class="d-flex justify-content-lg-between justify-content-center  flex-wrap text-center mt-3 mb-0">
            <h6 class="text-white fw-normal fw-400 mt-3 mb-0">

                <a href="" class="text-white text-decoration-none fw-400" target="_blank">
                    {{ setting('title_' . lang()) }}
                </a>
                {{ __('trans.copyrights') }}
            </h6>
            <h6 class="text-white fw-normal fw-400 mt-3 mb-0">
                {{ __('trans.powered_by') }}
                <a href="https://emcan-group.com" class="text-white fw-700 text-decoration-none" target="_blank">
                    Emcan</a>
            </h6>
        </div>
    </div>

</footer>
