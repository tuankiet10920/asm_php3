<script setup>
import { RouterLink } from 'vue-router';
</script>
<template>
    <header class="header-global">
        <nav id="navbar-main"
            class="navbar navbar-main navbar-expand-lg navbar-theme-primary navbar-light navbar-theme-primary headroom py-lg-2 px-lg-6">
            <div class="container">
                <RouterLink class="navbar-brand" to="/">
                    <img src="../../../public/assets/img/brand/logo.png" style="height: 3rem" alt="Mobile Logo">
                </RouterLink>
                <div class="navbar-collapse collapse" id="navbar_global">
                    <div class="navbar-collapse-header">
                        <div class="row">
                            <div class="col-6 collapse-brand">
                                <RouterLink to="/">
                                    <img src="../../../public/assets/img/brand/logo-dark.png"
                                        style="height: 3rem" alt="Mobile Logo">
                                </RouterLink>
                            </div>
                            <div class="col-6 collapse-close">
                                <a href="#navbar_global" role="button" class="fas fa-times" data-toggle="collapse"
                                    data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false"
                                    aria-label="Toggle navigation"></a>
                            </div>
                        </div>
                    </div>
                    <ul class="navbar-nav navbar-nav-hover justify-content-center ml-auto">
                        <li class="nav-item">
                            <RouterLink to="/careers" class="nav-link">
                                Tuyển Dụng
                            </RouterLink>
                        </li>
                        <li class="nav-item">
                            <RouterLink to="/about" class="nav-link">
                                Về chúng tôi
                            </RouterLink>
                        </li>
                        <li class="nav-item">
                            <RouterLink to="/contact" class="nav-link">
                                Liên hệ
                            </RouterLink>
                        </li>
                    </ul>
                        <RouterLink to="/login"  target="_blank" class="btn btn-buy btn-secondary animate-up-2 d-none d-lg-inline ml-3">
                                Đăng nhập
                        </RouterLink>
                </div>
                <div class="d-flex d-lg-none align-items-center">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global"
                        aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                </div>
            </div>
        </nav>
    </header>
</template>