<template>
    <div>
        <a href="/project/create" class="btn btn-primary btn-sm rounded-full m-6" title="Új elem">
            <i class="las la-plus-circle text-xl"></i>
        </a>
        <div class="overflow-x-auto m-6">
            <table class="table table-zebra table-compact" >
                <thead>
                <tr class="text-lg">
                    <th>Project Név</th>
                    <th>Státusz</th>
                    <th>Kapcsolattartók száma</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="project in projects" :key="project.id" class="hover">
                    <td>{{ project.name }}</td>
                    <td>{{ project.status }}</td>
                    <td>{{ project.contactNumber }}</td>
                    <td class="text-2xl">
                        <a href="/project/create" class="las la-edit cursor-pointer"></a>
                        <i v-on:click="destroy(project.id)" class="las la-trash pl-2 cursor-pointer"></i>

                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>

export default {
    name: "index",
    props: {
        projects: {type: Object, required: true}
    },
    methods:{
        destroy(id) {
        axios.delete(`/api/project/${id}`)
            .then(response => {
                console.log('Projekt sikeresen törölve');

                const index = this.projects.findIndex(project => project.id === id);
                if (index !== -1) {
                    this.projects.splice(index, 1);
                }
            })
            .catch(error => {
                console.error('Hiba a projekt törlésekor');
            });
        }
    }
}
</script>

<style scoped>

</style>
