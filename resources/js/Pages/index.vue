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
                    <todo-item :data="data" />: Total Number of Todo
                </b-card>
                <div id="status-message">
                    <b-alert variant="success" v-show="elementShow" v-if="$page.props.session.type === 'success'" show>{{$page.props.session.message}}</b-alert>
                    <b-alert variant="danger" v-show="elementShow" v-if="$page.props.session.type === 'danger'" show>{{$page.props.session.message}}</b-alert>
                    <b-alert variant="warning" v-show="elementShow" v-if="$page.props.session.type === 'warning'" show>{{$page.props.session.message}}</b-alert>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import  TodoItem from '../components/todoitem'
    export default {
components:{
TodoItem
},

        props:["data"],

        
        data() {
            return {
                elementShow: true,

                form:{
                    name:null,
                    id:null,
                },

                message:null,
                messageTimeout: null,
            }            
        },

        watch: {
            message: function(msg){
                this.elementShow = true;
                const timer = 5000; 
                 
                if (this.messageTimeout) {
                    clearTimeout(this.messageTimeout);
                }

                   this.messageTimeout=window.setTimeout(() => {
                    this.toggleStatus()
                }, timer);
            }
        },

         methods: {
            submit() {
                this.$inertia.post('/new', this.form, {
                    onSuccess: (response) => {
                        this.message=response.message;
                    },
                })
            },

            destroy: function(data) {
                this.$inertia.post("/destroy", {"id": data.id});
            },

            // check: function(data) {
            //     console.log('test')
            //     if (data.completed) {
            //         this.$inertia.post("/uncomplete",{"id" :data.id}, {
            //         onSuccess: (response) => {
                       
            //             this.message=response.message;
            //         },
            //     });
            //     }
            //     else {
            //         this.$inertia.post("/complete",{"id" :data.id}, {
            //         onSuccess: (response) => {
            //             console.log("completed");
            //             this.message=response.message;
            //         },
            //     });    
            //     }
            // },

            check: function(data) {
                console.log('test')
                if (data.completed) {
                    this.$inertia.post("/complete",{"id" :data.id , 'text' : "complete"}, {
                    onSuccess: (response) => {
                       
                        this.message=response.message;
                    },
                });
                }
                else {
                    this.$inertia.post("/complete",{"id" :data.id , 'text' : "Uncomplete"}, {
                    onSuccess: (response) => {
                        console.log("completed");
                        this.message=response.message;
                    },
                });    
                }
            },

            toggleStatus: function() {
                this.elementShow=!this.elementShow;
            },
        },

        // computed: {
        //     updatedCount: function() {
        //         return this.data.length;
        //     }
        // },

        
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

    .show{
        display:block !important;
    }

    .hide{
        display:none !important;
    }


</style>