<br>
<br>
<div class="col-span-5 md:col-span-4 bg-white p-10 max-w-4xl mx-auto border shadow-lg">
    @if ($errors->any())
        <div class="bg-red-200 py-3 text-center text-black">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M2 10a.75.75 0 01.75-.75h12.59l-2.1-1.95a.75.75 0 111.02-1.1l3.5 3.25a.75.75 0 010 1.1l-3.5 3.25a.75.75 0 11-1.02-1.1l2.1-1.95H2.75A.75.75 0 012 10z" clip-rule="evenodd" />
                        </svg>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('ugg.pdf.upload', app()->getLocale()) }}" method="POST" class="mb-0 space-y-6">
        <input type="hidden" id="app_url" value="{{ config('app.url') . '/' . app()->getLocale() }}">
        @csrf

        <input type="hidden" id="browse" value="{{ __('account.browse') }}">
        <input type="hidden" id="labelIdleFiles" value="{{ __('account.labelIdle') }}">
        <input type="hidden" id="labelFileProcessing" value="{{ __('account.labelFileProcessing') }}">
        <input type="hidden" id="labelFileProcessingComplete" value="{{ __('account.labelFileProcessingComplete') }}">
        <input type="hidden" id="labelFileProcessingAborted" value="{{ __('account.labelFileProcessingAborted') }}">
        <input type="hidden" id="labelFileProcessingError" value="{{ __('account.labelFileProcessingError') }}">
        <input type="hidden" id="labelTapToCancel" value="{{ __('account.labelTapToCancel') }}">
        <input type="hidden" id="labelTapToRetry" value="{{ __('account.labelTapToRetry') }}">
        <input type="hidden" id="labelTapToUndo" value="{{ __('account.labelTapToUndo') }}">

        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6">
                <label for="pdf_documents" class="block text-sm font-medium text-gray-700">
                    {{ __('ugg.PDF_Upload') }}<span class="text-red-500">*</span>
                </label>
                @if(isset($pdf_document))
                    <div class="flex justify-between items-center py-8 px-5 rounded-lg mb-3 bg-gray-100 shadow w-full">
                        <div class="break-words overflow-hidden">
                            {{ $pdf_document->filename }}
                        </div>
                        <div class="flex items-center">
                            <div>
                                <a href="{{ asset($pdf_document->path) }}" download
                                   class="text-blue-500"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hover:scale-110">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                    </svg>
                                </a>
                            </div>
                            @if(in_array(Auth::user()->status, ['selected_second_phase', 'documents_under_verification']))
                                <div class="ml-3">
                                    <a href="{{ route('applicant.document.delete', [app()->getLocale(), $pdf_document->id]) }}"
                                       class="text-red-500 hover:underline"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hover:scale-110">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <input type="hidden" name="pdf_documents[]" value="{{ $pdf_document->path }}">
                @endif
                <input type="file" id="pdf_documents" name="pdf_documents[]"
                       class="mt-1 p-3 upload-one-file @if(isset($pdf_document)) hidden @endif @error('pdf_documents') border-[1.5px] border-red-600 focus:border-red-500 focus:ring-red-500 rounded-lg @enderror"
                       accept="image/png, image/jpeg, application/pdf">
                <input type="hidden" value="0" id="upload_one_file_require_0">
            </div>
        </div>

        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6">
                <label for="payment_receipts" class="block text-sm font-medium text-gray-700">
                    {{ __('ugg.Payment_receipt') }}<span class="text-red-500">*</span>
                </label>
                @if(isset($payment_receipt))
                    <div class="flex justify-between items-center py-8 px-5 rounded-lg mb-3 bg-gray-100 shadow w-full">
                        <div class="break-words overflow-hidden">
                            {{ $payment_receipt->filename }}
                        </div>
                        <div class="flex items-center">
                            <div>
                                <a href="{{ asset($payment_receipt->path) }}" download
                                   class="text-blue-500"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hover:scale-110">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                    </svg>
                                </a>
                            </div>
                            @if(in_array(Auth::user()->status, ['selected_second_phase', 'documents_under_verification']))
                                <div class="ml-3">
                                    <a href="{{ route('applicant.document.delete', [app()->getLocale(), $payment_receipt->id]) }}"
                                       class="text-red-500 hover:underline"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hover:scale-110">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <input type="hidden" name="payment_receipts[]" value="{{ $payment_receipt->path }}">
                @endif
                <input type="file" id="payment_receipts" name="payment_receipts[]"
                       class="mt-1 p-3 upload-one-file @if(isset($payment_receipt)) hidden @endif @error('payment_receipts') border-[1.5px] border-red-600 focus:border-red-500 focus:ring-red-500 rounded-lg @enderror"
                       accept="image/png, image/jpeg, application/pdf">
                <input type="hidden" value="0" id="upload_one_file_require_1">
            </div>
        </div>

        @if(in_array(Auth::user()->status, ['selected_second_phase', 'documents_under_verification']))
            <div class="text-right">
                <button type="submit" class="inline-flex justify-center rounded-md gradient-ugg py-3 px-6 text-sm font-medium text-white hover:shadow-blue-500/60 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform transition hover:scale-[1.02] duration-300 ease-in-out"
                >{{ __('ugg.Upload') }}</button>
            </div>
        @else
            <div class="text-right">
                <a href="{{ route('ugg.dashboard', [app()->getLocale(), 'home']) }}"
                   class="inline-flex justify-center rounded-md gradient-ugg py-3 px-6 text-sm font-medium text-white hover:shadow-blue-500/60 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform transition hover:scale-[1.02] duration-300 ease-in-out cursor-pointer"
                >{{ __('ugg.Back') }}</a>
            </div>
        @endif
    </form>
</div>
