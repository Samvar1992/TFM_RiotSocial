<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/ComponentsRiot/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/ComponentsRiot/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    name: '',
    nick_name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Register" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Nombre" class="text-stone-800" />
                <TextInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full border-stone-800 hover:border-red-600 focus:border-red-600 focus:ring-red-600"
                    required
                    autofocus
                    autocomplete="name"
                />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="nick_name" value="Apodo" class="text-stone-800" />
                <TextInput
                    id="nick_name"
                    v-model="form.nick_name"
                    type="text"
                    class="mt-1 block w-full border-stone-800 hover:border-red-600 focus:border-red-600 focus:ring-red-600"
                    required
                />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Correo electrónico" class="text-stone-800" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full border-stone-800 hover:border-red-600 focus:border-red-600 focus:ring-red-600"
                    required
                    autocomplete="username"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Contraseña" class="text-stone-800" />
                <TextInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full border-stone-800 hover:border-red-600 focus:border-red-600 focus:ring-red-600"
                    required
                    autocomplete="new-password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirmar contraseña" class="text-stone-800" />
                <TextInput
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="mt-1 block w-full border-stone-800 hover:border-red-600 focus:border-red-600 focus:ring-red-600"
                    required
                    autocomplete="new-password"
                />
                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4">
                <InputLabel for="terms" class="text-stone-800">
                    <div class="flex items-center">
                        <Checkbox id="terms" class="checked:bg-red-600 hover:checked:bg-stone-800 focus:checked:bg-red-600 focus:ring-red-600" v-model:checked="form.terms" name="terms" required />

                        <div class="ms-2">
                            Acepto los <a target="_blank" :href="route('terms.show')" class="underline text-sm text-stone-800 hover:text-red-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600">Terminos de Servicio</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Privacy Policy</a>
                        </div>
                    </div>
                    <InputError class="mt-2" :message="form.errors.terms" />
                </InputLabel>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="underline text-stone-800 hover:text-red-600 mx-8 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600">
                    Ya estás registrado?
                </Link>

                <PrimaryButton class="ms-4 bg-stone-800 hover:border-red-600 hover:bg-red-600 active:bg-red-700 focus:ring-red-600" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Registrar
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template>
