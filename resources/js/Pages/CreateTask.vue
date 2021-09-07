<template>
  <Head title="Crear Tareas" />
  <BreezeAuthenticatedLayout>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <form @submit.prevent="submit">
              <label for="first_name">First name:</label>
              <input id="first_name" v-model="form.first_name" />
              <label for="last_name">Last name:</label>
              <input id="last_name" v-model="form.last_name" />
              <label for="email">Email:</label>
              <input id="email" v-model="form.email" />
              <button type="submit">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>

<script>
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

export default {
  setup() {
    const form = reactive({
      first_name: null,
      last_name: null,
      email: null,
    });

    function submit() {
      Inertia.post("/users", form);
    }

    return { form, submit };
  },
  components: {
    BreezeAuthenticatedLayout,
    Head,
    Link,
  },
};
</script>