<template>
<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading">XYZ Enterprise </div>
    <div class="list-group list-group-flush">
        <router-link to="/posts" class="list-group-item list-group-item-action bg-light"><span><i class="pe-7s-news-paper pe-va"></i></span>Posts</router-link>
        <router-link to="/comments" class="list-group-item list-group-item-action bg-light"><span><i class="pe-7s-comment pe-va"></i></span>Comments</router-link>
        <router-link to="/albums" class="list-group-item list-group-item-action bg-light"><span><i class="pe-7s-photo-gallery pe-va"></i></span>Albums</router-link>
        <router-link to="/photos" class="list-group-item list-group-item-action bg-light"><span><i class="pe-7s-photo pe-va"></i></span>Photos</router-link>
        <router-link to="/todos" class="list-group-item list-group-item-action bg-light"><span><i class="pe-7s-note2 pe-va"></i></span>Todos</router-link>
        <router-link to="/users" class="list-group-item list-group-item-action bg-light"><span><i class="pe-7s-users pe-va"></i></span>Users</router-link>
    </div>
</div>
</template>
