<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sibunag Parish Logo here</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <router-link class="nav-link" :to="{name: 'homepage'}">Dashboard</router-link>
                </li>
                <li class="nav-item">
                <router-link class="nav-link" :to="{name: 'clients'}">Clients</router-link>
                </li>
                <li class="nav-item">
                <router-link class="nav-link" :to="{name: 'baptism'}">Baptism</router-link>
                </li>
                <li class="nav-item">
                <router-link class="nav-link" :to="{name: 'burial'}">Burial</router-link>
                </li>
                <li class="nav-item">
                <router-link class="nav-link" :to="{name: 'marriage'}">Marriage</router-link>
                </li>
            </ul>
                <div class="d-flex flex-row">
                    <button class="btn btn-primary">Login</button>
                    <button class="btn btn-primary">Logout</button>
                </div>
            </div>
        </div>
    </nav>
</template>