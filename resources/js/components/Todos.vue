<template>
    <div>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="my-addon"><i class="pe-7s-search pe-va"></i></span>
            </div>
            <input class="form-control" type="text" name="search" v-model="filterInput" v-on:keyup="fetchTodos('', filterInput)" placeholder="Search Title">
        </div>
        <div class="container-fluid">
            <h4 class="my-3">Todos</h4>
            <div class="table-container">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Title</th>
                                <th>Completed</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="todos.length === 0">
                                <td colspan="3" class="text-center">No data available</td>
                            </tr>
                            <tr v-for="todo in todos" v-bind:key="todo.id">
                                <td>{{todo.userId}}</td>
                                <td>{{todo.title}}</td>
                                <td>
                                    <span class="badge badge-pill badge-success" v-if="todo.completed == 'true'">True</span>
                                    <span class="badge badge-pill badge-danger" v-else>False</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <nav>
                    <ul class="pagination">
                        <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item">
                            <a @click="fetchTodos(pagination.prev_page_url, filterInput)" class="page-link" href="#">Previous</a>
                        </li>
                        <li class="page-item disabled"><a class="page-link" href="#">Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                        <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item">
                            <a @click="fetchTodos(pagination.next_page_url, filterInput)" class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</template>
<style>
    .table-container{
        padding: 0px!important;
    }
</style>
<script>
    export default {
        data() {
            return {
                todos: [],
                todo: {
                    id: '',
                    userId: '',
                    title: '',
                    completed: ''
                },
                todo_id: '',
                pagination: {},
                edit: false,
                filterInput: ''
            }
        },
        created() {
            this.fetchTodos();
        },
        methods: {
            fetchTodos(page_url, value) {
                let search = typeof value === 'undefined' ? '' : value;
                let page = this;
                page_url = typeof page_url === 'undefined' || page_url === '' ?  'api/todos?s=' + search : page_url + '&s=' + search;
                fetch(page_url)
                    .then(res => res.json())
                    .then(res => {
                        this.todos = res.data
                        page.makePagination(res);
                    })
                    .catch(err => console.log(err))
            },
            makePagination(res) {
                let pagination = {
                    current_page: res.current_page,
                    last_page: res.last_page,
                    next_page_url: res.next_page_url,
                    prev_page_url: res.prev_page_url
                }
                this.pagination = pagination;
            }
        }
    }

</script>
