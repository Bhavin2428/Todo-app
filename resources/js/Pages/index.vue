<template>
    <div>
        <div class="container">
            <div class="col-md-6 offset-md-3 mt-5 position-relative">
            
            
                <b-card>
                    <h3>Add New</h3>
                    <form @submit.prevent="submit">
                        <div class="row">
                            <div class="form-group col-md-9">
                                <input type="text" class="form-control" id="" placeholder="Add Todo" v-model="form.name">
                            </div>

                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary w-100">Add</button>
                            </div>
                        </div>
                        
                    </form>
                </b-card>
                  <h2 class="mt-4">Todo list</h2>
                <b-card class="mt-2">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">List</th>
                            <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in data">
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="" @change="check(item)" :checked="item.completed" aria-label="...">
                                    </div>
                                </th>
                                <td><span v-bind:class="{ completed: item.completed }">{{item.name}} </span></td>
                                <td><button type="button" class="btn btn-danger cust-delete" @click="destroy(item)">Delete</button></td>
                            </tr>
                            
                        </tbody>
                    </table>
                    <strong>{{ updatedCount }}</strong> : Total Number of Todo
                </b-card>

                <b-alert variant="success" v-if="$page.props.session.type === 'success'" show>{{$page.props.session.message}}</b-alert>
                <b-alert variant="danger" v-if="$page.props.session.type === 'danger'" show>{{$page.props.session.message}}</b-alert>
                <b-alert variant="warning" v-if="$page.props.session.type === 'warning'" show>{{$page.props.session.message}}</b-alert>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:["data"],

        data() {
            return {
                form:{
                    name:null,
                    id:null,
                },

                message:null,
            }
        },

         methods: {
            submit() {
                this.$inertia.post('/new', this.form)
                .then(response => {
                    console.log('a');
                    console.log(response);
                    this.message=response.data.message;
                });
            },

            destroy: function(data) {
                this.$inertia.post("/destroy", {"id": data.id});
            },

            check: function(data) {
                console.log('test')
                if (data.completed) {
                    this.$inertia.post("/uncomplete",{"id" :data.id});
                }
                else {
                    this.$inertia.post("/complete",{"id" :data.id});    
                }
            },
        },

        computed: {
            updatedCount: function() {
                return this.data.length;
            }
        }
    }
</script>

<style lang="css">

    h3{
    font-size:17px;
    font-weight:600;
    }

    .cust-delete{
        padding:3px 5px 5px 5px ;
        font-size:12px;
    }

    .completed{
        text-decoration:line-through;
    }
</style>