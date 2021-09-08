<template>
  <Head title="Crear Tareas" />
  <BreezeAuthenticatedLayout>
    <div class="py-12">
      <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <h3 class="py-6 text-4xl">Editar la Tarea </h3>
            <form @submit.prevent="submit">
              <label class="block">
                <span class="text-gray-700">Descripción </span>                
                <input
                  type="text"
                  class="
                    mt-0
                    block
                    w-full
                    px-0.5
                    border-0 border-b-2 border-gray-200
                    focus:ring-0
                    focus:border-black
                  "
                  required
                  :placeholder="des"            
                  v-model="form.description" 
                />
               
              </label>
              <label class="block">
                <span class="text-gray-700">Fecha de Fin</span>
                <input
                  type="date"
                  class="
                    mt-0
                    block
                    w-full
                    px-0.5
                    border-0 border-b-2 border-gray-200
                    focus:ring-0
                    focus:border-black
                  "
                  required
                  v-model="form.due_date" 
                />                
              </label>
              <label class="block">
              <button class="bg-blue-500 my-4 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="submit">Guardar </button>
            </label>
            </form>
          </div>
        </div>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>

<script>
import { reactive, ref  } from "vue";
import { Inertia } from "@inertiajs/inertia";
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

export default {
  setup() {
    const form = reactive({  
    id: null,
      description: null,
      due_date: null,
    });

    function submit() {
      Inertia.post("", form);
      alert("tarea Actualizada correctamente");
    }

    return { form, submit };
  },  
  data(){
      return{
          des: this.$page.props.task.description,
          id: this.$page.props.task.id
      }
  },
  components: {
    BreezeAuthenticatedLayout,
    Head,
    Link,
  },
};
</script>