<template>
    <Head>
        <title>The reverse job board for .NET developers</title>
        <meta name="description"
              content="Find your next job on the #1 job board for .NET developers. Create your developer profile and sit back as companies reach out to you."/>
    </Head>

    <div class="bg-white relative z-0">
        <img style="" class="max-h-[500px] w-auto absolute -top-10 right-0 opacity-10"
             src="https://dotnetdevs.co/csharp-logo.png" alt=".NET Core logo background">
        <div
            class="relative flex flex-wrap justify-center items-center pt-12 md:pt-20 pb-8 md:pb-12 max-w-6xl mx-auto px-8">
            <div class="flex-1">
                <div class="lg:max-w-5xl mx-auto">
                    <h1 class="mb-5 text-center text-black text-4xl leading-tight md:text-5xl md:leading-tight lg:text-7xl lg:leading-tight font-bold">
                        The reverse job board for <br class="hidden sm:block"/><span class="text-indigo-600">.NET developers</span>
                    </h1>
                    <p class="mb-10 text-lg lg:text-2xl leading-loose lg:leading-loose text-center text-black">
                        We empower developers to help them find their next job.
                        <Link
                            :href="route('register')"
                            class="text-indigo-600 underline font-semibold">
                            Create a profile
                        </Link>
                        and sit back as companies reach out to you - or <a
                        class="text-indigo-600 underline font-semibold" href="/jobs">subscribe to our job board</a> to
                        get weekly job postings.
                    </p>

                    <Link
                        :href="route('register')"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white mb-9 relative flex items-center justify-center w-fit max-w-xs md:max-w-xs px-8 md:px-12 py-3 md:py-4 mx-auto uppercase text-base lg:text-xl leading-loose lg:leading-loose font-semibold tracking-[1px]">
                        Get started
                    </Link>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-12">
        <div class="relative flex flex-wrap justify-center items-center pb-8 md:pb-12 max-w-6xl mx-auto sm:px-8">
            <div class="flex-1">
                <div class="">
                    <h2 class="mb-6 text-lg lg:text-2xl leading-loose lg:leading-loose text-left text-black font-semibold px-6 sm:px-0">
                        Developers available now
                    </h2>
                </div>
                <div class="flex flex-col space-y-8">
                    <developer-teaser :developers="developers"/>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import DeveloperTeaser from "../Shared/DeveloperTeaser.vue";
import {Head, Link} from "@inertiajs/inertia-vue3";

export default {
    props: ['developers'],
    components: {DeveloperTeaser, Head, Link}
}
</script>
