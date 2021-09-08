<template>
  <Head title="Mis Tareas Completadas" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Mis Tareas Completadas
      </h2>
    </template>

    <div v-for="item in tasks" :key="item.id">
      <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
              <p class="text-base">
                <b>Fecha de Inicio:</b> {{ item.start_date }} -
                <b> Fecha de Fin:</b> {{ item.due_date }}
              </p>
              <p class="text-2xl">{{ item.description }}</p>
              <p class="text-green-600" v-if="item.state === 1">Terminada</p>
              <p class="text-red-600" v-else>No Terminada</p>
            </div>
            <div class="inline-flex">
              <button
                class="
                  bg-green-500
                  mx-2
                  hover:bg-green-700
                  text-white
                  font-bold
                  py-2
                  px-4
                  rounded-full
                "
                v-on:click="completTask(item.id)"
                v-if="item.state === 0"
              >
                Completar
              </button>
              <button
                v-else
                class="
                  bg-green-500
                  text-white
                  font-bold
                  mx-2
                  py-2
                  px-4
                  rounded
                  opacity-50
                  rounded-full
                  cursor-not-allowed
                "
              >
                Completar
              </button>
              <button
                class="
                  bg-blue-500
                  mx-3
                  hover:bg-blue-700
                  text-white
                  font-bold
                  py-2
                  px-4
                  rounded-full
                "
                v-on:click="editTask(item.id)"
              >
                Editar
              </button>
              <button
                class="
                  bg-red-500
                  mx-3
                  hover:bg-red-700
                  text-white
                  font-bold
                  py-2
                  px-4
                  rounded-full
                "
                v-on:click="deleteTask(item.id)"
              >
                Borrar
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { completTask, deleteTask, editTask } from "../ApiCall";

export default {
  components: {
    Head,
    BreezeAuthenticatedLayout,
  },

  data() {
    return {
      tasks: [],
    };
  },
  mounted() {
    fetch("http://localhost:8000/tareas/consultar/finalizadas")
      .then((response) => response.json())
      .then((data) => {
        this.tasks = data;
      })
      .catch((err) => console.log(err.message));
  },
  methods: {
    completTask(id) {
      completTask(id,this.$page.props.token);
    },
    deleteTask(id) {
      deleteTask(id, this.$page.props.token);
    },
    editTask(id) {
      editTask(id);
    },
  },
};
</script>