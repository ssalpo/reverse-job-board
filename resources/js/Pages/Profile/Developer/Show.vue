<template>
    <Head>
        <title>{{developer.hero}}</title>
    </Head>

    <div class="mt-20 bg-white ">
        <div class="mx-auto max-w-7xl px-4 sm:px-8">
            <div>
                <div class="p-1 w-20 h-20 bg-white shadow -translate-y-2/3">
                    <div class="overflow-hidden w-full h-full w-full h-full">
                        <img :src="`/storage/` + developer.avatar" :alt="developer.hero" class="object-contain w-full h-full" loading="lazy">
                    </div>
                </div>
                <div class="flex flex-col items-start lg:flex-row lg:items-center -mt-4">
                    <div class="mt-4 lg:mt-0">
                        <h1 class="text-black text-4xl leading-tight md:text-5xl md:leading-tight font-bold">
                            {{developer.hero}}
                        </h1>
                        <div class="flex flex-row space-x-4 items-center mt-2">

                            <p v-if="$page.props.shared.companyProfile?.is_subscribed" class="text-lg flex items-center font-medium text-gray-600 inline-flex items-center">
                                <svg class="w-4 h-4 fill-gray-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                                </svg>
                                <span>{{developer.full_name}}</span>
                            </p>

                            <span class="inline-flex items-center rounded-md px-2.5 py-0.5 text-xs sm:text-sm font-medium bg-green-100 text-green-800 border border-green-800">
                                Recently Active
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="grid lg:grid-cols-7 gap-12 pt-8">
                    <div class="lg:order-1 order-2 lg:col-span-5 lg:mt-0 pb-12 blog job text-gray-700 break-words leading-loose lg:leading-loose">
                        {{developer.bio}}
                    </div>
                    <div class="space-y-5 lg:order-1 lg:col-span-2">
                        <div class="border-2 border-indigo-600">
                            <div class="flex flex-wrap flex-row items-start space-y-3 p-6">
                                <div v-if="$page.props.shared.companyProfile?.is_subscribed">
                                    <div class="w-full">
                                        <h5 class="font-medium text-black mb-1">Search status</h5>
                                        <p class="text-gray-600 text-base inline-flex items-center">
                                            <svg class="w-4 h-4 fill-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span>{{$page.props.shared.config.search_statuses[developer.search_status].name}}</span>
                                        </p>
                                    </div>

                                    <div class="w-full mt-5">
                                        <h5 class="font-medium text-black mb-1">Start date</h5>
                                        <p class="text-gray-600 text-base inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-gray-400 mr-2">
                                                <path d="M12.75 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM7.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM8.25 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM9.75 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM10.5 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM12.75 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM14.25 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 13.5a.75.75 0 100-1.5.75.75 0 000 1.5z"></path>
                                                <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span>{{developer.start_date}}</span>
                                        </p>
                                    </div>

                                    <div class="w-full mt-5">
                                        <h5 class="font-medium text-black mb-1">Experience level</h5>
                                        <p class="text-gray-600 text-base inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-gray-400 mr-2">
                                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd"></path>
                                            </svg>
                                            {{$page.props.shared.config.experience_levels[developer.experience_level]}}
                                        </p>
                                    </div>

                                    <div class="w-full mt-5">
                                        <h5 class="font-medium text-black mb-1">Location</h5>
                                        <p class="text-gray-600 text-base inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 hover:fill-indigo-700 fill-gray-400 mr-2">
                                                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM6.262 6.072a8.25 8.25 0 1010.562-.766 4.5 4.5 0 01-1.318 1.357L14.25 7.5l.165.33a.809.809 0 01-1.086 1.085l-.604-.302a1.125 1.125 0 00-1.298.21l-.132.131c-.439.44-.439 1.152 0 1.591l.296.296c.256.257.622.374.98.314l1.17-.195c.323-.054.654.036.905.245l1.33 1.108c.32.267.46.694.358 1.1a8.7 8.7 0 01-2.288 4.04l-.723.724a1.125 1.125 0 01-1.298.21l-.153-.076a1.125 1.125 0 01-.622-1.006v-1.089c0-.298-.119-.585-.33-.796l-1.347-1.347a1.125 1.125 0 01-.21-1.298L9.75 12l-1.64-1.64a6 6 0 01-1.676-3.257l-.172-1.03z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span>{{developer.city}}</span>
                                        </p>
                                    </div>

                                    <div class="w-full mt-5" v-if="developer.website">
                                        <h5 class="font-medium text-black mb-1">Website</h5>
                                        <a :href="`https://` + developer.website" target="_blank" class="text-gray-600 hover:text-indigo-700 text-base inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-gray-400 mr-2">
                                                <path fill-rule="evenodd" d="M19.902 4.098a3.75 3.75 0 00-5.304 0l-4.5 4.5a3.75 3.75 0 001.035 6.037.75.75 0 01-.646 1.353 5.25 5.25 0 01-1.449-8.45l4.5-4.5a5.25 5.25 0 117.424 7.424l-1.757 1.757a.75.75 0 11-1.06-1.06l1.757-1.757a3.75 3.75 0 000-5.304zm-7.389 4.267a.75.75 0 011-.353 5.25 5.25 0 011.449 8.45l-4.5 4.5a5.25 5.25 0 11-7.424-7.424l1.757-1.757a.75.75 0 111.06 1.06l-1.757 1.757a3.75 3.75 0 105.304 5.304l4.5-4.5a3.75 3.75 0 00-1.035-6.037.75.75 0 01-.354-1z" clip-rule="evenodd" />
                                            </svg>
                                            <span>{{developer.website}}</span>
                                        </a>
                                    </div>

                                    <div class="w-full mt-5" v-if="developer.github">
                                        <h5 class="font-medium text-black mb-1">Github</h5>
                                        <a :href="`https://` + developer.github" target="_blank" class="text-gray-600 hover:text-indigo-700 text-base inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-gray-400 mr-2">
                                                <path fill-rule="evenodd" d="M19.902 4.098a3.75 3.75 0 00-5.304 0l-4.5 4.5a3.75 3.75 0 001.035 6.037.75.75 0 01-.646 1.353 5.25 5.25 0 01-1.449-8.45l4.5-4.5a5.25 5.25 0 117.424 7.424l-1.757 1.757a.75.75 0 11-1.06-1.06l1.757-1.757a3.75 3.75 0 000-5.304zm-7.389 4.267a.75.75 0 011-.353 5.25 5.25 0 011.449 8.45l-4.5 4.5a5.25 5.25 0 11-7.424-7.424l1.757-1.757a.75.75 0 111.06 1.06l-1.757 1.757a3.75 3.75 0 105.304 5.304l4.5-4.5a3.75 3.75 0 00-1.035-6.037.75.75 0 01-.354-1z" clip-rule="evenodd" />
                                            </svg>
                                            <span>{{developer.github}}</span>
                                        </a>
                                    </div>

                                    <div class="w-full mt-5" v-if="developer.vkontakte">
                                        <h5 class="font-medium text-black mb-1">Github</h5>
                                        <a :href="`https://` + developer.vkontakte" target="_blank" class="text-gray-600 hover:text-indigo-700 text-base inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-gray-400 mr-2">
                                                <path fill-rule="evenodd" d="M19.902 4.098a3.75 3.75 0 00-5.304 0l-4.5 4.5a3.75 3.75 0 001.035 6.037.75.75 0 01-.646 1.353 5.25 5.25 0 01-1.449-8.45l4.5-4.5a5.25 5.25 0 117.424 7.424l-1.757 1.757a.75.75 0 11-1.06-1.06l1.757-1.757a3.75 3.75 0 000-5.304zm-7.389 4.267a.75.75 0 011-.353 5.25 5.25 0 011.449 8.45l-4.5 4.5a5.25 5.25 0 11-7.424-7.424l1.757-1.757a.75.75 0 111.06 1.06l-1.757 1.757a3.75 3.75 0 105.304 5.304l4.5-4.5a3.75 3.75 0 00-1.035-6.037.75.75 0 01-.354-1z" clip-rule="evenodd" />
                                            </svg>
                                            <span>{{developer.vkontakte}}</span>
                                        </a>
                                    </div>

                                    <div class="w-full mt-5" v-if="developer.twitter">
                                        <h5 class="font-medium text-black mb-1">Twitter</h5>
                                        <a :href="`https://` + developer.twitter" target="_blank" class="text-gray-600 hover:text-indigo-700 text-base inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-gray-400 mr-2">
                                                <path fill-rule="evenodd" d="M19.902 4.098a3.75 3.75 0 00-5.304 0l-4.5 4.5a3.75 3.75 0 001.035 6.037.75.75 0 01-.646 1.353 5.25 5.25 0 01-1.449-8.45l4.5-4.5a5.25 5.25 0 117.424 7.424l-1.757 1.757a.75.75 0 11-1.06-1.06l1.757-1.757a3.75 3.75 0 000-5.304zm-7.389 4.267a.75.75 0 011-.353 5.25 5.25 0 011.449 8.45l-4.5 4.5a5.25 5.25 0 11-7.424-7.424l1.757-1.757a.75.75 0 111.06 1.06l-1.757 1.757a3.75 3.75 0 105.304 5.304l4.5-4.5a3.75 3.75 0 00-1.035-6.037.75.75 0 01-.354-1z" clip-rule="evenodd" />
                                            </svg>
                                            <span>{{developer.twitter}}</span>
                                        </a>
                                    </div>

                                    <div class="w-full mt-5" v-if="developer.linkedin">
                                        <h5 class="font-medium text-black mb-1">Linkedin</h5>
                                        <a :href="`https://` + developer.linkedin" target="_blank" class="text-gray-600 hover:text-indigo-700 text-base inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-gray-400 mr-2">
                                                <path fill-rule="evenodd" d="M19.902 4.098a3.75 3.75 0 00-5.304 0l-4.5 4.5a3.75 3.75 0 001.035 6.037.75.75 0 01-.646 1.353 5.25 5.25 0 01-1.449-8.45l4.5-4.5a5.25 5.25 0 117.424 7.424l-1.757 1.757a.75.75 0 11-1.06-1.06l1.757-1.757a3.75 3.75 0 000-5.304zm-7.389 4.267a.75.75 0 011-.353 5.25 5.25 0 011.449 8.45l-4.5 4.5a5.25 5.25 0 11-7.424-7.424l1.757-1.757a.75.75 0 111.06 1.06l-1.757 1.757a3.75 3.75 0 105.304 5.304l4.5-4.5a3.75 3.75 0 00-1.035-6.037.75.75 0 01-.354-1z" clip-rule="evenodd" />
                                            </svg>
                                            <span>{{developer.linkedin}}</span>
                                        </a>
                                    </div>

                                    <div class="w-full mt-5" v-if="developer.stackoverflow">
                                        <h5 class="font-medium text-black mb-1">Stack overflow</h5>
                                        <a :href="`https://` + developer.stackoverflow" target="_blank" class="text-gray-600 hover:text-indigo-700 text-base inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-gray-400 mr-2">
                                                <path fill-rule="evenodd" d="M19.902 4.098a3.75 3.75 0 00-5.304 0l-4.5 4.5a3.75 3.75 0 001.035 6.037.75.75 0 01-.646 1.353 5.25 5.25 0 01-1.449-8.45l4.5-4.5a5.25 5.25 0 117.424 7.424l-1.757 1.757a.75.75 0 11-1.06-1.06l1.757-1.757a3.75 3.75 0 000-5.304zm-7.389 4.267a.75.75 0 011-.353 5.25 5.25 0 011.449 8.45l-4.5 4.5a5.25 5.25 0 11-7.424-7.424l1.757-1.757a.75.75 0 111.06 1.06l-1.757 1.757a3.75 3.75 0 105.304 5.304l4.5-4.5a3.75 3.75 0 00-1.035-6.037.75.75 0 01-.354-1z" clip-rule="evenodd" />
                                            </svg>
                                            <span>{{developer.stackoverflow}}</span>
                                        </a>
                                    </div>
                                </div>
                                <div v-else>
                                    <Link v-if="!$page.props.shared.companyProfile?.is_subscribed" :href="route('hire')" class="transition-all group duration-200 ease-in-out border border-yellow-400 hover:border-yellow-600 hover:border-l-8 hover:ring-2 hover:ring-yellow-600 bg-yellow-50 text-base text-yellow-700 py-3 px-5 inline-flex items-center justify-start w-full mb-5">
                                        <div class="z-10 text-left">
                                            <p class="mb-2 font-bold">Private Information</p>
                                            <p class="mb-2">This information is only visible with a business subscription.</p>
                                            <p class="text-sm font-bold">Subscribe →</p>
                                        </div>
                                    </Link>

                                    <div class="w-full mt-5">
                                        <h5 class="font-medium text-black mb-1">Search status</h5>
                                        <p class="text-gray-600 text-base inline-flex items-center">
                                            <svg class="w-4 h-4 fill-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span>{{$page.props.shared.config.search_statuses[developer.search_status].name}}</span>
                                        </p>
                                    </div>

                                    <div class="w-full mt-5">
                                        <h5 class="font-medium text-black mb-1">Start date</h5>
                                        <p class="text-gray-600 text-base inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-gray-400 mr-2">
                                                <path d="M12.75 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM7.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM8.25 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM9.75 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM10.5 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM12.75 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM14.25 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 13.5a.75.75 0 100-1.5.75.75 0 000 1.5z"></path>
                                                <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span>{{developer.start_date}}</span>
                                        </p>
                                    </div>

                                    <div class="w-full mt-5">
                                        <h5 class="font-medium text-black mb-1">Experience level</h5>
                                        <p class="text-gray-600 text-base inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-gray-400 mr-2">
                                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd"></path>
                                            </svg>
                                            {{$page.props.shared.config.experience_levels[developer.experience_level]}}
                                        </p>
                                    </div>

                                    <div class="w-full mt-5">
                                        <h5 class="font-medium text-black mb-1">Location</h5>
                                        <p class="text-gray-600 text-base inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 fill-gray-400 mr-2">
                                                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM6.262 6.072a8.25 8.25 0 1010.562-.766 4.5 4.5 0 01-1.318 1.357L14.25 7.5l.165.33a.809.809 0 01-1.086 1.085l-.604-.302a1.125 1.125 0 00-1.298.21l-.132.131c-.439.44-.439 1.152 0 1.591l.296.296c.256.257.622.374.98.314l1.17-.195c.323-.054.654.036.905.245l1.33 1.108c.32.267.46.694.358 1.1a8.7 8.7 0 01-2.288 4.04l-.723.724a1.125 1.125 0 01-1.298.21l-.153-.076a1.125 1.125 0 01-.622-1.006v-1.089c0-.298-.119-.585-.33-.796l-1.347-1.347a1.125 1.125 0 01-.21-1.298L9.75 12l-1.64-1.64a6 6 0 01-1.676-3.257l-.172-1.03z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span>{{developer.city}}</span>
                                        </p>
                                    </div>

                                </div>
                            </div>
                            <div class="flex items-center">
                                <Link
                                    v-if="$page.props.shared.isAuth && $page.props.shared.userId === developer.id"
                                    :href="route('developers.profile.edit', developer.id)"
                                    class="text-base font-semibold text-white bg-indigo-600 hover:bg-indigo-700 leading-loose relative flex items-center justify-center py-1 px-4 mx-auto w-full">
                                    Edit
                                </Link>

                                <Link
                                    v-else-if="$page.props.shared.companyProfile?.is_subscribed"
                                    :href="route('conversations.create') + '?developer_id=' + developer.id"
                                    class="text-base font-semibold text-white bg-indigo-600 hover:bg-indigo-700 leading-loose relative flex items-center justify-center py-1 px-4 mx-auto w-full">
                                    Hire →
                                </Link>

                                <Link
                                    v-else
                                    :href="route('hire')"
                                    class="text-base font-semibold text-white bg-indigo-600 hover:bg-indigo-700 leading-loose relative flex items-center justify-center py-1 px-4 mx-auto w-full">
                                    Subscribe to hire →
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {Head, Link} from "@inertiajs/inertia-vue3";

export default {
    components: {Head, Link},
    props: ['developer']
}
</script>
