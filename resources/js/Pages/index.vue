<template>
    <div>
        <div class="container">
            <div class="col-md-6 offset-md-3 mt-5 position-relative">
            
            <h2 class="mb-4">Todo list</h2>
                <b-card>
                    <h3>Add New</h3>
                    <p>{{data}}</p>
                    <form>
                        <div class="row">
                            <div class="form-group col-md-9">
                                <input type="text" class="form-control col-md-9" id="" placeholder="Add Item">
                            </div>
                                <button type="submit" class="btn btn-primary mb-2 pr-5 col-md-3">Add</button>
                        </div>
                        
                    </form>
                </b-card>
                   
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
                            <tr>
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                                    </div>
                                </th>
                                <td>Loreum Ipsum Text Here</td>
                                <td><button type="button" class="btn btn-danger cust-delete">Delete</button></td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                                    </div>
                                </th>
                                <td>Loreum Ipsum Text Here</td>
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
        props:["data"]
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