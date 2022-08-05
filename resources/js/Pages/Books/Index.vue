<script setup>
import BlankLayout from '@/Layouts/Blank.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia'

defineProps({
  books: [Object, Array],
});

const destroy = (item) =>  {
  if (confirm('Are you sure you want to delete this book?')) {
    Inertia.delete(`/books/${item.id}`)
  }
}

</script>

<template>
  <BlankLayout>
    <Head title="Listar Libros" />

    <div class="flex items-center justify-between mb-6">
      <Link class="btn-indigo" href="/books/create">
        <span>Crear</span>
        <span class="hidden md:inline">&nbsp;Libro</span>
      </Link>
    </div>

    <div class="bg-white rounded-sm shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
        <thead class="text-left font-bold text-gray-500">
          <tr>
            <th class="pb-4 pt-6 px-6">Título</th>
            <th class="pb-4 pt-6 px-6">Autor</th>
            <th class="pb-4 pt-6 px-6">Edición</th>
            <th class="pb-4 pt-6 px-6" colspan="2">Datos de publicación</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="item in books.data"
            :key="item.id"
            class=" divide-y divide-yellow-400 hover:bg-gray-100 focus-within:bg-gray-100 text-sm font-normal text-gray-800"
          >
            <td class="border-t">
              <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/books/${item.id}/edit`">
                {{ item.title }}
              </Link>
            </td>
            <td class="border-t">
              <Link class="flex items-center px-6 py-4" :href="`/books/${item.id}/edit`" tabindex="-1">
                <div v-if="item.author">
                  {{ item.author.name }}
                </div>
              </Link>
            </td>
            <td class="border-t">
              <Link class="flex items-center px-6 py-4" :href="`/books/${item.id}/edit`" tabindex="-1">
                {{ item.edition }}
              </Link>
            </td>
            <td colspan="2" class="border-t">
              <Link class="flex items-center px-6 py-4" :href="`/books/${item.id}/edit`" tabindex="-1">
                {{ item.publication_data }}
              </Link>
            </td>
            <td>
              <button
                v-if="!item.deleted_at"
                type="button"
                class="text-red-600 hover:underline"
                tabindex="-1"
                @click.stop="destroy(item)"
              >Eliminar Libro</button>
            </td>
          </tr>
          <tr v-if="books.data.length === 0">
            <td class="px-6 py-4 border-t" colspan="4">No se encontraro libros.</td>
          </tr>
        </tbody>
      </table>
    </div>
  </BlankLayout>
</template>


<style scoped>
.btn-indigo {
  @apply px-6 py-3 rounded bg-indigo-600 text-white text-sm leading-4 font-bold whitespace-nowrap hover:bg-orange-400 focus:bg-orange-400;
}
</style>
