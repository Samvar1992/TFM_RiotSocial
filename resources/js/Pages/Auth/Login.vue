<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/ComponentsRiot/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/ComponentsRiot/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Log in" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Correo electrónico" class="text-stone-800"/>
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full border-stone-800 hover:border-red-600 focus:border-red-600 focus:ring-red-600"
                    required
                    autofocus
                    autocomplete="username"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Contraseña" class="text-stone-800"/>
                <TextInput 
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full border-stone-800 hover:border-red-600 focus:border-red-600 focus:ring-red-600"
                    required
                    autocomplete="current-password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox class="checked:bg-red-600 hover:checked:bg-stone-800 focus:checked:bg-red-600 focus:ring-red-600" v-model:checked="form.remember" name="remember" />
                    <span class="ms-2 text-sm text-stone-800">Recuérdame</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-4">
                <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-stone-800 hover:text-red-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600">
                    ¿Olvidaste tu contraseña?
                </Link>

                <PrimaryButton class="ms-4 bg-stone-800 hover:border-red-600 hover:bg-red-600 active:bg-red-700 focus:ring-red-600" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Inciar sesión
                </PrimaryButton>
            </div>
        </form>
        <template #register>
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 text-stone-800 bg-stone-50 shadow-md overflow-hidden sm:rounded-lg">
                <div class="flex justify-between">
                    <span class="mx-4">¿No tienes cuenta?</span>
                    <Link :href="route('register')" class="underline text-stone-800 hover:text-red-600 mx-8 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600">
                    Registrate
                    </Link>
                </div>
            </div>
        </template>

    </AuthenticationCard>

</template>
