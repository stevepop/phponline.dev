<x-app-container>
    @push('body-start')
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
    @endpush
    <section class="mb-12">
        <div class="sm:w-full md:w-3/4 p-6">
            <form action="#" wire:submit.prevent="saveArticle" class="p-6 mb-6 w-full bg-white rounded">
                @csrf
                <div class="mt-2">
                    <div class="sm:col-span-6">
                        <label for="title" class="block text-sm font-medium leading-5 text-gray-700">
                            Title
                        </label>
                        <div class="mt-1 rounded-md">
                            <input wire:model.defer="article.title" type="text" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            @if($errors->has('article.title'))
                                <div class="text-red-800 mt-1">
                                    {{ $errors->first('article.title') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="mt-6 sm:col-span-6">
                        <label for="body" class="block text-sm font-medium leading-5 text-gray-700">
                            Content
                        </label>
                        <div class="mt-1 rounded-md">
                              <div x-data="{ trix: @entangle('article.body').defer }">
                                    <input id="body" name="body" type="hidden" value="{{ $article->body }}" />
                                    <div wire:ignore>
                                        <trix-editor class="h-64" x-model.debounce.300ms="trix">
                                            {{ $article->body }}
                                        </trix-editor>
                                    </div>
                                    @error('article.body') 
                                        <span class="text-red-800 mt-1">{{ $message }}</span> 
                                    @enderror
                                </div>
        
                        </div>
                    </div>
                     <div class="grid grid-flow-col auto-cols-max my-6">
                        <div class="py-2 mr-6">
                            <label for="level" class="block text-sm font-medium leading-5 text-gray-700 w-32">Level</label>
                            <select name="level" wire:model.defer="article.level" class="mt-1 form-select block w-42 pl-3 pr-10 py-2 text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                <option value=''>Choose level</option>
                                @foreach($levels as $key => $level)
                                    <option value='{{ $key }}'>{{ $level }}</option>
                                @endforeach
                            </select>
                             @if($errors->has('article.level'))
                                <div class="text-red-800 mt-1">
                                    {{ $errors->first('article.level') }}
                                </div>
                            @endif
                        </div>

                        <div class="py-2">
                            <label class="block text-sm font-medium leading-5 text-gray-700 w-32">Category</label>
                            <select name="category" wire:model.defer="article.category_id" class="mt-1 form-select block w-42 pl-3 pr-10 py-2 text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                <option value=''>Choose category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                             @if($errors->has('article.category_id'))
                                <div class="text-red-800 mt-1">
                                    {{ $errors->first('article.category_id') }}
                                </div>
                            @endif
                        </div>
                     </div>
                    <div class="mt-6 rounded-md flex">
                        <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                            Save
                        </button>
                        <button type="button" class="ml-3 inline-flex items-center px-6 py-3 border border-gray-300 text-base leading-6 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150">
                            Cancel
                        </button>
                    </div>
                </div>
                <div>
                    @if ($success)
                        <div class="mt-3 p-2 bg-green-400 text-white">Successfully created an article</div>
                    @endif
                </div>
            </form>
        </div>
    </section>
</x-app-container>
