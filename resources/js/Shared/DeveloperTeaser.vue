<template>
    <Link
        :href="route('developers.profile.show', developer.id)"
        v-for="developer in developers"
        :key="developer.id"
        class="transition-all group duration-200 ease-in-out relative block bg-white border p-4 hover:border-l-8 hover:ring-2 ring-indigo-600 hover:border-indigo-600 cursor-pointer relative bg-white"
    >
        <div class="flex flex-col justify-center md:flex-row md:justify-start md:items-center">
            <div class="flex items-center">
                <div class="overflow-hidden w-full h-full w-12 h-12 md:w-12 md:h-12 shrink-0">
                    <img
                        :src="`/storage/${developer.avatar}`"
                        :alt="`${developer.hero} avatar`"
                        class="object-contain w-full h-full"
                    />
                </div>
                <div class="ml-3">
                    <div class="font-display text-lg leading-tight font-bold">
                        {{ developer.hero }}
                    </div>
                    <div class="flex items-center text-sm font-medium text-green-500">
                        {{ $page.props.shared.config.search_statuses[developer.search_status].name }}
                    </div>
                </div>
            </div>

            <div
                class="ml-auto font-display font-bold transition-opacity duration-400 absolute bottom-4 right-4 opacity-0 group-hover:opacity-100 text-sm">
                View details <i class="far fa-arrow-right fa-fw ml-1"></i>
            </div>
        </div>

        <div class="text-sm sm:text-base text-gray-800 space-y-4 py-3">
            <p class="line-clamp-3 break-words leading-loose lg:leading-loose">
                {{ developer.bio }}
            </p>
        </div>

        <div class="text-xs mt-3 flex gap-x-4 gap-y-1 flex-wrap items-center md:gap-2">
            <span
                class="inline-flex items-center rounded-md px-2.5 py-0.5 font-medium bg-green-100 text-green-800 border border-green-800">
                Recently Active
            </span>

            <span
                class="inline-flex items-center rounded-md px-2.5 py-0.5 font-medium bg-yellow-100 text-yellow-800 border border-yellow-800">
                {{ $page.props.shared.config.experience_levels[developer.experience_level] }}
            </span>
        </div>
    </Link>
</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";

export default {
    props: ['developers'],
    components: {Link},
}
</script>
