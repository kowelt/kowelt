<!--Footer-->
<footer class="pt-5">
    <div class="container mx-auto px-2 pt-4 md:px-0">
        <div class="w-full flex flex-col md:flex-row md:gap-x-5">

            <div class="flex-1 md:flex md:justify-center">
                <div>
                    <p class="uppercase text-white md:mb-6 text-2xl font-bold">{{ __('footer.links') }}</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="{{ route('welcome', app()->getLocale()) }}#about_us" class="no-underline hover:underline text-white">{{ __('navigation.a_propos') }}</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="{{ route('welcome', app()->getLocale()) }}#service" class="no-underline hover:underline text-white">{{ __('navigation.services') }}</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="{{ route('welcome', app()->getLocale()) }}#contact" class="no-underline hover:underline text-white">{{ __('navigation.contact') }}</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="flex-1 md:flex md:justify-center">
                <div>
                    <p class="uppercase text-white font-bold md:mb-6 text-2xl">{{ __('footer.legal') }}</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="{{ in_array($navigation, ['kodreams', 'ugg']) ? asset('footer_docs/Kodreams/KODREAMS_Privacy_' . app()->getLocale() . '.pdf') : asset('footer_docs/Kowelt/KOWELT_Privacy_de.pdf') }}" target="_blank" class="no-underline hover:underline text-white">{{ __('footer.term_privacy') }}</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="{{ route('impressum', app()->getLocale()) }}" class="no-underline hover:underline text-white">{{ __('footer.impressum') }}</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="flex-1 md:flex md:justify-center">
                <div>
                    <p class="uppercase text-white md:mb-6 text-2xl font-bold">{{ __('navigation.contact') }}</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0 mb-1 md:mb-4">
                            @if(in_array($navigation, ['kodreams', 'ugg']))
                                <a href="mailto:contact.kodreams@kowelt.de"><span class="no-underline hover:underline text-white">contact.kodreams@kowelt.de</span></a>
                            @else
                                <a href="mailto:contact.germany@kowelt.de"><span class="no-underline hover:underline text-white">contact.germany@kowelt.de</span></a>
                            @endif
                            <br>
                            <a href="tel:+49 157 74994924" class="no-underline hover:underline text-white">+49 157 74994924</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            @if(in_array($navigation, ['kodreams', 'ugg']))
                                <a href="https://maps.google.com/?q=Lange Straße 38, Wolfsburg, Deutschland, 38448" target="_blank" class="no-underline hover:underline text-white">Lange Straße 38<br>38448 Wolfsburg<br>Deutschland</a>
                            @else
                                <a href="{{ route('welcome', app()->getLocale()) }}#contact" class="no-underline hover:underline text-white">Lange Straße 38<br>38448 Wolfsburg<br>Deutschland</a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>

            <div class="flex-1 md:flex md:justify-center">
                <div>
                    <p class="uppercase text-white font-bold md:mb-6 text-2xl">{{ __('footer.social') }}</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a target="_blank" href="https://www.facebook.com/KOWELT" class="no-underline hover:underline text-white">Facebook</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a target="_blank" href="https://www.linkedin.com/company/kowelt/" class="no-underline hover:underline text-white">Linkedin</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <label>
                    <img src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png">
                </label>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</footer>
