
import { Inertia } from "@inertiajs/inertia";

const url = "http://localhost:8000";

const completTask=(id,token)=> {
    //console.log(this.$page.props.token);
    return fetch(url + "/tareas/completar", {
      method: "POST",
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        id: id,
        _token: token,
      }),
    }).then(function (response) {
      alert("tarea actualizada correctamente");
      Inertia.get('/tareas/show');
    });
  };

 const deleteTask = (id,token) => {
    //console.log(this.$page.props.token);
    return fetch(url+ "/tareas/borrar", {
      method: "POST",
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        id: id,
        _token: token,
      }),
    }).then(function (response) {
      alert("tarea Eliminada correctamente");
      Inertia.get('/tareas/show');
    });
  };

 const editTask = (id) =>{
    Inertia.get('/tareas/actualizar/'+ id);
  };



export{completTask,deleteTask,editTask };