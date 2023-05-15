@extends('admin.layout')

@section('content')
    <div id="main-content" class="w-full">

        <div class="p-6 md:p-10 lg:p-16 flex justify-between items-center">
            <div>
                <p class="text-4xl font-semibold">E-Mails</p>
            </div>
        </div>

        <div class="px-6 md:px-10 lg:px-16">

{{--            <livewire:emails />--}}
            <div class="mx-auto max-w-6xl p-10 bg-white shadow-lg">
                <form action="{{ route('admin.ugg.send', app()->getLocale()) }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="session" class="block text-sm font-medium text-gray-700">Kodreams session<span class="text-red-500">*</span></label>
                            <select id="session" name="session" required
                                    class="mt-1 rounded-none @error('session') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                                <option value="" selected disabled>{{ __('account.Veuillez_sélectionner') }}...</option>
                                {{--<option value="1" @if(old('session') == 1) selected @endif>CMR-2023</option>
                                <option value="2" @if(old('session') == 2) selected @endif>CMR-2022</option>
                                <option value="3" @if(old('session') == 3) selected @endif>CMR-2021</option>--}}
                                @isset($ugg_sessions[0])
                                    @foreach($ugg_sessions as $ugg_session)
                                        <option value="{{ $ugg_session->id }}" @if(old('session') == $ugg_session->id) selected @endif>
                                            {{ $ugg_session->{'name_' . app()->getLocale()} }}
                                        </option>
                                    @endforeach
                                @endisset
                            </select>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="status" class="block text-sm font-medium text-gray-700">Kodreams candidate status<span class="text-red-500">*</span></label>
                            <select id="status" name="status" required
                                    class="mt-1 rounded-none @error('status') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                                <option value="" selected disabled>{{ __('account.Veuillez_sélectionner') }}...</option>
                                <option value="all" @if(old('status') == 'all') selected @endif>All</option>
                                @foreach(config('status_list_' . app()->getLocale()) as $key => $status)
                                    <option value="{{ $key }}" @if(old('status') == $key) selected @endif>{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-6">
                            <label for="subject" class="block text-sm font-medium text-gray-700">Subject<span class="text-red-500">*</span></label>
                            <input type="text" id="subject" name="subject" value="{{ old('subject') }}" placeholder="Subject" required
                                   class="mt-1 rounded-none @error('subject') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror"
                            >
                        </div>

                        <div class="col-span-6">
                            <label for="mail_en" class="block text-sm font-medium text-gray-700">E-Mail EN<span class="text-red-500">*</span></label>
                            <textarea id="mail_en" name="mail_en" rows="10" class="mt-1">{{ old('mail_en') }}</textarea>
                        </div>

                        <div class="col-span-6">
                            <label for="mail_de" class="block text-sm font-medium text-gray-700">E-Mail DE</label>
                            <textarea id="mail_de" name="mail_de" rows="10" class="mt-1">{{ old('mail_de') }}</textarea>
                        </div>

                        <div class="col-span-6">
                            <label for="mail_fr" class="block text-sm font-medium text-gray-700">E-Mail FR</label>
                            <textarea id="mail_fr" name="mail_fr" rows="10" class="mt-1">{{ old('mail_fr') }}</textarea>
                        </div>
                    </div>

                    <div class="flex justify-end gap-5 mt-5">
                        <button type="submit" class="px-10 py-3 border border-black text-black hover:bg-black hover:text-white">Send</button>
                    </div>
                </form>
            </div>

            <br>
            <br>

        </div>

    </div>
@endsection

@section('script')
    <script>
        CKEDITOR.replace('mail_en', {
            language: '{{ app()->getLocale() }}',
            extraPlugins: 'editorplaceholder',
            editorplaceholder: 'Start typing here...',
        });
        CKEDITOR.replace('mail_de', {
            language: '{{ app()->getLocale() }}',
            extraPlugins: 'editorplaceholder',
            editorplaceholder: 'Ihre E-Mail...'
        });
        CKEDITOR.replace('mail_fr', {
            language: '{{ app()->getLocale() }}',
            extraPlugins: 'editorplaceholder',
            editorplaceholder: 'Votre E-Mail...'
        });
    </script>
@endsection
