<div>
    <!-- Comment Form -->
    <div class="max-w-[85rem] px-4 py-2 sm:px-6 lg:px-8 lg:py-2 mx-auto">
        <div class="mx-auto max-w-2xl">

            <div
                class="mt-5 p-4 relative z-10 bg-white border border-gray-200 rounded-xl sm:mt-10 md:p-10 dark:bg-neutral-900 dark:border-neutral-700">
                <!-- Header -->
                <div
                    class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                            Edit Grade
                        </h2>
                        <p class="text-sm text-gray-600 dark:text-neutral-400">
                            Edit Grade information's here
                        </p>
                    </div>

                    <div>
                        <div class="inline-flex gap-x-2">
                            <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                               href="/grade/list" wire:navigate>
                                View all
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card -->
                <div class="mt-5 p-4 relative z-10 bg-white border border-gray-200 rounded-xl sm:mt-10 md:p-10 dark:bg-neutral-900 dark:border-neutral-700">
                    <form wire:submit="update">
                        <div class="mb-4 sm:mb-8">
                            <label for="hs-feedback-post-comment-name-1" class="block mb-2 text-sm font-medium dark:text-white">Grade name</label>
                            <input type="text" wire:model="name" class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Grade name">
                            @error('name')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mt-6 grid">
                            <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                <div wire:loading class="animate-spin inline-block size-6 border-3 border-current border-t-transparent text-white rounded-full dark:text-white" role="status" aria-label="loading">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                Update
                            </button>
                        </div>
                    </form>
                </div>
                <!-- End Card -->
            </div>
        </div>
        <!-- End Comment Form -->
    </div>
