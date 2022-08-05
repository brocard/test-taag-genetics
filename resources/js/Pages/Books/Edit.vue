<script setup>
import BlankLayout from '@/Layouts/Blank.vue';
import BaseInput from '@/Components/Input.vue';
import BaseSelect from '@/Components/SelectInput.vue'
import BaseLabel from '@/Components/Label.vue';
import BreezeButton from '@/Components/Button.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

defineProps({
  book: Object,
});

const form = useForm({
  title: '',
  author_id: '',
  edition: null,
  publication_data: null,
  content_type: null,
  restrictions: null,
});

const submit = () => {
  form.put(`/books/${book.id}`);
};

</script>

<template>
  <BlankLayout>
    <Head title="Crear Libro" />

    <div class="text-center pb-6">
      <Link href="/books" class="text-blue-500 animate-bounce font-semibold focus:outline-none hover:text-blue-600">
        Ir al listado de libros
      </Link>
    </div>

    <div>
      <form @submit.prevent="submit">
        <div class="flex flex-col space-y-2.5">
          <div>
            <BaseLabel for="title" value="Título" />
            <BaseInput
              id="title" type="text"
              class="mt-1 block w-full"
              v-model="form.title"
              required autofocus
              autocomplete="title"
            />
          </div>

          <div>
            <BaseLabel for="author_id" value="Autor" />
            <BaseSelect
              v-model="form.author_id"
              :error="form.errors.author_id" class="mt-2"
            >
              <option :value="null" />
              <option
                v-for="item in authors"
                :key="item.id"
                :value="item.id"
              >{{ item.name }}</option>
            </BaseSelect>
          </div>

          <div>
            <BaseLabel for="edition" value="Edición" />
            <BaseInput id="edition" type="text" class="mt-1 block w-full" v-model="form.edition" />
          </div>

          <div>
            <BaseLabel for="publication_data" value="Datos de publicación" />
            <BaseInput id="publication_data" type="text" class="mt-1 block w-full" v-model="form.publication_data" />
          </div>

          <div>
            <BaseLabel for="content_type" value="Tipo de Contenido" />
            <BaseInput id="content_type" type="text" class="mt-1 block w-full" v-model="form.content_type" />
          </div>

          <div>
            <BaseLabel for="restrictions" value="Restricciones" />
            <BaseInput id="restrictions" type="text" class="mt-1 block w-full" v-model="form.restrictions" />
          </div>
        </div>

        <div class="flex items-center justify-end mt-4">
          <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
            Update
          </BreezeButton>
        </div>
      </form>
    </div>
  </BlankLayout>
</template>


<style scoped>

</style>
