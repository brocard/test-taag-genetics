<script setup>
import BlankLayout from '@/Layouts/Blank.vue';
import BaseInput from '@/Components/Input.vue';
import BaseLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import BreezeButton from '@/Components/Button.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
  form.post(route('login'), {
    onFinish: () => form.reset('password'),
  });
};

</script>

<template>
  <BlankLayout>
    <Head title="Crear Libro" />

    <div>
      <form @submit.prevent="submit">
        <div class="flex flex-col space-y-2.5">
          <div>
            <BaseLabel for="email" value="Autor" />
            <BaseInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus autocomplete="username" />
          </div>

          <div>
            <BaseLabel for="email" value="Título" />
            <BaseInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus autocomplete="username" />
          </div>

          <div>
            <BaseLabel for="email" value="Edición" />
            <BaseInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus autocomplete="username" />
          </div>
        </div>

        <div class="flex items-center justify-end mt-4">
            <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Crear
            </BreezeButton>
        </div>
      </form>
    </div>
  </BlankLayout>
</template>


<style scoped>

</style>
