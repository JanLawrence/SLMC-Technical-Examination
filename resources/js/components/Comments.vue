<template>
    <div>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="my-addon"><i class="pe-7s-search pe-va"></i></span>
            </div>
            <input class="form-control" type="text" name="search" v-model="filterInput" v-on:keyup="fetchComments('', filterInput)" placeholder="Search Name">
        </div>
        <div class="container-fluid">
            <h4 class="my-3">Comments</h4>
            <div class="table-container">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Post</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Body</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="comments.length === 0">
                                <td colspan="4" class="text-center">No data available</td>
                            </tr>
                            <tr v-for="comment in comments" v-bind:key="comment.id">
                                <td>{{comment.postId}}</td>
                                <td>{{comment.name}}</td>
                                <td>{{comment.email}}</td>
                                <td>{{comment.body}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <nav>
                    <ul class="pagination">
                        <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item">
                            <a @click="fetchComments(pagination.prev_page_url, filterInput)" class="page-link" href="#">Previous</a>
                        </li>
                        <li class="page-item disabled"><a class="page-link" href="#">Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                        <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item">
                            <a @click="fetchComments(pagination.next_page_url, filterInput)" class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                comments: [],
                comment: {
                    id: '',
                    postId: '',
                    name: '',
                    email: '',
                    body: '',
                    filterInput: ''
                },
                comment_id: '',
                pagination: {},
                edit: false,
                filterInput: ''
            }
        },
        created() {
            this.fetchComments();
        },
        methods: {
            fetchComments(page_url, value) {
                let search = typeof value === 'undefined' ? '' : value;
                let page = this;
                page_url = typeof page_url === 'undefined' || page_url === '' ?  'api/comments?s=' + search : page_url + '&s=' + search;
                fetch(page_url)
                    .then(res => res.json())
                    .then(res => {
                        this.comments = res.data
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
