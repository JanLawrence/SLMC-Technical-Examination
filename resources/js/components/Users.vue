<template>
     <div>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="my-addon"><i class="pe-7s-search pe-va"></i></span>
            </div>
            <input class="form-control" type="text" name="search" v-model="filterInput" v-on:keyup="fetchUsers('', filterInput)" placeholder="Search Name">
        </div>
        <div class="container-fluid">
            <h4 class="my-3">Users</h4>
            <div class="table-container">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th rowspan="2" style="vertical-align: middle">Name</th>
                                <th rowspan="2" style="vertical-align: middle">Username</th>
                                <th rowspan="2" style="vertical-align: middle">Email</th>
                                <th colspan="6">Address</th>
                                <th rowspan="2" style="vertical-align: middle">Phone No.</th>
                                <th rowspan="2" style="vertical-align: middle">Website</th>
                                <th colspan="3">Company</th>
                            </tr>
                            <tr>
                                <th>Street</th>
                                <th>Suite</th>
                                <th>City</th>
                                <th>Zip Code</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Name</th>
                                <th>Catch Phrase</th>
                                <th>BS</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr v-if="users.length === 0">
                                <td colspan="14" class="text-center">No data available</td>
                            </tr>
                            <tr v-for="user in users" v-bind:key="user.id">
                                <td>{{user.name}}</td>
                                <td>{{user.username}}</td>
                                <td>{{user.email}}</td>
                                <td>{{user.addressStreet}}</td>
                                <td>{{user.addressSuite}}</td>
                                <td>{{user.addressCity}}</td>
                                <td>{{user.addressZipcode}}</td>
                                <td>{{user.addressGeoLat}}</td>
                                <td>{{user.addressGeoLng}}</td>
                                <td>{{user.phone}}</td>
                                <td>{{user.website}}</td>
                                <td>{{user.companyName}}</td>
                                <td>{{user.companyCatchPhrase}}</td>
                                <td>{{user.companyBs}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <nav>
                    <ul class="pagination">
                        <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item">
                            <a @click="fetchUsers(pagination.prev_page_url, filterInput)" class="page-link" href="#">Previous</a>
                        </li>
                        <li class="page-item disabled"><a class="page-link" href="#">Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                        <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item">
                            <a @click="fetchUsers(pagination.next_page_url, filterInput)" class="page-link" href="#">Next</a>
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
                users: [],
                user: {
                    id: '',
                    name: '',
                    username: '',
                    email: '',
                    addressStreet: '',
                    addressSuite: '',
                    addressCity: '',
                    addressZipcode: '',
                    addressGeoLat: '',
                    addressGeoLng: '',
                    phone: '',
                    website: '',
                    companyName: '',
                    companyCatchPhrase: '',
                    companyBs: '',
                },
                user_id: '',
                pagination: {},
                edit: false,
                filterInput: ''
            }
        },
        created() {
            this.fetchUsers();
        },
        methods: {
            fetchUsers(page_url, value) {
                let search = typeof value === 'undefined' ? '' : value;
                let page = this;
                page_url = typeof page_url === 'undefined' || page_url === '' ?  'api/users?s=' + search : page_url + '&s=' + search;
                fetch(page_url)
                    .then(res => res.json())
                    .then(res => {
                        this.users = res.data
                        page.makePagination(res.meta, res.links);
                    })
                    .catch(err => console.log(err))
            },
            makePagination(meta, links) {
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                }
                this.pagination = pagination;
            }
        }
    }

</script>
