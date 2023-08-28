<div class="map_sec">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <iframe class="map_frame"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3719.3308154968886!2d72.83470151548903!3d21.218726485895605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04ee8c2c34845%3A0x17961f91f6edb62c!2sKiran+Multispeciality+Hospital!5e0!3m2!1sen!2sin!4v1491886101175"
                    width="620" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            @php
                $setting = App\Models\Setting::get();
                $HELPLINE = collect($setting)
                    ->where('setting_key', 'HELPLINE_NUMBER')
                    ->first();
                $email = collect($setting)
                    ->where('setting_key', 'EMAIL')
                    ->first();
                $whatsapp = collect($setting)
                    ->where('setting_key', 'WHATSAPP_NUMBER')
                    ->first();
            @endphp
            <div class="col-lg-6 mb-3">
                <div class="map_contact_box">
                    <div class="container">
                        <div class="contact_heading">
                            <h1>Contact Kiran Hospital</h1>
                            <svg class="line" width="90" height="9" viewBox="0 0 90 9" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.02431 7.09212C30.0244 6.09216 52.5242 0.592169 87.8787 2.46593"
                                    stroke="#F3B21F" stroke-width="3" stroke-linecap="round"></path>
                            </svg>
                            <p>No matter which part of the world you are in, you can now contact Kiran
                                Hospital's
                                International
                                Patient Care Department to be your dedicated point of contact for all health
                                related
                                queries.
                            </p>
                        </div>
                        <div class="contact_info pt-4">
                            <div class="d-sm-flex mb-4">
                                <div class="contact_circle">
                                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M9.01282 10.0565C12.1011 13.144 12.8018 9.57211 14.7681 11.5371C16.6638 13.4323 17.7534 13.812 15.3515 16.2131C15.0507 16.4549 13.1392 19.3638 6.42149 12.6479C-0.297023 5.93129 2.61012 4.01783 2.85197 3.71706C5.25963 1.30924 5.63279 2.40514 7.5285 4.30032C9.49485 6.26613 5.9245 6.96903 9.01282 10.0565Z"
                                            stroke="#487FFD" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <div class="contact_details">
                                    <p class="mb-0">Dedicated Help Line</p>
                                    <h5>
                                        @if (Request::routeIs('international_patient_care'))
                                            <a class="call" href="tel: +91 97264 32010" style="color: white;">+91
                                                97264 32010</a>
                                        @else
                                            <a class="call" href="tel: {{ $HELPLINE->setting_value }}"
                                                style="color: white;">{{ $HELPLINE->setting_value }}</a>
                                        @endif
                                    </h5>
                                </div>
                            </div>

                            <div class="d-sm-flex mb-4">
                                <div class="contact_circle">
                                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.945 7.25195L10.5051 10.0491C9.85512 10.5648 8.9407 10.5648 8.29077 10.0491L4.82178 7.25195"
                                            stroke="#F54A65" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M13.1756 16.6581C15.5302 16.6646 17.1172 14.7301 17.1172 12.3524V7.03492C17.1172 4.65723 15.5302 2.72266 13.1756 2.72266H5.57483C3.22023 2.72266 1.6333 4.65723 1.6333 7.03492V12.3524C1.6333 14.7301 3.22023 16.6646 5.57483 16.6581H13.1756Z"
                                            stroke="#F54A65" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <div class="contact_details">
                                    <p class="mb-0">Email</p>
                                    <h5>
                                        @if (\Request::route()->getName() == 'careers' || Request::routeIs('career_form'))
                                            <a class="call" href="mailto:careers@kiranhospital.com"
                                                style="color: white;">careers@kiranhospital.com<a>
                                                @else
                                                    <a class="call" href="mailto:inquiry@kiranhospital.com"
                                                        style="color: white;">inquiry@kiranhospital.com</a>
                                        @endif
                                    </h5>
                                </div>
                            </div>

                            {{-- <div class="d-sm-flex mb-4">
                                <div class="contact_circle">
                                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_913_7845)">
                                            <path d="M14.8332 4.20217C14.1234 3.48521 13.278 2.91675 12.3462 2.52995C11.4144 2.14315 10.4149 1.94575 9.40607 1.94926C5.17897 1.94926 1.73381 5.39443 1.73381 9.62152C1.73381 10.9764 2.08994 12.2925 2.75575 13.4538L1.67188 17.4331L5.73639 16.3648C6.85897 16.9764 8.12091 17.3015 9.40607 17.3015C13.6332 17.3015 17.0783 13.8564 17.0783 9.62927C17.0783 7.57765 16.2809 5.64991 14.8332 4.20217V4.20217ZM9.40607 16.0009C8.26026 16.0009 7.13768 15.6912 6.15446 15.1106L5.9222 14.9712L3.50671 15.606L4.14929 13.2525L3.99446 13.0125C3.35787 11.996 3.01985 10.8209 3.01897 9.62152C3.01897 6.10668 5.88349 3.24217 9.39833 3.24217C11.1016 3.24217 12.7041 3.90797 13.9041 5.11572C14.4983 5.70717 14.9692 6.41068 15.2895 7.18547C15.6097 7.96025 15.7731 8.7909 15.7699 9.62927C15.7854 13.1441 12.9209 16.0009 9.40607 16.0009V16.0009ZM12.9054 11.2318C12.7119 11.1389 11.7674 10.6744 11.597 10.6047C11.419 10.5428 11.2951 10.5118 11.1635 10.6977C11.0319 10.8912 10.668 11.3247 10.5596 11.4486C10.4512 11.5802 10.3351 11.5957 10.1416 11.4951C9.948 11.4022 9.32865 11.1931 8.60091 10.5428C8.028 10.0318 7.64865 9.40475 7.53252 9.2112C7.42413 9.01765 7.51704 8.91701 7.61768 8.81636C7.70284 8.7312 7.81123 8.59185 7.90413 8.48346C7.99704 8.37507 8.03575 8.28991 8.09768 8.16604C8.15962 8.03443 8.12865 7.92604 8.0822 7.83314C8.03575 7.74023 7.64865 6.79572 7.49381 6.40862C7.33897 6.03701 7.17639 6.08346 7.06026 6.07572H6.68865C6.55704 6.07572 6.35575 6.12217 6.17768 6.31572C6.00736 6.50927 5.51187 6.97378 5.51187 7.9183C5.51187 8.86281 6.20091 9.77636 6.29381 9.90023C6.38671 10.0318 7.64865 11.9673 9.56865 12.7957C10.0254 12.997 10.3816 13.1131 10.6603 13.1983C11.117 13.3454 11.5351 13.3222 11.868 13.2757C12.2396 13.2215 13.0061 12.8112 13.1609 12.3622C13.3235 11.9131 13.3235 11.5338 13.2693 11.4486C13.2151 11.3635 13.099 11.3247 12.9054 11.2318V11.2318Z" fill="#02BB9A"></path>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_913_7845">
                                                <rect width="18.5806" height="18.5806" fill="white" transform="translate(0.0849609 0.400391)"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <div class="contact_details">
                                    <p class="mb-0">Whatsapp</p>
                                    <h5><a class="call" href="tel: +91-97264 32010" style="color: white;">{{ $whatsapp->setting_value }}</a></h5>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
