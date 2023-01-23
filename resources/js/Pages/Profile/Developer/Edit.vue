<template>
    <Head>
        <title>{{id ? 'Update' : 'Create'}} your developer profile</title>
    </Head>

    <div class="relative flex flex-wrap justify-center items-center py-12 md:py-20 max-w-6xl mx-auto sm:px-8">
        <div class="flex-1">
            <h1 class="mb-4 text-black text-3xl leading-tight font-bold pl-6">
                Your developer profile
            </h1>
            <form @submit.prevent="submit">
                <div class="bg-white border-y sm:border text-left">
                    <div class="flex flex-col md:flex-row md:justify-between p-6 md:gap-6">
                        <div class="w-full md:w-1/3 space-y-6 mb-6 md:mb-0">
                            <div class="">
                                <h2 class="text-lg font-semibold text-gray-900">Profile</h2>
                                <p class="text-base text-gray-500">
                                    This information will be displayed publicly.
                                </p>
                            </div>
                        </div>
                        <div class="w-full md:w-2/3 space-y-6">
                            <div>
                                <label class="block text-base font-medium text-gray-700">
                                    Name *
                                </label>

                                <p class="text-sm text-gray-500">
                                    Your name will <i>not</i> be displayed on
                                    your public profile.
                                </p>

                                <div class="mt-2">
                                    <input
                                        v-model="form.full_name"
                                        type="text"
                                        class="block w-full py-2 px-3 text-gray-700 outline-none bg-white border-gray-300  hover:border-indigo-600 focus:border-indigo-600"
                                    />
                                </div>

                                <div v-if="errors.full_name" class="mt-1 text-red-500 text-sm">
                                    {{ errors.full_name }}
                                </div>
                            </div>
                            <div>
                                <label class="block text-base font-medium text-gray-700">
                                    Profile Heading *
                                </label>

                                <p class="text-sm text-gray-500">
                                    Describe yourself as a dev in a few words
                                </p>

                                <div class="mt-2">
                                    <input
                                        v-model="form.hero"
                                        type="text"
                                        class="block w-full py-2 px-3 text-gray-700 outline-none bg-white border-gray-300  hover:border-indigo-600 focus:border-indigo-600"
                                    />
                                </div>

                                <div v-if="errors.hero" class="mt-1 text-red-500 text-sm">
                                    {{ errors.hero }}
                                </div>
                            </div>
                            <div>
                                <label class="block text-base font-medium text-gray-700">
                                    City *
                                </label>

                                <p class="text-sm text-gray-500">
                                    Providing your location makes it easier for
                                    companies hiring locally
                                </p>

                                <div class="mt-2">
                                    <input
                                        v-model="form.city"
                                        type="text"
                                        class="block w-full py-2 px-3 text-gray-700 outline-none bg-white border-gray-300  hover:border-indigo-600 focus:border-indigo-600"
                                    />
                                </div>

                                <div v-if="errors.city" class="mt-1 text-red-500 text-sm">
                                    {{ errors.city }}
                                </div>
                            </div>

                            <div>
                                <label class="block text-base font-medium text-gray-700">
                                    Avatar *
                                </label>

                                <p class="text-sm text-gray-500">
                                    Add a picture of yourself. A square png or
                                    jpg image works best (250x250). Large images will get cutoff due to size
                                    limitations.
                                </p>

                                <div class="mt-2 flex flex-col md:flex-row md:items-center items-start">
                                    <div class="flex-1">
                                        <input type="file" accept=".jpeg, .png, .jpg"
                                               @input="form.avatar = $event.target.files[0]"/>
                                    </div>
                                </div>

                                <div v-if="errors.avatar" class="mt-1 text-red-500 text-sm">
                                    {{ errors.avatar }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white border-y sm:border text-left mt-12">
                    <div class="flex flex-col md:flex-row md:justify-between p-6 md:gap-6">
                        <div class="w-full md:w-1/3 space-y-6 mb-6 md:mb-0">
                            <h2 class="text-lg font-semibold text-gray-900">Bio *</h2>

                            <p class="text-base text-gray-500">
                                Share a few paragraphs on your past experiences and what makes you
                                special. This is your chance to stand out amongst the crowd. Don't be
                                shy!
                            </p>

                            <p class="text-base font-semibold text-gray-700 mt-4">
                                Example Topics:
                            </p>

                            <ul class="text-base text-gray-500 mt-2 list-disc list-inside">
                                <li>Your developer education and origins</li>
                                <li>Milestones and accomplishments</li>
                                <li>Skills that set you a part from other devs</li>
                                <li>What you are passionate about</li>
                                <li>Things you care about outside of work</li>
                            </ul>
                        </div>
                        <div class="w-full md:w-2/3 space-y-6">
                            <div class="">
                                    <textarea v-model="form.bio" rows="16"
                                              class="block w-full py-2 px-3 outline-none text-gray-700 bg-white border-gray-300  hover:border-indigo-600 focus:border-indigo-600"
                                    ></textarea>
                            </div>

                            <div v-if="errors.bio" class="mt-1 text-red-500 text-sm">
                                {{ errors.bio }}
                            </div>

                            <p class="mt-2 text-sm text-gray-500">
                                Personally identifiable information
                                will be removed.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="bg-white border-y sm:border text-left mt-12">
                    <div class="flex flex-col md:flex-row md:justify-between p-6 md:gap-6">
                        <div class="w-full md:w-1/3 space-y-6 mb-6 md:mb-0">
                            <h2 class="text-lg font-semibold text-gray-900">Work preferences</h2>
                            <p class="text-base text-gray-500">
                                What kind of work are you looking for?
                            </p>
                        </div>
                        <div class="w-full md:w-2/3 space-y-6">
                            <div>
                                <label class="block text-base font-medium text-gray-700">
                                    Search Status *
                                </label>
                                <div class="mt-2 flex flex-col">
                                    <div class="mb-4" v-for="(label, key) in $page.props.shared.config.search_statuses"
                                         :key="key">
                                        <label>
                                            <input v-model.number="form.search_status" type="radio" :value="key">
                                            <span class="text-gray-700">&nbsp;{{ label.name }}</span>
                                        </label>
                                        <p class="text-sm text-gray-500">
                                            {{ label.description }}
                                        </p>
                                    </div>
                                </div>

                                <div v-if="errors.search_status" class="mt-1 text-red-500 text-sm">
                                    {{ errors.search_status }}
                                </div>
                            </div>
                            <div>
                                <label class="block text-base font-medium text-gray-700">
                                    Experience Level *
                                </label>

                                <p class="text-sm text-gray-500">
                                    Select the experience you feel you are at
                                    right now.
                                </p>

                                <div class="mt-2 flex flex-col">
                                    <div class="mb-4" v-for="(label, key) in $page.props.shared.config.experience_levels"
                                         :key="key">
                                        <label>
                                            <input v-model="form.experience_level" type="radio" :value="key">
                                            <span class="text-gray-700">&nbsp;{{ label }}</span>
                                        </label>
                                    </div>
                                </div>

                                <div v-if="errors.experience_level" class="mt-1 text-red-500 text-sm">
                                    {{ errors.experience_level }}
                                </div>
                            </div>
                            <div>
                                <label class="block text-base font-medium text-gray-700">
                                    Available to start on *
                                </label>

                                <div class="mt-2 flex flex-col">
                                    <input
                                        v-model="form.start_date"
                                        type="date"
                                        class="block max-w-xs py-2 px-3 text-gray-700 outline-none bg-white border-gray-300  hover:border-indigo-600 focus:border-indigo-600"
                                    />
                                </div>

                                <div v-if="errors.start_date" class="mt-1 text-red-500 text-sm">
                                    {{ errors.start_date }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white border-y sm:border text-left mt-12">
                    <div class="flex flex-col md:flex-row md:justify-between p-6 md:gap-6">
                        <div class="w-full md:w-1/3 space-y-6 mb-6 md:mb-0">
                            <h2 class="text-lg font-semibold text-gray-900">Online presence</h2>
                            <p class="text-base text-gray-500">
                                Where can people learn more about you and your work?
                            </p>
                        </div>
                        <div class="w-full md:w-2/3 space-y-6">
                            <div>
                                <label class="block text-base font-medium text-gray-700">Website</label>
                                <div class="mt-1 flex">
									<span
                                        class="inline-flex items-center px-3 border border-r-0 border-gray-300 bg-gray-50 text-gray-500">
										https://
									</span>

                                    <input
                                        v-model="form.website"
                                        type="text"
                                        class="flex-1 block w-full py-2 px-3 text-gray-700 outline-none bg-white border-gray-300  hover:border-indigo-600 focus:border-indigo-600"
                                    />
                                </div>

                                <div v-if="errors.website" class="mt-1 text-red-500 text-sm">
                                    {{ errors.website }}
                                </div>
                            </div>
                            <div>
                                <label class="block text-base font-medium text-gray-700">
                                    Github
                                </label>

                                <div class="mt-1 flex">
                                        <span
                                            class="inline-flex items-center px-3 border border-r-0 border-gray-300 bg-gray-50 text-gray-500">
                                            https://
                                        </span>
                                    <input
                                        v-model="form.github"
                                        type="text"
                                        class="flex-1 block w-full py-2 px-3 text-gray-700 outline-none bg-white border-gray-300  hover:border-indigo-600 focus:border-indigo-600"
                                    />
                                </div>

                                <div v-if="errors.github" class="mt-1 text-red-500 text-sm">
                                    {{ errors.github }}
                                </div>
                            </div>
                            <div>
                                <label class="block text-base font-medium text-gray-700">Twitter</label>
                                <div class="mt-1 flex">
                                        <span
                                            class="inline-flex items-center px-3 border border-r-0 border-gray-300 bg-gray-50 text-gray-500">
                                            https://
                                        </span>

                                    <input
                                        v-model="form.twitter"
                                        type="text"
                                        class="flex-1 block w-full py-2 px-3 text-gray-700 outline-none bg-white border-gray-300  hover:border-indigo-600 focus:border-indigo-600"
                                    />
                                </div>

                                <div v-if="errors.twitter" class="mt-1 text-red-500 text-sm">
                                    {{ errors.twitter }}
                                </div>
                            </div>
                            <div>
                                <label class="block text-base font-medium text-gray-700">Linkedin</label>
                                <div class="mt-1 flex">
                                        <span
                                            class="inline-flex items-center px-3 border border-r-0 border-gray-300-md bg-gray-50 text-gray-500">
                                            https://
                                        </span>
                                    <input
                                        v-model="form.linkedin"
                                        type="text"
                                        class="flex-1 block w-full py-2 px-3 text-gray-700 outline-none bg-white border-gray-300  hover:border-indigo-600 focus:border-indigo-600"
                                    />
                                </div>

                                <div v-if="errors.linkedin" class="mt-1 text-red-500 text-sm">
                                    {{ errors.linkedin }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full flex justify-end mt-6 pr-6 lg:pr-0">
                    <button type="submit"
                            :disabled="form.processing"
                            :class="[form.processing ? 'bg-indigo-300 hover:bg-indigo-300' : 'bg-indigo-600 hover:bg-indigo-700']"
                            class="ml-auto text-base font-semibold text-white leading-loose relative flex items-center justify-center py-2 px-12 w-auto max-w-sm md:w-auto">
                        {{ id ? 'Save' : 'Create' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import {Head, useForm} from "@inertiajs/inertia-vue3";

export default {
    components: {Head},
    props: {
        id: Number,
        developerProfile: Object,
        errors: Object
    },
    data() {
        return {
            form: useForm({
                'user_id': this.developerProfile.user_id,
                'full_name': this.developerProfile.full_name,
                'hero': this.developerProfile.hero,
                'city': this.developerProfile.city,
                'avatar': null,
                'bio': this.developerProfile.bio,
                'search_status': this.developerProfile.search_status || 1,
                'experience_level': this.developerProfile.experience_level || 2,
                'start_date': this.developerProfile.start_date,
                'website': this.developerProfile.website,
                'github': this.developerProfile.github,
                'vkontakte': this.developerProfile.vkontakte,
                'twitter': this.developerProfile.twitter,
                'linkedin': this.developerProfile.linkedin,
                'stackoverflow': this.developerProfile.stackoverflow,
            })
        }
    },
    methods: {
        submit() {
            if (!this.id) {
                this.form.post('/developers', {forceFormData: true})
                return;
            }

            this.form
                .transform(data => {
                    data['_method'] = 'put';
                    return data;
                })
                .post(`/developers/${this.id}`, {forceFormData: true})
        }
    }
}
</script>
