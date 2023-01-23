<template>
    <Head>
        <title>{{id ? 'Update' : 'Create'}} your company profile</title>
    </Head>

    <div class="relative flex flex-wrap justify-center items-center py-12 md:py-20 max-w-6xl mx-auto sm:px-8">
        <div class="flex-1">
            <h1 class="mb-4 text-black text-3xl leading-tight font-bold pl-6">
                Your company profile
            </h1>
            <form @submit.prevent="submit">
                <div class="bg-white border-y sm:border text-left">
                    <div class="flex flex-col md:flex-row md:justify-between p-6 md:gap-6">
                        <div class="w-full md:w-1/3 space-y-6 mb-6 md:mb-0">
                            <div class="">
                                <h2 class="text-lg font-semibold text-gray-900">Company details</h2>
                                <p class="text-base text-gray-500">
                                    Information about your business. This is your chance to show off your company to
                                    potential hires!
                                </p>
                            </div>
                        </div>
                        <div class="w-full md:w-2/3 space-y-6">
                            <div>
                                <label class="block text-base font-medium text-gray-700">
                                    Company name *
                                </label>
                                <div class="mt-2">
                                    <input
                                        v-model="form.name"
                                        type="text"
                                        class="block w-full py-2 px-3 text-gray-700 outline-none bg-white border-gray-300  hover:border-indigo-600 focus:border-indigo-600"
                                        maxlength="50"
                                    />
                                </div>

                                <div v-if="errors.name" class="mt-1 text-red-500 text-sm">
                                    {{ errors.name }}
                                </div>
                            </div>
                            <div>
                                <label class="block text-base font-medium text-gray-700">
                                    Website *
                                </label>
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
                                    About your company *
                                </label>
                                <div class="mt-2">
                                        <textarea
                                            v-model="form.bio"
                                            rows="8"
                                            class="block w-full py-2 px-3 outline-none text-gray-700 bg-white border-gray-300  hover:border-indigo-600 focus:border-indigo-600"
                                        ></textarea>
                                </div>
                                <div v-if="errors.bio" class="mt-1 text-red-500 text-sm">
                                    {{ errors.bio }}
                                </div>
                            </div>
                            <div>
                                <label class="block text-base font-medium text-gray-700">Avatar</label>

                                <p class="text-sm text-gray-500">
                                    Leave empty if you don't want to update your avatar.
                                    A square png or jpg image works best (250x250).
                                    Large images will get cutoff due to size limitations.
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
                            <div>
                                <h2 class="text-lg font-semibold text-gray-900">Personal details</h2>
                                <p class="text-base text-gray-500">
                                    Information about you, the contact point for your business on DotnetDevs.
                                </p>
                            </div>
                        </div>
                        <div class="w-full md:w-2/3 space-y-6">
                            <div>
                                <label class="block text-base font-medium text-gray-700">
                                    Your name *
                                </label>
                                <div class="mt-2">
                                    <input
                                        v-model="form.personal_name"
                                        type="text"
                                        class="block w-full py-2 px-3 text-gray-700 outline-none bg-white border-gray-300  hover:border-indigo-600 focus:border-indigo-600"
                                    />
                                </div>
                                <div v-if="errors.personal_name" class="mt-1 text-red-500 text-sm">
                                    {{ errors.personal_name }}
                                </div>
                            </div>
                            <div>
                                <label class="block text-base font-medium text-gray-700">
                                    Job title *
                                </label>
                                <div class="mt-2">
                                    <input
                                        v-model="form.job_title"
                                        type="text"
                                        class="block w-full py-2 px-3 text-gray-700 outline-none bg-white border-gray-300  hover:border-indigo-600 focus:border-indigo-600"
                                    />
                                </div>
                                <div v-if="errors.job_title" class="mt-1 text-red-500 text-sm">
                                    {{ errors.job_title }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full flex justify-end mt-6 pr-6 lg:pr-0">
                    <button type="submit"
                            :class="[form.processing ? 'bg-indigo-300 hover:bg-indigo-300' : 'bg-indigo-600 hover:bg-indigo-700']"
                            :disabled="form.processing"
                            class="ml-auto text-base font-semibold text-white bg-indigo-600 hover:bg-indigo-700 leading-loose relative flex items-center justify-center py-2 px-12 w-auto max-w-sm md:w-auto">
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
        company: Object,
        errors: Object
    },
    data() {
        return {
            form: useForm({
                name: this.company.name,
                website: this.company.website,
                bio: this.company.bio,
                avatar: null,
                personal_name: this.company.personal_name,
                job_title: this.company.job_title,
            })
        }
    },
    methods: {
        submit() {
            if (!this.id) {
                this.form.post('/companies', {forceFormData: true});
                return;
            }

            this.form
                .transform(data => {
                    data['_method'] = 'put';
                    return data;
                })
                .post(`/companies/${this.id}`, {forceFormData: true})
        }
    }
}
</script>
