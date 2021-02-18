<form class="p-6 mb-6 w-full bg-white rounded">
    <div class="mt-2">
        <div class="sm:col-span-6">
            <label for="title" class="block text-sm font-medium leading-5 text-gray-700">
                Title
            </label>
            <div class="mt-1 rounded-md shadow-sm">
                <input id="title" type="text" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
            </div>
        </div>
        <div class="mt-6 sm:col-span-6">
            <label for="title" class="block text-sm font-medium leading-5 text-gray-700">
                Content
            </label>
            <div class="mt-1 rounded-md shadow-sm">
                <textarea
                        id="content"
                        rows="15"
                        class="form-textarea block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                </textarea>
            </div>
            <div class="mt-6 rounded-md shadow-sm flex">
                <button type="button" class="inline-flex items-center px-6 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                    Save
                </button>
                <button type="button" class="ml-3 inline-flex items-center px-6 py-3 border border-gray-300 text-base leading-6 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150">
                    Cancel
                </button>
            </div>
        </div>
    </div>
    </div>

</form>