@extends('layouts.app')
@section('content')
    <div class="bg-white pt-[80px]"></div>
    <div class="bg-white text-gray-800 mx-auto font-notosans">
        <div class="mx-auto p-4">
            <div class="mx-auto mb-12">
                <div class="bg-[url('/resources/images/kodreams/kowelt-header-Montage.png')] bg-cover bg-bottom h-96 relative flex justify-center">
                    <div class="flex flex-col gap-3 text-center pt-6">
                    </div>
                    <div class="flex gap-5 absolute xl:left-60 lg:left-40 md:left-20 -bottom-6 inline-flex h-40 break-words">
                        <div class="bg-[#26549A70] text-center rounded-sm shadow py-5 px-24 xl:px-36 flex items-center gap-x-2 text-green-600 break-words">
                            <p class="mt-2 font-bold break-words text-3xl text-white">KODREAMS</p>
                        </div>
                    </div>
                </div>

                <br>
                <br>
                <br>

                <div class="text-xl max-w-7xl mx-auto">
                    <div class="md:flex gap-3">
                        <div class="md:basis-4/6">
                            <p class="border-b pb-5 text-center text-[#8e44ad] font-semibold">Project description</p>
                            <br>
                            <br>
                            <p class="font-light text-justify">
                                The KODREAMS project helps people from all over the world to develop their academic or professional
                                career in the Federal Republic of Germany, a leading country and expert in economic and technological
                                development. Supported by the German company KOWELT UG and its partners, KODREAMS offers a
                                unique opportunity to discover career and educational opportunities in the Federal Republic of Germany
                                by financing the immigration process of the selected persons in the project.
                                <br>
                                KOWELT promotes collaboration between Germany and other nations and promotes the strengthening
                                of relationships between communities.
                                <br>
                                <br>
                                Join us in exploring future opportunities and enhancing German culture in the world.
                            </p>
                            <br>
                            <br>
                            <p class="border-b pb-5 text-center text-[#8e44ad] font-semibold">The steps of the KODREAMS competition</p>
                            <br>
                            <br>
                            <div class="mt-4">
                                <h2 class="text-2xl">Step 1 <span class="uppercase text-[#2980b9]">- REGISTRATION</span></h2>
                                <p class="mt-4 font-light">
                                    Any person legally resident in Cameroon can register online to participate in the KODREAMS project.
                                    The minimum academic level required is the "baccalauréat de l'enseignement secondaire" or the GCE
                                    Advanced Level. This first step is free for all participants.
                                </p>
                                <p class="mt-4 font-light">
                                    <a href="{{ route('ugg.dashboard', app()->getLocale()) }}" class="underline text-[#3498db]"
{{--                                       @if(date('d.m.Y') < config('app.kodream_start_date')) data-bs-toggle="modal" data-bs-target="#exampleModalCenter" @endif--}}
                                    >Register</a> from <span class="font-bold text-[#3498db]">Wednesday 15 March 2023 until Thursday 15 June 2023</span> only online and upload the
                                    required supporting documents.
                                </p>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <div class="mt-4">
                                <h2 class="text-2xl">Step 2 <span class="uppercase text-[#2980b9]">- SELECTION OF THE FIRST PHASE</span></h2>
                                <p class="mt-4 font-light">
                                    Applications will be reviewed in a progressive manner and applicants will be informed individually by
                                    e-mail whether they have been selected for the next step of the project or not.
                                </p>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <div class="mt-4">
                                <h2 class="text-2xl">Step 3 <span class="uppercase text-[#2980b9]">- CONDITIONS AND FEES FOR PARTICIPATION IN THE WRITTEN EXAMINATION</span></h2>
                                <p class="mt-4 font-light">
                                    Only candidates selected at step 2 will be invited to attend an examination.
                                </p>
                                <p class="mt-4 font-light">
                                    The candidate will have to approve his/her participation in the examination by signing the participation
                                    document which will be available on his/her candidate area.
                                </p>
                                <p class="mt-4 font-light">
                                    The candidate will have to pay the examination fees of 154 euros (<span class="font-bold text-[#3498db]">Payment exclusively at the bank</span>)
                                </p>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <div class="mt-4">
                                <h2 class="text-2xl">Step 4 <span class="uppercase text-[#2980b9]">- WRITTEN EXAMINATION</span></h2>
                                <p class="mt-4 font-light">
                                    The written examination will take place on <span class="font-bold text-[#3498db]">Saturday 15 July 2023</span> and will be based on the candidate's
                                    knowledge of the Federal Republic of Germany. The candidate will be required to take the exam in person
                                    at the chosen city.
                                </p>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <div class="mt-4">
                                <h2 class="text-2xl">Step 5 <span class="uppercase text-[#2980b9]">- PUBLICATION OF RESULTS</span></h2>
                                <p class="mt-4 font-light">
                                    Participants will receive a grade based on their performance at the written exam.
                                </p>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <div class="mt-4">
                                <h2 class="text-2xl">Step 6 <span class="uppercase text-[#2980b9]">- FINANCING OF THE IMMIGRATION PROJECT</span></h2>
                                <p class="mt-4 font-light">
                                    <span class="font-bold">The best candidates</span> among the laureates will have their travel procedure fully funded by KOWELT and
                                    its partner companies, up to the purchase of the plane ticket.
                                </p>
                            </div>
                            <br class="md:hidden">
                            <br class="md:hidden">
                            <br class="md:hidden">
                        </div>
                        <div class="md:basis-2/6">
                            <div class="border border-gray-100 py-3 shadow-xl w-fit mx-auto text-md">
                                <p class="uppercase border-b border-gray-300 pb-2 px-3 font-bold text-blue-500">Do you have any questions?</p>
                                <div class="px-3">
                                    <p class="mt-4 mb-2">
                                        <a href="mailto:contact.kodreams@kowelt.de"
                                           class="underline font-light"
                                        >
                                            Contact us
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="px-4 md:px-2">
                                <img src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/kodreams/pexels-kampus-production-5940837.jpg') }}" alt="454sdf">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <br>
            <br>
            <br>
        </div>
    </div>


    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto font-notosans" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered relative w-auto pointer-events-none">
            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                    <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">
                        Registration from 15.03.2023
                    </h5>
                    <button type="button"
                            class="btn-close box-content w-4 h-4 p-1 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                            data-bs-dismiss="modal" aria-label="Close" style="color: black">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="modal-body relative p-4 text-black">
                    <p>Thank you for your interest in KODREAMS. Please note that registration will only be open from 15.03.2023. Please come back soon to register.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
