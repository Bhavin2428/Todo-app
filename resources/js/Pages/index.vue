<template>
    <div>
        <div class="container">
            <div class="col-md-6 offset-md-3 mt-5 position-relative">
            
            <h2 class="mb-4">Todo list</h2>
                <b-card>
                    <h3>Add New</h3>
                    <form @submit.prevent="submit">
                        <div class="row">
                            <div class="form-group col-md-9">
                                <input type="text" class="form-control col-md-9" id="" placeholder="Add Item" v-model="form.name">
                            </div>
                                <button type="submit" class="btn btn-primary mb-2 pr-5 col-md-3">Add</button>
                        </div>
                        
                    </form>
                </b-card>
                   <b-alert variant="success" show>{{message}}</b-alert>
                <b-card class="mt-5">
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
                                        <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                                    </div>
                                </th>
                                <td>{{item.name}}</td>
                                <td><button type="button" class="btn btn-danger cust-delete">Delete</button></td>
                            </tr>
                           
                        </tbody>
                    </table>
                </b-card>
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
         },
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
</style>